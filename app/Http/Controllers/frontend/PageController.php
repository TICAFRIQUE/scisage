<?php

namespace App\Http\Controllers\frontend;

use App\Models\Apropos;
use App\Models\Service;
use App\Models\Activite;
use App\Models\Banniere;
use App\Mail\ContactMail;
use App\Models\Portfolio;
use App\Models\Engagement;
use App\Models\Entreprise;
use App\Models\Statistique;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Support\Facades\Mail;

class PageController extends Controller
{
    //
    public function accueil()
    {
        try {
            // banniere
            $banniere = Banniere::active()->with('media')->first();

            //activites 
            $activites = Activite::with('media')->with('projets')->active()->get();

            //statistique
            $statistiques = Statistique::active()->ordre()->get();

            //apropos
            $apropos = Apropos::with('media')->active()->first();

            //engagements
            $engagements = Engagement::with('media')->active()->ordre()->get();

            //faqs
            $faqs = Faq::active()->ordre()->get();
            // dd($engagements->toArray());
            return view('frontend.index', compact('banniere', 'activites', 'statistiques', 'apropos', 'engagements', 'faqs'));
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Une erreur est survenue: ' . $th->getMessage());
        }
    }

    public function apropos()
    {
        try {
            $apropos = Apropos::with('media')->active()->first();
            return view('frontend.pages.apropos', compact('apropos'));
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Une erreur est survenue: ' . $th->getMessage());
        }
    }
    
    public function activites($slug)
    {
        try {
            $activite = Activite::with('media')->with('projets.media')->active()->where('slug', $slug)->first();
            if (!$activite) {
                return redirect()->route('page.accueil')->with('error', 'Activité non trouvée.');
            }
            return view('frontend.pages.activites', compact('activite'));
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Une erreur est survenue: ' . $th->getMessage());
        }
    }

    public function portfolios($categorie = null)
    {
        try {
            $query = Portfolio::with('media')->active();
            
            // Si une catégorie est spécifiée, filtrer par cette catégorie
            if ($categorie && $categorie !== 'tous') {
                $query->where('categorie', $categorie);
            }
            
            // Paginer les résultats (12 par page)
            $portfolios = $query->orderBy('created_at', 'desc')->paginate(12);
            
            // Récupérer toutes les catégories disponibles pour les filtres
            $categories = Portfolio::active()
                ->select('categorie')
                ->distinct()
                ->pluck('categorie')
                ->toArray();
            
            return view('frontend.pages.portfolios', compact('portfolios', 'categorie', 'categories'));
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Une erreur est survenue: ' . $th->getMessage());
        }
    }

    // Méthode alternative si vous voulez afficher tous les portfolios sans catégorie
    public function allPortfolios()
    {
        try {
            // Récupérer tous les portfolios avec pagination
            $portfolios = Portfolio::with('media')->active()->orderBy('created_at', 'desc')->paginate(12);
            
            // Récupérer toutes les catégories disponibles pour les filtres
            $categories = Portfolio::active()
                ->select('categorie')
                ->distinct()
                ->pluck('categorie')
                ->toArray();
            
            $categorie = 'tous'; // Catégorie par défaut
            
            return view('frontend.pages.portfolios', compact('portfolios', 'categorie', 'categories'));
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Une erreur est survenue: ' . $th->getMessage());
        }
    }
}
