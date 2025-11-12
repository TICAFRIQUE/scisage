<?php

namespace App\Http\Controllers\backend;

use App\Models\Faq;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        try {
            $faqs = Faq::ordre()->get();
            return view('backend.pages.faq.index', compact('faqs'));
        } catch (\Throwable $e) {
            return redirect()->back()->with('error', 'Une erreur est survenue, veuillez réessayer plus tard.' . $e->getMessage());
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        try {
            return view('backend.pages.faq.create');
        } catch (\Throwable $e) {
            return redirect()->back()->with('error', 'Une erreur est survenue, veuillez réessayer plus tard.' . $e->getMessage());
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
                'question' => 'required|string|max:255',
                'reponse' => 'required|string',
                'position' => 'required|integer|min:1',
                'is_active' => 'required|boolean',
            ]);

            //create faq
            Faq::create([
                'question' => $request->question,
                'reponse' => $request->reponse,
                'position' => $request->position,
                'is_active' => $request->is_active,
            ]);

            return redirect()->route('faqs.index')->with('success', 'FAQ créée avec succès.');
        } catch (\Throwable $e) {
            return redirect()->back()->with('error', 'Une erreur est survenue, veuillez réessayer plus tard.' . $e->getMessage());
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
            $faq = Faq::findOrFail($id);
            return view('backend.pages.faq.edit', compact('faq'));
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
                'question' => 'required|string|max:255',
                'reponse' => 'required|string',
                'position' => 'required|integer|min:1',
                'is_active' => 'required|boolean',
            ]);

            //update faq
            $faq = Faq::findOrFail($id);
            $faq->update([
                'question' => $request->question,
                'reponse' => $request->reponse,
                'position' => $request->position,
                'is_active' => $request->is_active,
            ]);

            return redirect()->route('faqs.index')->with('success', 'FAQ mise à jour avec succès.');
        } catch (\Throwable $e) {
            return redirect()->back()->with('error', 'Une erreur est survenue, veuillez réessayer plus tard.' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        try {
            $faq = Faq::findOrFail($id);
            $faq->delete();
            return response()->json(['success' => true, 'message' => 'FAQ supprimée avec succès.' , 'status' => 200]);
        } catch (\Throwable $e) {
            return redirect()->back()->with('error', 'Une erreur est survenue, veuillez réessayer plus tard.' . $e->getMessage());
        }
    }
}
