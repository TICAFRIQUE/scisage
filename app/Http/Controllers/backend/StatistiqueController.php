<?php

namespace App\Http\Controllers\backend;

use App\Models\Statistique;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StatistiqueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $statistiques = Statistique::all();
        return view('backend.pages.statistique.index', compact('statistiques'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.pages.statistique.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        try {
            $request->validate([
                'libelle' => 'required|string|max:255',
                'icone' => 'required|string|max:255',
                'chiffre' => 'required|integer',
                'description' => 'nullable|string',
                'position' => 'nullable|integer',
                'is_active' => 'required|boolean',
                'image' => 'nullable|image|max:1024', // max 1MB
            ]);
            $statistique = Statistique::create([
                'libelle' => $request->libelle,
                'icone' => $request->icone,
                'chiffre' => $request->chiffre,
                'description' => $request->description,
                'position' => $request->position,
                'is_active' => $request->is_active,
            ]);

            // Ajouter l'image si elle est présente dans la requête
            if ($request->hasFile('image')) {
                $statistique->addMediaFromRequest('image')->toMediaCollection('image');
            }

            return redirect()->route('statistiques.index')->with('success', 'Statistique créée avec succès.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Erreur lors de la création de la statistique : ' . $e->getMessage());
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
            $statistique = Statistique::findOrFail($id);
            return view('backend.pages.statistique.edit', compact('statistique'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Erreur lors de la récupération de la statistique : ' . $e->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        try {
            $request->validate([
                'libelle' => 'required|string|max:255',
                'icone' => 'required|string|max:255',
                'chiffre' => 'required|integer',
                'description' => 'nullable|string',
                'position' => 'nullable|integer',
                'is_active' => 'required|boolean',
                'image' => 'nullable|image|max:1024', // max 1MB
            ]);
            $statistique = Statistique::findOrFail($id);
            $statistique->update([
                'libelle' => $request->libelle,
                'icone' => $request->icone,
                'chiffre' => $request->chiffre,
                'description' => $request->description,
                'position' => $request->position,
                'is_active' => $request->is_active,
            ]);

            // Ajouter l'image si elle est présente dans la requête
            if ($request->hasFile('image')) {
                $statistique->clearMediaCollection('image');
                $statistique->addMediaFromRequest('image')->toMediaCollection('image');
            }

            return redirect()->route('statistiques.index')->with('success', 'Statistique mise à jour avec succès.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Erreur lors de la mise à jour de la statistique : ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        try {
            $statistique = Statistique::findOrFail($id);
            // Supprimer les médias associés
            $statistique->clearMediaCollection('image');
            $statistique->delete();
            return response()->json(['success' => 'Statistique supprimée avec succès.', 'status' => 200]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Erreur lors de la suppression de la statistique : ' . $e->getMessage(), 'status' => 500]);
        }
    }
}
