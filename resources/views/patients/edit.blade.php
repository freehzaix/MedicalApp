@section('titlePage')
Gestion des patients
@endsection

<x-layout>
    <div class="content-wrapper">
        <div class="content-header">
            <!-- ... comme avant ... -->
        </div>

        <section class="content">
            <div class="container-fluid">
                <div class="row">

                    <!-- Formulaire d'enregistrement du patient -->
                    <div class="col-md-4">
                        <div class="card card-success">
                            <div class="card-header">
                                <h3 class="card-title">
                                    <i class="fas fa-user-plus"></i> Modifier le patient
                                </h3>
                            </div>

                            <form method="POST" action="{{ route('patients.update', $patient->id) }}">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="nom">Nom complet</label>
                                        <input type="text" name="nom" class="form-control" 
                                        value="{{ $patient->nom }}" id="nom" placeholder="Entrer le nom complet" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="date_naissance">Date de naissance</label>
                                        <input type="date" name="date_naissance" class="form-control" id="date_naissance" 
                                        value="{{ \Carbon\Carbon::parse($patient->date_naissance)->format('Y-m-d') }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="genre">Genre</label>
                                        <select name="genre" class="form-control" id="genre" required>
                                            <option value="">-- Sélectionner --</option>
                                            <option value="Homme" {{ $patient->genre == 'Homme' ? 'selected' : '' }}>Homme</option>
                                            <option value="Femme" {{ $patient->genre == 'Femme' ? 'selected' : '' }}>Femme</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="telephone">Téléphone</label>
                                        <input type="text" name="telephone" class="form-control" id="telephone" 
                                        value="{{ $patient->telephone }}" placeholder="07 00 00 00 00" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="adresse">Adresse</label>
                                        <input type="text" name="adresse" class="form-control" id="adresse" 
                                        value="{{ $patient->adresse }}" placeholder="Ex: Cocody, Abidjan" required>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-success">Enregistrer</button>
                                    <a href="{{ route('patients.index') }}" class="btn btn-secondary">Ajouter un patient</a>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- Liste des patients -->
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">
                                    <i class="fas fa-users"></i> Liste des Patients
                                </h3>
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
                                                <td>{{ $patient->id }}</td>
                                                <td>{{ $patient->nom }}</td>
                                                <td>{{ \Carbon\Carbon::parse($patient->date_naissance)->format('d/m/Y') }}
</td>
                                                <td>{{ $patient->genre }}</td>
                                                <td>{{ $patient->telephone }}</td>
                                                <td>
                                                    <a href="{{ route('patients.edit', $patient->id) }}" class="btn btn-sm btn-warning">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <form action="{{ route('patients.destroy', $patient->id) }}" method="POST" style="display:inline-block;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Supprimer ce patient ?')">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach

                                        @if ($patients->isEmpty())
                                            <tr>
                                                <td colspan="6" class="text-center">Aucun patient enregistré.</td>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
                                <div class="m-3">
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
