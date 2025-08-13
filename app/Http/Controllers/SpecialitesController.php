<?php

namespace App\Http\Controllers;

use App\Models\Specialite;
use Illuminate\Http\Request;

class SpecialitesController extends Controller
{
    
    public function index()
    {
        // Logique pour afficher la liste des spécialités
        // Par exemple, récupérer les spécialités depuis la base de données
        $specialites = Specialite::paginate(10);
        return view('specialites.index', compact('specialites'));
    }

    public function store(Request $request)
    {
       /*  
        1   Médecine générale
        2   Diabétologie
        3   Cardiologie
        4   Ophtalmologie
        5   Gynécologie
        6   Echographie (standard et spécialisée)
        7   Laboratoire d'analyse Médicales et Biologiques 
        */

        // Validation
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        // Enregistrement
        Specialite::create([
            'name' => $request->name,
        ]);

        return redirect()->back()->with('success', 'Spécialité du medecin ajouté avec succès.');
    }

    public function edit($id)
    {
        $specialite = Specialite::findOrFail($id);
        $specialites = Specialite::paginate(10); // Récupérer tous les médecins
        return view('specialites.edit', compact('specialite', 'specialites'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $specialite = Specialite::findOrFail($id);
        $specialite->update($request->all());

        return redirect()->route('specialites.index')->with('success', 'Spécialite du medecin modifié avec succès.');
    }

    public function destroy($id)
    {
        $specialite = Specialite::findOrFail($id);
        $specialite->delete();

        return redirect()->route('specialites.index')->with('success', 'Spécialité du medecin supprimé avec succès.');
    }

}
