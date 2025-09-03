<?php

namespace App\Http\Controllers;

use App\Models\Departement;
use App\Models\TypeExamen;
use Illuminate\Http\Request;

class TypeExamenController extends Controller
{

    public function index()
    {
        $departements = Departement::all();
        $typeexamens = TypeExamen::paginate(10);
        return view('typeexamens.index', compact('typeexamens', 'departements'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'libelle' => 'required|string|max:255',
        ]);

        TypeExamen::create($request->only('libelle', 'departement_id'));

        return redirect()->route('typeexamens.index')->with('success', 'Type examen ajouté avec succès.');
    }

    public function edit(TypeExamen $typeexamen)
    {
        $typeexamens = TypeExamen::paginate(10);
        $departements = Departement::all();
        return view('typeexamens.edit', compact('typeexamen', 'typeexamens', 'departements'));
    }

    public function update(Request $request, TypeExamen $typeExamen)
    {
        $request->validate([
            'libelle' => 'required|string|max:255',
        ]);

        $typeExamen->update($request->only('libelle', 'departement_id'));

        return redirect()->route('typeexamens.index')->with('success', 'Type examen modifié avec succès.');
    }

    public function destroy(TypeExamen $typeExamen)
    {
        $typeExamen->delete();
        return redirect()->route('typeexamens.index')->with('success', 'Type examen supprimé avec succès.');
    }
    

}
