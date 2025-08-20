<?php

namespace App\Http\Controllers;

use App\Models\RendezVous;
use App\Models\Patient;
use App\Models\Medecin;
use Illuminate\Http\Request;

class RendezVousController extends Controller
{
    /**
     * Afficher la liste des rendez-vous
     */
    public function index()
    {
        $rendezvous = RendezVous::with(['patient', 'medecin'])
            ->orderBy('date_rdv', 'desc')
            ->paginate(10);

        $patients = Patient::orderBy('nom')->get();
        $medecins = Medecin::orderBy('nom')->get();

        return view('rendezvous.index', compact('rendezvous', 'patients', 'medecins'));
    }

    /**
     * Enregistrer un nouveau rendez-vous
     */
    public function store(Request $request)
    {
        $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'medecin_id' => 'required|exists:medecins,id',
            'date_rdv'   => 'required|date|after_or_equal:today',
            'heure_rdv'  => 'required',
            'motif'      => 'required|string|max:255',
        ]);

        RendezVous::create($request->all());

        return redirect()->route('rendezvous.index')->with('success', 'Rendez-vous ajouté avec succès.');
    }

    /**
     * Afficher le formulaire d'édition
     */
    public function edit($id)
    {
        $rdv = RendezVous::findOrFail($id);
        $patients = Patient::orderBy('nom')->get();
        $medecins = Medecin::orderBy('nom')->get();

        return view('rendezvous.edit', compact('rdv', 'patients', 'medecins'));
    }

    /**
     * Mettre à jour un rendez-vous
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'medecin_id' => 'required|exists:medecins,id',
            'date_rdv'   => 'required|date|after_or_equal:today',
            'heure_rdv'  => 'required',
            'motif'      => 'required|string|max:255',
        ]);

        $rdv = RendezVous::findOrFail($id);
        $rdv->update($request->all());

        return redirect()->route('rendezvous.index')->with('success', 'Rendez-vous mis à jour avec succès.');
    }

    /**
     * Supprimer un rendez-vous
     */
    public function destroy($id)
    {
        $rdv = RendezVous::findOrFail($id);
        $rdv->delete();

        return redirect()->route('rendezvous.index')->with('success', 'Rendez-vous supprimé avec succès.');
    }
}
