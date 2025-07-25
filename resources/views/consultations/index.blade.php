@section('titlePage')
    Gestion des consultations
@endsection
<x-layout>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Tableau de bord</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Accueil</a></li>
                            <li class="breadcrumb-item active">@yield('titlePage')</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">

                    <!-- Formulaire d'enregistrement de consultation -->
                    <div class="col-md-4">
                        <div class="card card-warning">
                            <div class="card-header">
                                <h3 class="card-title"><i class="fas fa-notes-medical"></i> Nouvelle Consultation</h3>
                            </div>
                            <form method="POST" action="{{ route('consultations.store') }}">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="patient">Patient</label>
                                        <select class="form-control" name="patient_id" required>
                                            <option value="">-- Sélectionner --</option>
                                            @foreach ($patients as $patient)
                                                <option value="{{ $patient->id }}">{{ $patient->nom }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="medecin">Médecin</label>
                                        <select class="form-control" name="medecin_id" required>
                                            <option value="">-- Sélectionner --</option>
                                            @foreach ($medecins as $medecin)
                                                <option value="{{ $medecin->id }}">{{ $medecin->nom }} ({{ $medecin->specialite }})</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="motif">Motif</label>
                                        <input type="text" class="form-control" name="motif" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="observation">Observation</label>
                                        <textarea class="form-control" name="observation" rows="3"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="tarif">Tarif (en fcfa)</label>
                                        <input type="text" class="form-control" name="tarif" required>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-warning">Enregistrer</button>
                                </div>
                            </form>

                        </div>
                    </div>

                    <!-- Liste des consultations -->
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title"><i class="fas fa-file-medical-alt"></i> Liste des Consultations
                                </h3>
                            </div>
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Patient</th>
                                            <th>Médecin</th>
                                            <th>Date</th>
                                            <th>Motif</th>
                                            <th>Tarif</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($consultations as $consultation)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $consultation->patient->nom }}</td>
                                                <td>{{ $consultation->medecin->nom }}</td>
                                                <td>{{ $consultation->created_at->format('Y-m-d') }}</td>
                                                <td>{{ $consultation->motif }}</td>
                                                <td>{{ $consultation->tarif }} fcfa</td>
                                                <td>
                                                    <a href="{{ route('consultations.edit', $consultation) }}"
                                                        class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                                                    <form action="{{ route('consultations.destroy', $consultation) }}"
                                                        method="POST" style="display:inline-block;">
                                                        @csrf @method('DELETE')
                                                        <button class="btn btn-sm btn-danger"
                                                            onclick="return confirm('Supprimer ?')"><i
                                                                class="fas fa-trash"></i></button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
</x-layout>
