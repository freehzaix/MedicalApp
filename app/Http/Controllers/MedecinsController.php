<?php

namespace App\Http\Controllers;

use App\Models\Medecin;
use App\Models\Specialite;
use Illuminate\Http\Request;

class MedecinsController extends Controller
{

    public function index()
    {
        // Logique pour afficher la liste des médecins
        // Par exemple, récupérer les médecins depuis la base de données
        $medecins = Medecin::paginate(5);
        $specialites = Specialite::all();
        return view('medecins.index', compact('medecins', 'specialites'));
    }

    public function store(Request $request)
    {
        // Validation
        $request->validate([
            'nom' => 'required|string|max:255',
            'specialite_id' => 'required|string|max:255',
            'telephone' => 'required|string|max:20',
            'tarif' => 'required|string',
        ]);

        // Enregistrement
        Medecin::create([
            'nom' => $request->nom,
            'specialite_id' => $request->specialite_id,
            'telephone' => $request->telephone,
            'tarif' => $request->tarif,
        ]);

        return redirect()->back()->with('success', 'Médecin ajouté avec succès.');
    }

    public function edit($id)
    {
        $medecin = Medecin::findOrFail($id);
        $specialites = Specialite::all();
        $medecins = Medecin::paginate(5); // Récupérer tous les médecins
        return view('medecins.edit', compact('medecin', 'specialites', 'medecins'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nom' => 'required',
            'specialite_id' => 'required',
            'telephone' => 'required',
            'tarif' => 'required',
        ]);

        $medecin = Medecin::findOrFail($id);
        $medecin->update($request->all());

        return redirect()->route('medecins.index')->with('success', 'Médecin modifié avec succès.');
    }

    public function destroy($id)
    {
        $medecin = Medecin::findOrFail($id);
        $medecin->delete();

        return redirect()->route('medecins.index')->with('success', 'Médecin supprimé avec succès.');
    }

}
