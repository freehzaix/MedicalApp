@section('titlePage')
    Gestion des rendez-vous
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
                            <li class="breadcrumb-item active">@yield('titlePage')</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">

                    <!-- Formulaire d'ajout de rendez-vous -->
                    <div class="col-md-4">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title"><i class="fas fa-calendar-plus"></i> Ajouter un rendez-vous</h3>
                            </div>

                            <form method="POST" action="{{ route('rendezvous.store') }}">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="patient_id">Patient</label>
                                        <select class="form-control" id="patient_id" name="patient_id" required>
                                            <option value="">Sélectionner un patient</option>
                                            @foreach ($patients as $patient)
                                                <option value="{{ $patient->id }}">{{ $patient->nom }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="medecin_id">Médecin</label>
                                        <select class="form-control" id="medecin_id" name="medecin_id" required>
                                            <option value="">Sélectionner un médecin</option>
                                            @foreach ($medecins as $medecin)
                                                <option value="{{ $medecin->id }}">{{ $medecin->nom }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="date_rdv">Date</label>
                                        <input type="date" class="form-control" id="date_rdv" name="date_rdv"
                                            required>
                                    </div>
                                    <div class="form-group">
                                        <label for="heure_rdv">Heure</label>
                                        <input type="time" class="form-control" id="heure_rdv" name="heure_rdv"
                                            required>
                                    </div>
                                    <div class="form-group">
                                        <label for="motif">Motif</label>
                                        <textarea class="form-control" id="motif" name="motif" placeholder="Préciser le motif" required></textarea>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- Liste des rendez-vous -->
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title"><i class="fas fa-calendar-alt"></i> Liste des rendez-vous</h3>
                            </div>
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Patient</th>
                                            <th>Médecin</th>
                                            <th>Date</th>
                                            <th>Heure</th>
                                            <th>Motif</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($rendezvous as $rdv)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $rdv->patient->nom }}</td>
                                                <td>{{ $rdv->medecin->nom }}</td>
                                                <td>{{ \Carbon\Carbon::parse($rdv->date_rdv)->format('d/m/Y') }}</td>
                                                <td>{{ \Carbon\Carbon::parse($rdv->heure_rdv)->format('H:i') }}</td>
                                                <td>
                                                    <span class="badge {{ $rdv->motif == 'terminé' ? 'btn btn-success' : ($rdv->motif == 'annulé' ? 'btn btn-danger' : 'btn btn-primary') }}">
                                                        {{ ucfirst($rdv->motif) }}
                                                    </span>
                                                </td>
                                                <td>
                                                    <a href="{{ route('rendezvous.edit', $rdv->id) }}"
                                                        class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                                                    <form action="{{ route('rendezvous.destroy', $rdv->id) }}"
                                                        method="POST" style="display:inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm"
                                                            onclick="return confirm('Supprimer ce rendez-vous ?')"><i
                                                                class="fas fa-trash"></i></button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                                <!-- Pagination -->
                                <div class="d-flex justify-content-center mt-3">
                                    {{ $rendezvous->links('pagination::bootstrap-4') }}
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
    </div>
</x-layout>
