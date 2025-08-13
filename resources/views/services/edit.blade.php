@section('titlePage')
    Modifier un service
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
                            <li class="breadcrumb-item"><a href="{{ route('services.index') }}">Gestion des services</a>
                            </li>
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

                    <!-- Formulaire de modification -->
                    <div class="col-md-6">
                        <div class="card card-warning">
                            <div class="card-header">
                                <h3 class="card-title"><i class="fas fa-edit"></i> Modifier le service</h3>
                            </div>

                            <form method="POST" action="{{ route('services.update', $service->id) }}">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="nom">Nom du service</label>
                                        <input type="text" class="form-control" id="nom" name="nom"
                                            value="{{ old('nom', $service->nom) }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="description">Description</label>
                                        <textarea class="form-control" id="description" name="description">{{ old('description', $service->description) }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="prix">Prix (FCFA)</label>
                                        <input type="number" step="0.01" class="form-control" id="prix"
                                            name="prix" value="{{ old('prix', $service->prix) }}" required>
                                    </div>
                                </div>

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Mettre à
                                        jour</button>
                                    <a href="{{ route('services.index') }}" class="btn btn-secondary"><i
                                            class="fas fa-arrow-left"></i> Retour</a>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </section>
    </div>
</x-layout>
