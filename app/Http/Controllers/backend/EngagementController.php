<?php

namespace App\Http\Controllers\backend;

use App\Models\Engagement;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EngagementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        try {
            $engagements = Engagement::all();
            return view('backend.pages.engagement.index', compact('engagements'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Une erreur est survenue lors de la récupération des engagements : ' . $e->getMessage());
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        try {
            return view('backend.pages.engagement.create');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Une erreur est survenue lors de l\'affichage du formulaire de création : ' . $e->getMessage());
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
                'libelle' => 'required|string|max:255',
                'description' => 'nullable|string',
                'icone' => 'nullable|string|max:255',
                'position' => 'nullable|integer',
                'is_active' => 'required|boolean',
                'image' => 'nullable|image|max:1024', // max 1MB

            ]);
            $engagement = Engagement::create([
                'libelle' => $request->libelle,
                'description' => $request->description,
                'icone' => $request->icone,
                'position' => $request->position,
                'is_active' => $request->is_active,
            ]);

            //image
            if ($request->hasFile('image')) {
                $engagement->addMediaFromRequest('image')->toMediaCollection('image');
            }

            return redirect()->route('engagements.index')->with('success', 'Engagement créé avec succès.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Erreur lors de la création de l\'engagement : ' . $e->getMessage());
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
            $engagement = Engagement::findOrFail($id);
            return view('backend.pages.engagement.edit', compact('engagement'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Une erreur est survenue lors de l\'affichage du formulaire d\'édition : ' . $e->getMessage());
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
                'description' => 'nullable|string',
                'icone' => 'nullable|string|max:255',
                'position' => 'nullable|integer',
                'is_active' => 'required|boolean',
                'image' => 'nullable|image|max:1024', // max 1MB
            ]);
            $engagement = Engagement::findOrFail($id);
            $engagement->update([
                'libelle' => $request->libelle,
                'description' => $request->description,
                'icone' => $request->icone,
                'position' => $request->position,
                'is_active' => $request->is_active,
            ]);

            //image
            if ($request->hasFile('image')) {
                $engagement->clearMediaCollection('image');
                $engagement->addMediaFromRequest('image')->toMediaCollection('image');
            }

            return redirect()->route('engagements.index')->with('success', 'Engagement mis à jour avec succès.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Une erreur est survenue lors de la mise à jour de l\'engagement : ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        try {
            $engagement = Engagement::findOrFail($id);
            // Supprimer les médias associés
            $engagement->clearMediaCollection('image');
            $engagement->delete();
            return response()->json(['success' => 'Engagement supprimé avec succès.', 'status' => 200]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Erreur lors de la suppression de l\'engagement : ' . $e->getMessage(), 'status' => 500]);
        }
    }
}
