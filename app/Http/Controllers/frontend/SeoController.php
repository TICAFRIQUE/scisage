<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Activite;
use App\Models\Actualite;
use App\Models\Portfolio;
use Illuminate\Support\Facades\Cache;

class SeoController extends Controller
{
    /**
     * Plan du site pour les moteurs de recherche, généré à partir du contenu publié.
     * Mis en cache 1 heure : les nouveaux contenus de l'admin y apparaissent automatiquement.
     */
    public function sitemap()
    {
        $xml = Cache::remember('seo.sitemap', now()->addHour(), function () {
            $urls = [];
            $add = function (string $loc, $lastmod = null, string $freq = 'monthly', string $priority = '0.6', array $images = []) use (&$urls) {
                $urls[] = compact('loc', 'lastmod', 'freq', 'priority', 'images');
            };

            $lastPortfolio = Portfolio::active()->max('updated_at');
            $lastActualite = Actualite::active()->max('updated_at');

            // Pages principales
            $add(route('page.accueil'), max($lastPortfolio, $lastActualite), 'weekly', '1.0');
            $add(route('page.apropos'), null, 'yearly', '0.7');
            $add(route('page.souscrire.catalogue'), $lastPortfolio, 'weekly', '0.9');
            $add(route('page.construction.personnalisee'), null, 'yearly', '0.8');

            // Activités
            foreach (Activite::active()->get() as $activite) {
                $add(route('page.activites', $activite->slug), $activite->updated_at, 'monthly', '0.8');
            }

            // Portfolio : liste complète + une page par catégorie existante
            $add(route('page.portfolios'), $lastPortfolio, 'weekly', '0.8');
            $categories = Portfolio::active()->select('categorie')->distinct()->pluck('categorie');
            foreach ($categories as $categorie) {
                $add(route('page.portfolios', ['categorie' => $categorie]), $lastPortfolio, 'weekly', '0.7');
            }

            // Actualités
            $add(route('page.actualites'), $lastActualite, 'weekly', '0.7');
            foreach (Actualite::with('media')->active()->latest()->get() as $actualite) {
                $image = $actualite->getFirstMediaUrl('image_principale');
                $add(
                    route('page.actualites.details', $actualite->slug),
                    $actualite->updated_at,
                    'monthly',
                    '0.6',
                    $image ? [['loc' => $image, 'title' => $actualite->libelle]] : []
                );
            }

            return $this->toXml($urls);
        });

        return response($xml, 200, ['Content-Type' => 'application/xml; charset=UTF-8']);
    }

    /**
     * robots.txt : autorise le site public, bloque l'admin et les envois de formulaires,
     * et indique l'adresse du plan du site.
     */
    public function robots()
    {
        $lines = [
            'User-agent: *',
            'Allow: /',
            'Disallow: /admin',
            'Disallow: /portfolio/ajax',
            'Disallow: /contact/send',
            'Disallow: /souscrire-catalogue/send',
            'Disallow: /envoyer-souscription-catalogue',
            'Disallow: /construction-personnalisee/send',
            '',
            'Sitemap: ' . route('seo.sitemap'),
        ];

        return response(implode("\n", $lines) . "\n", 200, ['Content-Type' => 'text/plain; charset=UTF-8']);
    }

    private function toXml(array $urls): string
    {
        $e = fn ($v) => htmlspecialchars((string) $v, ENT_XML1 | ENT_QUOTES, 'UTF-8');

        $xml = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
        $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:image="http://www.google.com/schemas/sitemap-image/1.1">' . "\n";

        foreach ($urls as $url) {
            $xml .= "  <url>\n    <loc>{$e($url['loc'])}</loc>\n";
            if ($url['lastmod']) {
                $xml .= '    <lastmod>' . \Illuminate\Support\Carbon::parse($url['lastmod'])->toAtomString() . "</lastmod>\n";
            }
            $xml .= "    <changefreq>{$url['freq']}</changefreq>\n    <priority>{$url['priority']}</priority>\n";
            foreach ($url['images'] as $image) {
                $xml .= "    <image:image>\n      <image:loc>{$e($image['loc'])}</image:loc>\n      <image:title>{$e($image['title'])}</image:title>\n    </image:image>\n";
            }
            $xml .= "  </url>\n";
        }

        return $xml . '</urlset>' . "\n";
    }
}
