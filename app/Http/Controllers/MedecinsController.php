<?php

namespace App\Http\Controllers;

use App\Models\Medecin;
use App\Models\Specialite;
use App\Models\User;
use Illuminate\Http\Request;

class MedecinsController extends Controller
{

    public function index()
    {
        $medecins = User::role('medecin')->with('specialite')->paginate(10);
        $specialites = \App\Models\Specialite::all();

        return view('medecins.index', compact('medecins', 'specialites'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'telephone' => 'required|string|max:20',
            'tarif' => 'required|numeric',
            'specialite_id' => 'required|exists:specialites,id',
        ]);

        $user = User::create([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'email' => $request->email,
            'telephone' => $request->telephone,
            'tarif' => $request->tarif,
            'password' => bcrypt('password'), // mot de passe par défaut
            'specialite_id' => $request->specialite_id,
        ]);

        $user->assignRole('medecin');

        return redirect()->route('medecins.index')->with('success', 'Médecin ajouté avec succès.');
    }

    public function edit($id)
    {
        $medecin = User::role('medecin')->with('specialite')->findOrFail($id);
        $specialites = \App\Models\Specialite::all();

        return view('users.edit', compact('medecin', 'specialites'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'telephone' => 'required|string|max:20',
            'tarif' => 'required|numeric',
            'specialite_id' => 'required|exists:specialites,id',
        ]);

        $medecin = User::role('medecin')->findOrFail($id);

        $medecin->update([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'email' => $request->email,
            'telephone' => $request->telephone,
            'tarif' => $request->tarif,
            'specialite_id' => $request->specialite_id,
        ]);

        return redirect()->route('medecins.index')->with('success', 'Médecin modifié avec succès.');
    }

    public function destroy($id)
    {
        $medecin = User::role('medecin')->findOrFail($id);

        // Supprimer le rôle avant de supprimer l'utilisateur (optionnel mais propre)
        $medecin->removeRole('medecin');

        // Supprimer le compte utilisateur
        $medecin->delete();

        return redirect()->route('medecins.index')->with('success', 'Médecin supprimé avec succès.');
    }
}
