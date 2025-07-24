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
                                <h3 class="card-title"><i class="fas fa-user-md"></i> Ajouter un Médecin</h3>
                            </div>

                            <form method="POST" action="{{ route('medecins.store') }}">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="nom">Nom du médecin</label>
                                        <input type="text" class="form-control" id="nom" name="nom"
                                            placeholder="Entrer le nom" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="specialite">Spécialité</label>
                                        <select class="form-control" id="specialite" name="specialite" required>
                                            <option value="">Sélectionner une spécialité</option>
                                            <option value="Cardiologue">Cardiologue</option>
                                            <option value="Généraliste">Généraliste</option>
                                            <option value="Pédiatre">Pédiatre</option>
                                            <option value="Dermatologue">Dermatologue</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="telephone">Téléphone</label>
                                        <input type="text" class="form-control" id="telephone" name="telephone"
                                            placeholder="07 00 00 00 00" required>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Enregistrer</button>
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
