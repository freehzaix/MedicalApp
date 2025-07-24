<?php

namespace App\Http\Controllers;

use App\Models\Medecin;
use Illuminate\Http\Request;

class MedecinsController extends Controller
{

    public function index()
    {
        // Logique pour afficher la liste des médecins
        // Par exemple, récupérer les médecins depuis la base de données
        $medecins = Medecin::paginate(5);
        return view('medecins.index', compact('medecins'));
    }

    public function store(Request $request)
    {
        // Validation
        $request->validate([
            'nom' => 'required|string|max:255',
            'specialite' => 'required|string|max:255',
            'telephone' => 'required|string|max:20',
        ]);

        // Enregistrement
        Medecin::create([
            'nom' => $request->nom,
            'specialite' => $request->specialite,
            'telephone' => $request->telephone,
        ]);

        return redirect()->back()->with('success', 'Médecin ajouté avec succès.');
    }

    public function edit($id)
    {
        $medecin = Medecin::findOrFail($id);
        $medecins = Medecin::paginate(5); // Récupérer tous les médecins
        return view('medecins.edit', compact('medecin', 'medecins'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nom' => 'required',
            'specialite' => 'required',
            'telephone' => 'required',
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
