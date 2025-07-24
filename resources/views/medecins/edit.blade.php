@section('titlePage')
    Gestion des médecins
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

                    <!-- Formulaire d'enregistrement -->
                    <div class="col-md-4">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title"><i class="fas fa-user-md"></i> Modifier le Médecin</h3>
                            </div>

                            <form method="POST" action="{{ route('medecins.update', $medecin->id) }}">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="nom">Nom</label>
                                        <input type="text" class="form-control" name="nom"
                                            value="{{ $medecin->nom }}" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="specialite">Spécialité</label>
                                        <select class="form-control" id="specialite" name="specialite"
                                            required>
                                            <option value="">Sélectionner une spécialité</option>
                                            <option value="Cardiologue" {{ $medecin->specialite == 'Cardiologue' ? 'selected' : '' }}>Cardiologue</option>
                                            <option value="Généraliste" {{ $medecin->specialite == 'Généraliste' ? 'selected' : '' }}>Généraliste</option>
                                            <option value="Pédiatre" {{ $medecin->specialite == 'Pédiatre' ? 'selected' : '' }}>Pédiatre</option>
                                            <option value="Dermatologue" {{ $medecin->specialite == 'Dermatologue' ? 'selected' : '' }}>Dermatologue</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="telephone">Téléphone</label>
                                        <input type="text" class="form-control" name="telephone"
                                            value="{{ $medecin->telephone }}" required>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Modifier</button>
                                    <a href="{{ route('medecins.index') }}" class="btn btn-secondary">Ajouter un médecin</a>
                                </div>
                            </form>

                        </div>
                    </div>

                    <!-- Liste des médecins -->
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title"><i class="fas fa-users"></i> Liste des Médecins</h3>
                            </div>
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nom</th>
                                            <th>Spécialité</th>
                                            <th>Téléphone</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($medecins as $medecin)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $medecin->nom }}</td>
                                                <td>{{ $medecin->specialite }}</td>
                                                <td>{{ $medecin->telephone }}</td>
                                                <td>
                                                    <a href="{{ route('medecins.edit', $medecin->id) }}"
                                                        class="btn btn-primary btn-sm">Modifier</a>

                                                    <form action="{{ route('medecins.destroy', $medecin->id) }}"
                                                        method="POST" style="display:inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm"
                                                            onclick="return confirm('Supprimer ce médecin ?')">Supprimer</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                                {{-- Pagination --}}
                                <div class="d-flex justify-content-center mt-3">
                                    {{ $medecins->links('pagination::bootstrap-4') }}
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>


        <!-- /.content -->
    </div>
</x-layout>
