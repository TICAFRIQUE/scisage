<?php
// filepath: c:\laragon\www\sci_sage\web\app\Http\Controllers\frontend\PageController.php

namespace App\Http\Controllers\frontend;

use App\Models\Faq;
use App\Models\Equipe;
use App\Models\Apropos;
use App\Models\Service;
use App\Models\Activite;
use App\Models\Banniere;
use App\Mail\ContactMail;
use App\Models\Actualite;
use App\Models\Portfolio;
use App\Models\Engagement;
use App\Models\Entreprise;
use App\Models\Statistique;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class PageController extends Controller
{
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

            return view('frontend.index', compact('banniere', 'activites', 'statistiques', 'apropos', 'engagements', 'faqs'));
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Une erreur est survenue: ' . $th->getMessage());
        }
    }

    public function apropos()
    {
        try {
            $apropos = Apropos::with('media')->active()->first();
            // Récupérer l'équipe
            $equipes = Equipe::with('media')->active()->get();
            //statistique
            $statistiques = Statistique::active()->ordre()->get();
            //engagements
            $engagements = Engagement::with('media')->active()->ordre()->get();


            // dd($apropos->toArray(), $equipes);

            return view('frontend.pages.apropos', compact('apropos', 'equipes', 'statistiques', 'engagements'));
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

    public function portfolios(Request $request)
    {
        try {
            // Récupérer la catégorie depuis les paramètres GET
            $categorie = $request->get('categorie', 'tous');

            // Construire la requête avec eager loading optimisé
            $query = Portfolio::with(['media' => function ($query) {
                $query->orderBy('order_column', 'asc');
            }])->active();

            // Filtrer par catégorie si spécifiée et différente de 'tous'
            if ($categorie !== 'tous') {
                $query->where('categorie', $categorie);
            }

            // Paginer les résultats (9 par page) avec conservation des paramètres
            $portfolios = $query->orderBy('created_at', 'desc')
                ->paginate(9)
                ->withQueryString(); // Préserve les paramètres GET

            // Récupérer toutes les catégories disponibles avec compteurs
            $categoriesWithCount = Portfolio::active()
                ->select('categorie')
                ->selectRaw('count(*) as count')
                ->groupBy('categorie')
                ->get()
                ->pluck('count', 'categorie')
                ->toArray();

            // Ajouter le total pour "tous"
            $totalCount = Portfolio::active()->count();
            $categoriesWithCount = ['tous' => $totalCount] + $categoriesWithCount;

            return view('frontend.pages.portfolios', compact('portfolios', 'categorie', 'categoriesWithCount'));
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Une erreur est survenue: ' . $th->getMessage());
        }
    }

    // API pour le filtrage AJAX (optionnel pour plus de fluidité)
    public function portfoliosAjax(Request $request)
    {
        try {
            $categorie = $request->get('categorie', 'tous');

            $query = Portfolio::with(['media' => function ($query) {
                $query->orderBy('order_column', 'asc');
            }])->active();

            if ($categorie !== 'tous') {
                $query->where('categorie', $categorie);
            }

            $portfolios = $query->orderBy('created_at', 'desc')->paginate(12);

            return response()->json([
                'success' => true,
                'html' => view('frontend.partials.portfolio-grid', compact('portfolios'))->render(),
                'pagination' => $portfolios->links('frontend.partials.portfolio-pagination')->render(),
                'total' => $portfolios->total()
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => 'Erreur lors du chargement des portfolios'
            ], 500);
        }
    }


    //actualites page
    public function actualites()
    {
        try {
            $actualites = Actualite::with('media')->active()->orderBy('created_at', 'desc')->paginate(9)->withQueryString();
            return view('frontend.pages.actualites', compact('actualites'));
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Une erreur est survenue: ' . $th->getMessage());
        }
    }

    //detail actualite
    public function actualiteDetails($slug)
    {

        try {
            $actualite = Actualite::with('media')->active()->where('slug', $slug)->first();
            if (!$actualite) {
                return redirect()->route('page.actualites')->with('error', 'Actualité non trouvée.');
            }
            return view('frontend.pages.actualite-details', compact('actualite'));
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Une erreur est survenue: ' . $th->getMessage());
        }
    }


    //Envoyer un contact 
  


     public function envoyerContact(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'contact' => 'required|string|max:255',
            'message' => 'required|string',
            'sujet' => 'nullable|string|max:255',
        ]);


        try {
            $data = [
                'nom' => $request->nom,
                'email' => $request->email,
                'contact' => $request->contact,
                'sujet' => $request->sujet,
                'message' => $request->message,
            ];

            Mail::to('contact@scisage.com')->queue(new ContactMail($data));
            // Mail::to('contact@dcagency.com')
            //     ->later(now()->addSeconds(10), new ContactMail($data));


            return response()->json([
                'success' => true,
                'message' => 'Email envoyé avec succès'
            ]);
        } catch (\Throwable $e) {
            return response()->json([
                'success' => false,
                'message' => 'Erreur lors de l\'envoi de l\'email: ' . $e->getMessage()
            ], 500);
        }
    }


    
}
