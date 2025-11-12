<?php

namespace App\Http\Controllers\backend;

use App\Models\Equipe;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EquipeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        try {
            $equipes = Equipe::all();
            return view('backend.pages.equipe.index', compact('equipes'));
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
            return view('backend.pages.equipe.create');
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
            $request->validate([
                'nom' => 'required|string|max:255',
                'prenoms' => 'required|string|max:255',
                'fonction' => 'required|string|max:255',
                'description' => 'nullable|string',
                'is_active' => 'required|boolean',
                'image' => 'nullable|image|max:1024', // max 1MB
            ]);

            $equipe = new Equipe();
            $equipe->nom = $request->input('nom');
            $equipe->prenoms = $request->input('prenoms');
            $equipe->fonction = $request->input('fonction');
            $equipe->description = $request->input('description');
            $equipe->is_active = $request->input('is_active');
            $equipe->save();

            //enregistrement des medias avec spatie
            if ($request->hasFile('image')) {
                $equipe->addMediaFromRequest('image')->toMediaCollection('image');
            }

            return redirect()->route('equipes.index')->with('success', 'Equipe créée avec succès.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Erreur lors de la création de l\'équipe : ' . $e->getMessage());
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
            $equipe = Equipe::findOrFail($id);
            return view('backend.pages.equipe.edit', compact('equipe'));
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
            $request->validate([
                'nom' => 'required|string|max:255',
                'prenoms' => 'required|string|max:255',
                'fonction' => 'required|string|max:255',
                'description' => 'nullable|string',
                'is_active' => 'required|boolean',
                'image' => 'nullable|image|max:1024', // max 1MB
            ]);

            $equipe = Equipe::findOrFail($id);
            $equipe->nom = $request->input('nom');
            $equipe->prenoms = $request->input('prenoms');
            $equipe->fonction = $request->input('fonction');
            $equipe->description = $request->input('description');
            $equipe->is_active = $request->input('is_active');
            $equipe->save();

            //enregistrement des medias avec spatie
            if ($request->hasFile('image')) {
                $equipe->clearMediaCollection('image');
                $equipe->addMediaFromRequest('image')->toMediaCollection('image');
            }

            return redirect()->route('equipes.index')->with('success', 'Equipe mise à jour avec succès.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Erreur lors de la mise à jour de l\'équipe : ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        try {
            $equipe = Equipe::findOrFail($id);
            $equipe->clearMediaCollection('image');
            $equipe->delete();
            return response()->json(['success' => true, 'message' => 'Équipe supprimée avec succès.', 'status' => 200]);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Erreur lors de la suppression de l\'équipe : ' . $e->getMessage());
        }
    }
}
