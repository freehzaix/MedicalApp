@section('titlePage')
    Modifier un rendez-vous
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
                            <li class="breadcrumb-item"><a href="{{ route('rendezvous.index') }}">Gestion des rendez-vous</a></li>
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
                    <div class="col-md-6">
                        <div class="card card-warning">
                            <div class="card-header">
                                <h3 class="card-title"><i class="fas fa-edit"></i> Modifier le rendez-vous</h3>
                            </div>

                            <form method="POST" action="{{ route('rendezvous.update', $rdv->id) }}">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="patient_id">Patient</label>
                                        <select class="form-control" id="patient_id" name="patient_id" required>
                                            <option value="">Sélectionner un patient</option>
                                            @foreach($patients as $patient)
                                                <option value="{{ $patient->id }}" {{ $rdv->patient_id == $patient->id ? 'selected' : '' }}>
                                                    {{ $patient->nom }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="medecin_id">Médecin</label>
                                        <select class="form-control" id="medecin_id" name="medecin_id" required>
                                            <option value="">Sélectionner un médecin</option>
                                            @foreach($medecins as $medecin)
                                                <option value="{{ $medecin->id }}" {{ $rdv->medecin_id == $medecin->id ? 'selected' : '' }}>
                                                    {{ $medecin->nom }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="date_rdv">Date</label>
                                        <input type="date" class="form-control" id="date_rdv" name="date_rdv" value="{{ $rdv->date_rdv }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="heure_rdv">Heure</label>
                                        <input type="time" class="form-control" id="heure_rdv" name="heure_rdv" value="{{ $rdv->heure_rdv }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="motif">Motif</label>
                                        <textarea class="form-control" id="motif" name="motif" required>{{ $rdv->motif }}</textarea>
                                    </div>
                                </div>
                                <div class="card-footer d-flex justify-content-between">
                                    <a href="{{ route('rendezvous.index') }}" class="btn btn-secondary">Annuler</a>
                                    <button type="submit" class="btn btn-warning">Mettre à jour</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</x-layout>
