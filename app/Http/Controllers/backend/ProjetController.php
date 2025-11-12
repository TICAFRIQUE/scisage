<?php

namespace App\Http\Controllers\backend;

use App\Models\Projet;
use App\Models\Activite;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProjetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        try {
            $projets = Projet::all();
            return view('backend.pages.projet.index', compact('projets'));
        } catch (\Throwable $e) {
            # code...
        }
        return redirect()->back()->with('error', 'Une erreur est survenue, veuillez réessayer plus tard.');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        try {
            //recuperer les activites actives
            $activites = Activite::active()->get();

            return view('backend.pages.projet.create', compact('activites'));
        } catch (\Throwable $e) {
            # code...
        }
        return redirect()->back()->with('error', 'Une erreur est survenue, veuillez réessayer plus tard.');
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
                'etape' => 'required|string|max:255',
                'libelle' => 'required|string|max:255',
                'description' => 'required|string',
                'activite_id' => 'required|exists:activites,id',
                'is_active' => 'required|boolean',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
            ]);
            //etape, libelle,activite_id doivent etre unique ensemble
            $existingProjet = Projet::where('libelle', $request->libelle)
                ->where('etape', $request->etape)
                ->where('activite_id', $request->activite_id)
                ->first();
            if ($existingProjet) {
                return redirect()->back()->withInput()->with('error', 'Un projet avec le même libellé et activité existe déjà à l\'étape ' . $existingProjet->etape . 'de ' . $existingProjet->activite->libelle . '.');
            }

            //create une nouvelle etape de projet
            $projet = Projet::create([
                'etape' => $request->etape,
                'libelle' => $request->libelle,
                'description' => $request->description,
                'activite_id' => $request->activite_id,
                'is_active' => $request->is_active,
            ]);

            //ajout image
            if ($request->hasFile('image')) {
                $projet->addMediaFromRequest('image')->toMediaCollection('image');
            }

            return redirect()->route('projets.index')->with('success', 'Projet créé avec succès.');
        } catch (\Throwable $e) {
            # code...
        }
        return redirect()->back()->with('error', 'Une erreur est survenue, veuillez réessayer plus tard.');
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
            $projet = Projet::findOrFail($id);
            //recuperer les activites actives
            $activites = Activite::active()->get();
            return view('backend.pages.projet.edit', compact('projet', 'activites'));
        } catch (\Throwable $e) {
            return redirect()->back()->with('error', 'Une erreur est survenue, veuillez réessayer plus tard.' . $e->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        try {
            //validation
            $request->validate([
                'etape' => 'required|string|max:255',
                'libelle' => 'required|string|max:255',
                'description' => 'required|string',
                'activite_id' => 'required|exists:activites,id',
                'is_active' => 'required|boolean',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
            ]);

            $projet = Projet::findOrFail($id);

            //check unique
            $existingProjet = Projet::where('libelle', $request->libelle)
                ->where('activite_id', $request->activite_id)
                ->where('etape', $request->etape)
                ->where('id', '!=', $projet->id)
                ->first();
            if ($existingProjet) {
                return redirect()->back()->withInput()->with('error', 'Un projet avec le même libellé et activité existe déjà à l\'étape ' . $existingProjet->etape . 'de ' . $existingProjet->activite->libelle . '.');
            }

            //update projet
            $projet->update([
                'etape' => $request->etape,
                'libelle' => $request->libelle,
                'description' => $request->description,
                'activite_id' => $request->activite_id,
                'is_active' => $request->is_active,
            ]);

            //ajout image
            if ($request->hasFile('image')) {
                $projet->clearMediaCollection('image');
                $projet->addMediaFromRequest('image')->toMediaCollection('image');
            }

            return redirect()->route('projets.index')->with('success', 'Projet mis à jour avec succès.');
        } catch (\Throwable $e) {
            # code...
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        try {
            $projet = Projet::findOrFail($id);
            $projet->clearMediaCollection('image');
            $projet->delete();
            return response()->json(['success' => true, 'message' => 'Projet supprimé avec succès.' ,'status'=>200]);
        } catch (\Throwable $e) {
            # code...
        }
        return redirect()->back()->with('error', 'Une erreur est survenue, veuillez réessayer plus tard.');
    }
}
