<?php

namespace App\Http\Controllers\backend;

use App\Models\Actualite;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ActualiteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        try {
            $actualites = Actualite::orderBy('created_at', 'desc')->get();
            return view('backend.pages.actualite.index', compact('actualites'));
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
            return view('backend.pages.actualite.create');
        } catch (\Exception $e) {
            return back()->with('error', 'Une erreur est survenue lors du chargement du formulaire.' . $e->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        try {
            $request->validate([
                'libelle' => 'required|string',
                'description' => 'nullable|string',
                'image_principale' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
                'is_active' => 'required|boolean',
            ]);

            $actualite = Actualite::create([
                'libelle' => $request->libelle,
                'description' => $request->description,
                'is_active' => $request->is_active,
            ]);

            //    //enregistrer l'image avec media library
            if ($request->hasFile('image_principale')) {
                $actualite->addMediaFromRequest('image_principale')->toMediaCollection('image_principale');
            }

            //enregistrer la gallerie d'images si elle existe
            if ($request->hasFile('galerie')) {
                foreach ($request->file('galerie') as $image) {
                    $actualite->addMedia($image)->toMediaCollection('galerie');
                }
            }

            return redirect()->route('actualites.index')->with('success', 'Actualite créée avec succès.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Une erreur est survenue lors de la création de l\'actualite: ' . $e->getMessage());
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
            $actualite = Actualite::findOrFail($id);
            return view('backend.pages.actualite.edit', compact('actualite'));
        } catch (\Exception $e) {
            return back()->with('error', 'Une erreur est survenue lors du chargement du formulaire d\'édition.' . $e->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        try {
            $actualite = Actualite::findOrFail($id);
            $request->validate([
                'libelle' => 'required|string',
                'description' => 'nullable|string',
                'is_active' => 'required|boolean',
                'image_principale' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:1024',
                'galerie' => 'nullable|array|max:10',
                'galerie.*' => 'image|mimes:jpeg,png,jpg,gif,webp|max:1024',
                'deleted_images' => 'nullable|string', // Validation pour les suppressions
            ]);
            $actualite->update([
                'libelle' => $request->libelle,
                'description' => $request->description,
                'is_active' => $request->is_active,
            ]);


            //mettre à jour l'image principale si nouvelle image
            if ($request->hasFile('image_principale')) {
                $actualite->clearMediaCollection('image_principale');
                $actualite->addMediaFromRequest('image_principale')
                    ->toMediaCollection('image_principale');
            }

            // Supprimer les images de galerie sélectionnées
            if ($request->filled('deleted_images')) {
                $deletedImageIds = explode(',', $request->deleted_images);
                foreach ($deletedImageIds as $mediaId) {
                    if (is_numeric($mediaId)) {
                        // Trouver et supprimer le média spécifique
                        $media = $actualite->getMedia('galerie')->where('id', $mediaId)->first();
                        if ($media) {
                            $media->delete();
                        }
                    }
                }
            }

            //ajouter de nouvelles images à la galerie
            if ($request->hasFile('galerie')) {
                foreach ($request->file('galerie') as $image) {
                    $actualite->addMedia($image)
                        ->toMediaCollection('galerie');
                }
            }

            return redirect()->route('actualites.index')->with('success', 'Actualite mise à jour avec succès.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Une erreur est survenue lors de la mise à jour de l\'actualite: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
  public function destroy(string $id)
    {
        //
        try {
            $actualite = Actualite::findOrFail($id);
            //supprimer les médias associés
            $actualite->clearMediaCollection('image_principale');
            $actualite->clearMediaCollection('galerie');
            //supprimer le actualite
            $actualite->delete();
            return response()->json(['success' => true, 'message' => 'Actualité supprimée avec succès.' , 'status' => 200]);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Une erreur est survenue: ' . $e->getMessage());
        }
    }
}
