<?php

namespace App\Http\Controllers;

use App\Models\Departement;
use Illuminate\Http\Request;

class DepartementController extends Controller
{
    public function index()
    {
        $departements = Departement::paginate(10);
        return view('departements.index', compact('departements'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'libelle' => 'required|string|max:255',
        ]);

        Departement::create($request->only('libelle'));

        return redirect()->route('departements.index')->with('success', 'Département ajouté avec succès.');
    }

    public function edit(Departement $departement)
    {
        $departements = Departement::paginate(10);
        return view('departements.edit', compact('departement', 'departements'));
    }

    public function update(Request $request, Departement $departement)
    {
        $request->validate([
            'libelle' => 'required|string|max:255',
        ]);

        $departement->update($request->only('libelle'));

        return redirect()->route('departements.index')->with('success', 'Département modifié avec succès.');
    }

    public function destroy(Departement $departement)
    {
        $departement->delete();
        return redirect()->route('departements.index')->with('success', 'Département supprimé avec succès.');
    }
    
}
