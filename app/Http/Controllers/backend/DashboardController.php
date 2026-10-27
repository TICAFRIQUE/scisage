<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Activite;
use App\Models\Actualite;
use App\Models\Apropos;
use App\Models\Banniere;
use App\Models\Engagement;
use App\Models\Faq;
use App\Models\Parametre;
use App\Models\Portfolio;
use App\Models\Statistique;

class DashboardController extends Controller
{
    public function index()
    {
        $portfolioParCategorie = Portfolio::selectRaw('categorie, count(*) as total')
            ->groupBy('categorie')
            ->pluck('total', 'categorie');

        $kpis = [
            [
                'label' => 'Projets au portfolio',
                'value' => Portfolio::count(),
                'sub' => ($portfolioParCategorie['realisations'] ?? 0) . ' réalisations · ' . ($portfolioParCategorie['projets'] ?? 0) . ' en cours',
                'icon' => 'ri-building-2-line',
                'route' => 'portfolios.index',
            ],
            [
                'label' => 'Maisons au catalogue',
                'value' => Portfolio::where('is_catalogue', true)->where('is_active', true)->count(),
                'sub' => 'Proposées à la souscription',
                'icon' => 'ri-home-heart-line',
                'route' => 'portfolios.index',
            ],
            [
                'label' => 'Actualités publiées',
                'value' => Actualite::where('is_active', true)->count(),
                'sub' => 'Sur ' . Actualite::count() . ' au total',
                'icon' => 'ri-newspaper-line',
                'route' => 'actualites.index',
            ],
            [
                'label' => 'Bannières actives',
                'value' => Banniere::where('is_active', true)->count(),
                'sub' => 'Diaporama de l\'accueil',
                'icon' => 'ri-image-2-line',
                'route' => 'bannieres.index',
            ],
        ];

        $derniersPortfolios = Portfolio::with('media')->latest()->take(5)->get();
        $dernieresActualites = Actualite::with('media')->latest()->take(5)->get();

        // Contenus indispensables pour un site complet
        $parametre = Parametre::with('media')->first();
        $checklist = [
            ['Logo du site', (bool) $parametre?->hasMedia('logo_header'), 'parametre.index'],
            ['Téléphone et email de contact', (bool) ($parametre?->contact1 && $parametre?->email1), 'parametre.index'],
            ['Adresse / localisation', (bool) $parametre?->localisation, 'parametre.index'],
            ['Au moins un réseau social', (bool) ($parametre?->lien_facebook || $parametre?->lien_instagram || $parametre?->lien_linkedin || $parametre?->lien_tiktok), 'parametre.index'],
            ['Au moins une bannière active', Banniere::where('is_active', true)->exists(), 'bannieres.index'],
            ['Texte « À propos »', Apropos::where('is_active', true)->exists(), 'apropos.index'],
            ['Chiffres clés (3 minimum)', Statistique::where('is_active', true)->count() >= 3, 'statistiques.index'],
            ['Valeurs & engagements', Engagement::where('is_active', true)->exists(), 'engagements.index'],
            ['Activités avec leurs étapes', Activite::has('projets')->exists(), 'activites.index'],
            ['FAQ (3 questions minimum)', Faq::where('is_active', true)->count() >= 3, 'faqs.index'],
        ];
        $score = (int) round(collect($checklist)->filter(fn ($c) => $c[1])->count() / count($checklist) * 100);

        return view('backend.pages.index', compact('kpis', 'derniersPortfolios', 'dernieresActualites', 'checklist', 'score'));
    }
}
