<?php

namespace App\Http\Controllers;

use App\Models\Consultation;
use App\Models\Medecin;
use App\Models\Patient;
use App\Models\Service;
use Illuminate\Http\Request;

class ConsultationsController extends Controller
{
    public function index()
    {
        $consultations = Consultation::with(['medecin', 'patient', 'service'])->latest()->paginate(10);
        return view('consultations.index', compact('consultations'));
    }

    public function create()
    {
        $medecins = Medecin::all();
        $patients = Patient::all();
        $services = Service::all();
        return view('consultations.create', compact('medecins', 'patients', 'services'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'medecin_id' => 'required|exists:medecins,id',
            'patient_id' => 'required|exists:patients,id',
            'service_id' => 'required|exists:services,id',
            'date_consultation' => 'required|date',
        ]);

        // Récupération automatique du prix à partir du service
        $service = Service::findOrFail($request->service_id);

        Consultation::create([
            'medecin_id' => $request->medecin_id,
            'patient_id' => $request->patient_id,
            'service_id' => $request->service_id,
            'prix' => $service->prix,
            'notes' => $request->notes,
            'date_consultation' => $request->date_consultation
        ]);

        return redirect()->route('consultations.index')->with('success', 'Consultation ajoutée avec succès');
    }

    public function edit(Consultation $consultation)
    {
        $medecins = Medecin::all();
        $patients = Patient::all();
        $services = Service::all();
        return view('consultations.edit', compact('consultation', 'medecins', 'patients', 'services'));
    }

    public function update(Request $request, Consultation $consultation)
    {
        $request->validate([
            'medecin_id' => 'required|exists:medecins,id',
            'patient_id' => 'required|exists:patients,id',
            'service_id' => 'required|exists:services,id',
            'date_consultation' => 'required|date',
        ]);

        $service = Service::findOrFail($request->service_id);

        $consultation->update([
            'medecin_id' => $request->medecin_id,
            'patient_id' => $request->patient_id,
            'service_id' => $request->service_id,
            'prix' => $service->prix,
            'notes' => $request->notes,
            'date_consultation' => $request->date_consultation
        ]);

        return redirect()->route('consultations.index')->with('success', 'Consultation mise à jour avec succès');
    }

    public function destroy(Consultation $consultation)
    {
        $consultation->delete();
        return redirect()->route('consultations.index')->with('success', 'Consultation supprimée avec succès');
    }
}
