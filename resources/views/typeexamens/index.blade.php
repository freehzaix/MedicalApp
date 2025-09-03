@section('titlePage')
    Gestion des types d'examens
@endsection

<x-layout>
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <h1 class="m-0">@yield('titlePage')</h1>
            </div>
        </div>

        <section class="content">
            <div class="container-fluid">
                <div class="row">

                    <!-- Formulaire -->
                    <div class="col-md-4">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title"><i class="fas fa-folder"></i> Ajouter un type d'examen</h3>
                            </div>
                            <form method="POST" action="{{ route('typeexamens.store') }}">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="libelle">Libellé</label>
                                        <input type="text" name="libelle" class="form-control" placeholder="Ex: Radiologie" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="medecin_id">Département</label>
                                        <select class="form-control" id="departement_id" name="departement_id" required>
                                            <option value="">Sélectionner un département</option>
                                            @foreach ($departements as $departement)
                                                <option value="{{ $departement->id }}">{{ $departement->libelle }}</option>
                                            @endforeach
                                        </select>
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
                                <h3 class="card-title">Liste des types d'examens</h3>
                            </div>
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Libellé</th>
                                            <th>Département</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($typeexamens as $typeexamen)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $typeexamen->libelle }}</td>
                                                <td>{{ $typeexamen->departement->libelle }}</td>
                                                <td>
                                                    <a href="{{ route('typeexamens.edit', $typeexamen->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                                                    <form action="{{ route('typeexamens.destroy', $typeexamen->id) }}" method="POST" style="display:inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" onclick="return confirm('Supprimer ce type d\'examen ?')" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="d-flex justify-content-center mt-3">
                                    {{ $typeexamens->links('pagination::bootstrap-4') }}
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
    </div>
</x-layout>
