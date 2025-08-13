@section('titlePage')
    Nouvelle consultation
@endsection
<x-layout>
    <div class="content-wrapper">
        <!-- Content Header -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Tableau de bord</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Accueil</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('consultations.index') }}">Gestion des
                                    consultations</a></li>
                            <li class="breadcrumb-item active">@yield('titlePage')</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row justify-content-center">

                    <!-- Formulaire de création -->
                    <div class="col-md-6">
                        <div class="card card-success">
                            <div class="card-header">
                                <h3 class="card-title"><i class="fas fa-plus"></i> Nouvelle consultation</h3>
                            </div>

                            <form method="POST" action="{{ route('consultations.store') }}">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="medecin_id">Médecin</label>
                                        <select name="medecin_id" id="medecin_id" class="form-control" required>
                                            <option value="">-- Sélectionner --</option>
                                            @foreach ($medecins as $medecin)
                                                <option value="{{ $medecin->id }}">{{ $medecin->nom }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="patient_id">Patient</label>
                                        <select name="patient_id" id="patient_id" class="form-control" required>
                                            <option value="">-- Sélectionner --</option>
                                            @foreach ($patients as $patient)
                                                <option value="{{ $patient->id }}">{{ $patient->nom }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="service_id">Service</label>
                                        <select name="service_id" id="service_id" class="form-control" required>
                                            <option value="">-- Sélectionner --</option>
                                            @foreach ($services as $service)
                                                <option value="{{ $service->id }}" data-prix="{{ $service->prix }}">
                                                    {{ $service->nom }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="prix">Prix (FCFA)</label>
                                        <input type="number" step="0.01" class="form-control" id="prix"
                                            name="prix" readonly>
                                    </div>

                                    <div class="form-group">
                                        <label for="date_consultation">Date de consultation</label>
                                        <input type="datetime-local" class="form-control" id="date_consultation"
                                            name="date_consultation" value="{{ now()->format('Y-m-d\TH:i:s') }}"
                                            required>
                                    </div>

                                    <div class="form-group">
                                        <label for="notes">Notes</label>
                                        <textarea class="form-control" id="notes" name="notes">{{ old('notes') }}</textarea>
                                    </div>
                                </div>

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-success"><i class="fas fa-save"></i>
                                        Enregistrer</button>
                                    <a href="{{ route('consultations.index') }}" class="btn btn-secondary"><i
                                            class="fas fa-arrow-left"></i> Retour</a>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </section>
    </div>
</x-layout>

@push('scripts')
    <script>
        document.getElementById('service_id').addEventListener('change', function() {
            let prix = this.options[this.selectedIndex].getAttribute('data-prix');
            document.getElementById('prix').value = prix ? prix : '';
        });
    </script>
@endpush
