<?php

namespace App\Http\Controllers\backend;

use App\Models\Activite;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ActiviteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        try {
            $activites = Activite::all();
            return view('backend.pages.activite.index', compact('activites'));
        } catch (\Throwable $e) {
            # code...
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        try {
            return view('backend.pages.activite.create');
        } catch (\Throwable $e) {
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
            $data = $request->validate([
                'libelle' => 'required|string',
                'description' => 'nullable|string',
                'icone' => 'nullable|string',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
                'position' => 'required|integer',
                'is_active' => 'required|boolean',
            ]);

            $activite = Activite::create([
                'libelle' => $request->libelle,
                'description' => $request->description,
                'icone' => $request->icone,
                'position' => $request->position,
                'is_active' => $request->is_active,
            ]);

            // Handle image upload
            if ($request->hasFile('image')) {
                $activite->addMediaFromRequest('image')->toMediaCollection('image');
            }

            return redirect()->route('activites.index')->with('success', 'Activité créée avec succès.');
        } catch (\Throwable $e) {
            return back()->with('error', 'Une erreur est survenue lors de la création de l\'activité.' . $e->getMessage());
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
            $activite = Activite::findOrFail($id);
            return view('backend.pages.activite.edit', compact('activite'));
        } catch (\Throwable $e) {
            return back()->with('error', 'Une erreur est survenue lors du chargement du formulaire.' . $e->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        try {
            $activite = Activite::findOrFail($id);

            $data = $request->validate([
                'libelle' => 'required|string',
                'description' => 'nullable|string',
                'icone' => 'nullable|string',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
                'position' => 'required|integer',
                'is_active' => 'required|boolean',
            ]);

            $activite->update([
                'libelle' => $request->libelle,
                'description' => $request->description,
                'icone' => $request->icone,
                'position' => $request->position,
                'is_active' => $request->is_active,
            ]);

            // Handle image upload
            if ($request->hasFile('image')) {
                // Remove old image if exists
                $activite->clearMediaCollection('image');
                $activite->addMediaFromRequest('image')->toMediaCollection('image');
            }

            return redirect()->route('activites.index')->with('success', 'Activité mise à jour avec succès.');
        } catch (\Throwable $e) {
            return back()->with('error', 'Une erreur est survenue lors de la mise à jour de l\'activité.' . $e->getMessage());
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        try {
            $activite = Activite::findOrFail($id);
            $activite->clearMediaCollection('image'); // Remove associated media
            $activite->delete();
            return response()->json(['success' => 'Activité supprimée avec succès.' , 'status' => 200]);
        } catch (\Throwable $e) {
            return back()->with('error', 'Une erreur est survenue lors de la suppression de l\'activité.' . $e->getMessage());
        }
    }
}
