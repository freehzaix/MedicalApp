<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;

class PatientsController extends Controller
{

    public function index()
    {
        $patients = Patient::latest()->paginate(5); // ou simplePaginate(10)
        return view('patients.index', compact('patients'));
    }

    // Affiche le formulaire de modification d'un patient
    public function edit($id)
    {
        $patient = Patient::findOrFail($id);
        $patients = Patient::latest()->paginate(5); // pour garder la liste visible
        return view('patients.edit', compact('patient', 'patients'));
    }

    // Enregistre un nouveau patient
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'date_naissance' => 'required|date',
            'genre' => 'required|in:Homme,Femme',
            'telephone' => 'required|string|max:20',
            'adresse' => 'required|string|max:255',
        ]);

        Patient::create($request->all());

        return redirect()->route('patients.index')->with('success', 'Patient ajouté avec succès.');
    }

    // Met à jour un patient existant
    public function update(Request $request, $id)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'date_naissance' => 'required|date',
            'genre' => 'required|in:Homme,Femme',
            'telephone' => 'required|string|max:20',
            'adresse' => 'required|string|max:255',
        ]);

        $patient = Patient::findOrFail($id);
        $patient->update($request->all());

        return redirect()->route('patients.index')->with('success', 'Patient modifié avec succès.');
    }

    // Supprime un patient
    public function destroy($id)
    {
        $patient = Patient::findOrFail($id);
        $patient->delete();

        return redirect()->route('patients.index')->with('success', 'Patient supprimé avec succès.');
    }

    

}
