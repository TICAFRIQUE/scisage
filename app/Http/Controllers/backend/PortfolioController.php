<?php

namespace App\Http\Controllers\backend;

use App\Models\Portfolio;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        try {
            $portfolios = Portfolio::all();
            return view('backend.pages.portfolio.index', compact('portfolios'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Une erreur est survenue: ' . $e->getMessage());
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        try {
            $categories = ['realisations', 'projets', 'conceptions'];
            return view('backend.pages.portfolio.create', compact('categories'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Une erreur est survenue: ' . $e->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        try {
            //validation
            $request->validate([
                'image_principale' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
                'categorie' => 'required|string',
                'libelle' => 'required|string',
                'type' => 'required|string',
                'caracteristique' => 'required|string',
                'localisation' => 'required|string',
                'is_active' => 'required|boolean',
                'prix' => 'nullable|numeric|min:0',
            ]);


            //create portfolio
            $portfolio = Portfolio::create([
                'categorie' => $request->categorie,
                'libelle' => $request->libelle,
                'type' => $request->type,
                'prix' => $request->prix,
                'caracteristique' => $request->caracteristique,
                'localisation' => $request->localisation,
                'is_active' => $request->is_active,
            ]);

            //enregistrer l'image avec media library
            if ($request->hasFile('image_principale')) {
                $portfolio->addMediaFromRequest('image_principale')->toMediaCollection('image_principale');
            }

            //enregistrer la gallerie d'images si elle existe
            if ($request->hasFile('galerie')) {
                foreach ($request->file('galerie') as $image) {
                    $portfolio->addMedia($image)->toMediaCollection('galerie');
                }
            }

            return redirect()->route('portfolios.index')->with('success', 'Portfolio créé avec succès.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Une erreur est survenue: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        try {
            $portfolio = Portfolio::findOrFail($id);
            $categories = ['realisations', 'projets', 'conceptions'];
            return view('backend.pages.portfolio.edit', compact('portfolio', 'categories'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Une erreur est survenue: ' . $e->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        try {
            $portfolio = Portfolio::findOrFail($id);

            //validation
            $request->validate([
                'libelle' => 'required|string|max:255',
                'categorie' => 'required|string|in:realisations,projets,conceptions',
                'type' => 'nullable|string|max:255',
                'caracteristique' => 'nullable|string',
                'localisation' => 'nullable|string|max:255',
                'prix' => 'nullable|numeric|min:0',
                'is_active' => 'boolean',
                'image_principale' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:1024',
                'galerie' => 'nullable|array|max:10',
                'galerie.*' => 'image|mimes:jpeg,png,jpg,gif,webp|max:1024',
                'deleted_images' => 'nullable|string', // Validation pour les suppressions
            ]);

            //update portfolio
            $portfolio->update([
                'libelle' => $request->libelle,
                'categorie' => $request->categorie,
                'type' => $request->type,
                'caracteristique' => $request->caracteristique,
                'localisation' => $request->localisation,
                'prix' => $request->prix,
                'is_active' => $request->has('is_active') ? $request->is_active : 1,
            ]);

            //mettre à jour l'image principale si nouvelle image
            if ($request->hasFile('image_principale')) {
                $portfolio->clearMediaCollection('image_principale');
                $portfolio->addMediaFromRequest('image_principale')
                    ->toMediaCollection('image_principale');
            }

            // Supprimer les images de galerie sélectionnées
            if ($request->filled('deleted_images')) {
                $deletedImageIds = explode(',', $request->deleted_images);
                foreach ($deletedImageIds as $mediaId) {
                    if (is_numeric($mediaId)) {
                        // Trouver et supprimer le média spécifique
                        $media = $portfolio->getMedia('galerie')->where('id', $mediaId)->first();
                        if ($media) {
                            $media->delete();
                        }
                    }
                }
            }

            //ajouter de nouvelles images à la galerie
            if ($request->hasFile('galerie')) {
                foreach ($request->file('galerie') as $image) {
                    $portfolio->addMedia($image)
                        ->toMediaCollection('galerie');
                }
            }

            return redirect()->route('portfolios.index')
                ->with('success', 'Portfolio mis à jour avec succès.');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Une erreur est survenue: ' . $e->getMessage())
                ->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        try {
            $portfolio = Portfolio::findOrFail($id);
            //supprimer les médias associés
            $portfolio->clearMediaCollection('image_principale');
            $portfolio->clearMediaCollection('galerie');
            //supprimer le portfolio
            $portfolio->delete();
            return response()->json(['success' => true, 'message' => 'Portfolio supprimé avec succès.' , 'status' => 200]);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Une erreur est survenue: ' . $e->getMessage());
        }
    }
}
