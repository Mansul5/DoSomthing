<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tache;


class tacheController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tache = tache::all();
        return view('liste-taches', compact('tache'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('create-tache');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'completed' => 'boolean',
        ]);

        tache::create([
            'title' => $request->title,
            'description' => $request->description,
            'completed' => $request->completed ?? false,
        ]);

        return redirect()->route('tache.index')->with('success', 'Tâche créée avec succès.');  
        
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
        $tache = tache::findOrFail($id);
        return view('edit-tache', compact('tache'));
           
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'completed' => 'boolean',
        ]);

        $tache = tache::findOrFail($id);
        $tache->update([
            'title' => $request->title,
            'description' => $request->description,
            'completed' => $request->completed ?? false,
        ]);

        return redirect()->route('tache.index')->with('success', 'Tâche mise à jour avec succès.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
    
        $tache = tache::findOrFail($id);
        $tache->delete();

        return redirect()->route('tache.index')->with('success', 'Tâche supprimée avec succès.');
    }
}
