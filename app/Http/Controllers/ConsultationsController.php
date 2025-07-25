<?php

namespace App\Http\Controllers;

use App\Models\Consultation;
use App\Models\Medecin;
use App\Models\Patient;
use Illuminate\Http\Request;

class ConsultationsController extends Controller
{
    public function index()
    {
        $consultations = Consultation::with(['patient', 'medecin'])->latest()->get();
        $patients = Patient::all();
        $medecins = Medecin::all();

        return view('consultations.index', compact('consultations', 'patients', 'medecins'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'medecin_id' => 'required|exists:medecins,id',
            'motif' => 'required|string',
            'observation' => 'nullable|string',
            'tarif' => 'nullable|string',
        ]);

        Consultation::create($validated);

        return redirect()->route('consultations.index')->with('success', 'Consultation enregistrée.');
    }

    public function edit(Consultation $consultation)
    {
        $patients = Patient::all();
        $medecins = Medecin::all();
        $consultations = Consultation::with(['patient', 'medecin'])->latest()->get();
        return view('consultations.edit', compact('consultation', 'patients', 'medecins', 'consultations'));
    }

    public function update(Request $request, Consultation $consultation)
    {
        $validated = $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'medecin_id' => 'required|exists:medecins,id',
            'motif' => 'required|string',
            'observation' => 'nullable|string',
            'tarif' => 'nullable|string',
        ]);

        $consultation->update($validated);

        return redirect()->route('consultations.index')->with('success', 'Consultation mise à jour.');
    }

    public function destroy(Consultation $consultation)
    {
        $consultation->delete();
        return redirect()->route('consultations.index')->with('success', 'Consultation supprimée.');
    }
}
