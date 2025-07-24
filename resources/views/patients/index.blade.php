@section('titlePage')
    Gestion des patients
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

                    <!-- Formulaire d'enregistrement -->
                    <div class="col-md-4">
                        <div class="card card-success">
                            <div class="card-header">
                                <h3 class="card-title"><i class="fas fa-user-plus"></i> Ajouter un Patient</h3>
                            </div>

                            <form action="{{ route('patients.store') }}" method="POST">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="nom">Nom complet</label>
                                        <input type="text" name="nom" class="form-control"
                                            placeholder="Entrer le nom complet" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="date_naissance">Date de naissance</label>
                                        <input type="date" name="date_naissance" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="genre">Genre</label>
                                        <select name="genre" class="form-control" required>
                                            <option value="">-- Sélectionner --</option>
                                            <option value="Homme">Homme</option>
                                            <option value="Femme">Femme</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="telephone_patient">Téléphone</label>
                                        <input type="text" name="telephone" class="form-control"
                                            placeholder="07 00 00 00 00" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="adresse">Adresse</label>
                                        <input type="text" name="adresse" class="form-control"
                                            placeholder="Ex: Cocody, Abidjan">
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-success">Enregistrer</button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- Liste des patients -->
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title"><i class="fas fa-users"></i> Liste des Patients</h3>
                            </div>
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nom</th>
                                            <th>Date naissance</th>
                                            <th>Genre</th>
                                            <th>Téléphone</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($patients as $patient)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $patient->nom }}</td>
                                                <td>{{ \Carbon\Carbon::parse($patient->date_naissance)->format('d/m/Y') }}
</td>
                                                <td>{{ $patient->genre }}</td>
                                                <td>{{ $patient->telephone }}</td>
                                                <td>
                                                    <a href="{{ route('patients.edit', $patient->id) }}"
                                                        class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                                                    <form action="{{ route('patients.destroy', $patient->id) }}"
                                                        method="POST" style="display:inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            onclick="return confirm('Supprimer ce patient ?')"
                                                            class="btn btn-sm btn-danger">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                                <!-- Pagination -->
                                <div class="mt-3 px-3">
                                    {{ $patients->links() }}
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>

    </div>
</x-layout>
