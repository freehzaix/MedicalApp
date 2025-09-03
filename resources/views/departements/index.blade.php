@section('titlePage')
    Gestion des départements
@endsection

<x-layout>
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <h1 class="m-0">Gestion des Départements</h1>
            </div>
        </div>

        <section class="content">
            <div class="container-fluid">
                <div class="row">

                    <!-- Formulaire -->
                    <div class="col-md-4">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title"><i class="fas fa-building"></i> Ajouter un Département</h3>
                            </div>
                            <form method="POST" action="{{ route('departements.store') }}">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="libelle">Libellé</label>
                                        <input type="text" name="libelle" class="form-control" placeholder="Ex: Radiologie" required>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- Liste -->
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Liste des Départements</h3>
                            </div>
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Libellé</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($departements as $departement)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $departement->libelle }}</td>
                                                <td>
                                                    <a href="{{ route('departements.edit', $departement->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                                                    <form action="{{ route('departements.destroy', $departement->id) }}" method="POST" style="display:inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" onclick="return confirm('Supprimer ce département ?')" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="d-flex justify-content-center mt-3">
                                    {{ $departements->links('pagination::bootstrap-4') }}
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
    </div>
</x-layout>
