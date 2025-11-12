<?php

namespace App\Http\Controllers\backend;

use App\Models\Apropos;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AproposController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        try {
            $apropos = Apropos::all();
            return view('backend.pages.apropos.index', compact('apropos'));
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
            return view('backend.pages.apropos.create');
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
                'description' => 'required|string',
            ]);

            $apropos = new Apropos();
            $apropos->description = $request->input('description');
            $apropos->is_active = $request->input('is_active');
            $apropos->save();

            //enregistrement des medias avec spatie
            if ($request->hasFile('image')) {
                $apropos->addMediaFromRequest('image')->toMediaCollection('image');
            }

            return redirect()->route('apropos.index')->with('success', 'Apropos créé avec succès.');
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
            $apropos = Apropos::findOrFail($id);
            return view('backend.pages.apropos.edit', compact('apropos'));
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
                'description' => 'required|string',
            ]);

            $apropos = Apropos::findOrFail($id);
            $apropos->description = $request->input('description');
            $apropos->is_active = $request->input('is_active');
            $apropos->save();

            //enregistrement des medias avec spatie
            if ($request->hasFile('image')) {
                $apropos->clearMediaCollection('image');
                $apropos->addMediaFromRequest('image')->toMediaCollection('image');
            }

            return redirect()->route('apropos.index')->with('success', 'Apropos mis à jour avec succès.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Une erreur est survenue: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        try {
            $apropos = Apropos::findOrFail($id);
            $apropos->clearMediaCollection('image');
            $apropos->delete();
            return response()->json(['success' => 'Apropos supprimé avec succès.', 'status' => 200]);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Une erreur est survenue: ' . $e->getMessage());
        }
    }
}
