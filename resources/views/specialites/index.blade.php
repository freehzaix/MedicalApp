@section('titlePage')
    Gestion des spécialités
@endsection
<x-layout>
    <div class="content-wrapper">
        <!-- En-tête -->
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

        <!-- Contenu principal -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">

                    <!-- Formulaire d'ajout -->
                    <div class="col-md-4">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title"><i class="fas fa-folder-plus"></i> Ajouter une spécialité</h3>
                            </div>

                            <form method="POST" action="{{ route('specialites.store') }}">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="nom">Nom de la spécialité</label>
                                        <input type="text" class="form-control" id="nom" name="name"
                                            placeholder="Entrer le nom de la spécialité" required>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- Liste des spécialités -->
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title"><i class="fas fa-list"></i> Liste des spécialités</h3>
                            </div>
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nom</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($specialites as $specialite)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $specialite->name }}</td>
                                                <td>
                                                    <a href="{{ route('specialites.edit', $specialite->id) }}"
                                                        class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>

                                                    <form action="{{ route('specialites.destroy', $specialite->id) }}"
                                                        method="POST" style="display:inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm"
                                                            onclick="return confirm('Supprimer cette spécialité ?')"><i class="fas fa-trash"></i></button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="3" class="text-center">Aucune spécialité enregistrée</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>

                                <!-- Pagination -->
                                <div class="d-flex justify-content-center mt-3">
                                    {{ $specialites->links('pagination::bootstrap-4') }}
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
    </div>
</x-layout>
