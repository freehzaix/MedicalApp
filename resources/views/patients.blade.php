@section('titlePage')
Gestion des patients
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

                    <!-- Formulaire d'enregistrement du patient -->
                    <div class="col-md-4">
                        <div class="card card-success">
                            <div class="card-header">
                                <h3 class="card-title"><i class="fas fa-user-plus"></i> Ajouter un Patient</h3>
                            </div>
                            <form>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="nom_patient">Nom complet</label>
                                        <input type="text" class="form-control" id="nom_patient" placeholder="Entrer le nom complet">
                                    </div>
                                    <div class="form-group">
                                        <label for="date_naissance">Date de naissance</label>
                                        <input type="date" class="form-control" id="date_naissance">
                                    </div>
                                    <div class="form-group">
                                        <label for="genre">Genre</label>
                                        <select class="form-control" id="genre">
                                            <option value="">-- Sélectionner --</option>
                                            <option value="Homme">Homme</option>
                                            <option value="Femme">Femme</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="telephone_patient">Téléphone</label>
                                        <input type="text" class="form-control" id="telephone_patient" placeholder="07 00 00 00 00">
                                    </div>
                                    <div class="form-group">
                                        <label for="adresse">Adresse</label>
                                        <input type="text" class="form-control" id="adresse" placeholder="Ex: Cocody, Abidjan">
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
                                        <!-- Exemple statique -->
                                        <tr>
                                            <td>1</td>
                                            <td>Traoré Aïcha</td>
                                            <td>1992-04-15</td>
                                            <td>Femme</td>
                                            <td>07 55 88 66 44</td>
                                            <td>
                                                <button class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></button>
                                                <button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>Konan Serge</td>
                                            <td>1986-09-20</td>
                                            <td>Homme</td>
                                            <td>07 44 22 11 00</td>
                                            <td>
                                                <button class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></button>
                                                <button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                                            </td>
                                        </tr>
                                        <!-- À remplacer dynamiquement -->
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
