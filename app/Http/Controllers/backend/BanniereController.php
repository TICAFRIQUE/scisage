<?php

namespace App\Http\Controllers\backend;

use App\Models\Banniere;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BanniereController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $bannieres = Banniere::get();
            return view('backend.pages.banniere.index', compact('bannieres'));
        } catch (\Throwable $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        try {
            return view('backend.pages.banniere.create');
        } catch (\Throwable $e) {
            return back()->with('error', $e->getMessage());
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
                'is_active' => 'required|boolean',
                'banniere' => 'required|image|mimes:jpg,jpeg,png,webp|max:1024', // max 1MB
            ]);

          
            $banniere = new Banniere();
            $banniere->is_active = $request->input('is_active');
            if ($request->hasFile('banniere')) {
                $banniere->addMediaFromRequest('banniere')->toMediaCollection('banniere');
            }

            $banniere->save();

            return redirect()->route('bannieres.index')->with('success', 'Banniere créée avec succès.');
        } catch (\Throwable $e) {
            return back()->with('error', $e->getMessage());
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
            $banniere = Banniere::findOrFail($id);
            return view('backend.pages.banniere.edit', compact('banniere'));
        } catch (\Throwable $e) {
            return back()->with('error', $e->getMessage());
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
                'is_active' => 'required|boolean',
                'banniere' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:1024', // max 1MB
            ]);

     

            $banniere = Banniere::findOrFail($id);
            $banniere->is_active = $request->input('is_active');

            if ($request->hasFile('banniere')) {
                // Supprimer l'ancienne image si elle existe
                if ($banniere->hasMedia('banniere')) {
                    $banniere->clearMediaCollection('banniere');
                }
                $banniere->addMediaFromRequest('banniere')->toMediaCollection('banniere');
            }

            $banniere->save();

            return redirect()->route('bannieres.index')->with('success', 'Banniere mise à jour avec succès.');
        } catch (\Throwable $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        try {
            $banniere = Banniere::findOrFail($id);
            // Supprimer l'image si elle existe
            if ($banniere->hasMedia('banniere')) {
                $banniere->clearMediaCollection('banniere');
            }
            $banniere->delete();

            //return response
            return response()->json(['success' => 'Banniere supprimée avec succès.', 'status' => 200]);
        } catch (\Throwable $e) {
            return back()->with('error', $e->getMessage());
        }
    }
}
