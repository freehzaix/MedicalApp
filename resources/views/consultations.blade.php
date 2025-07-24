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
                            <form>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="patient">Patient</label>
                                        <select class="form-control" id="patient">
                                            <option value="">-- Sélectionner --</option>
                                            <option>Traoré Aïcha</option>
                                            <option>Konan Serge</option>
                                            <!-- À remplir dynamiquement côté backend -->
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="medecin">Médecin</label>
                                        <select class="form-control" id="medecin">
                                            <option value="">-- Sélectionner --</option>
                                            <option>Dr. Koffi Yao</option>
                                            <option>Dr. Mariam Koné</option>
                                        </select>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="motif">Motif de la consultation</label>
                                        <input type="text" class="form-control" id="motif" placeholder="Ex: Fièvre, douleurs...">
                                    </div>
                                    <div class="form-group">
                                        <label for="observation">Observation</label>
                                        <textarea class="form-control" id="observation" rows="3" placeholder="Notes du médecin..."></textarea>
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
                                <h3 class="card-title"><i class="fas fa-file-medical-alt"></i> Liste des Consultations</h3>
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
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Exemple statique -->
                                        <tr>
                                            <td>1</td>
                                            <td>Traoré Aïcha</td>
                                            <td>Dr. Koffi Yao</td>
                                            <td>2025-07-17</td>
                                            <td>Fièvre</td>
                                            <td>
                                                <button class="btn btn-sm btn-info"><i class="fas fa-eye"></i></button>
                                                <button class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></button>
                                                <button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                                            </td>
                                        </tr>
                                        <!-- À remplir dynamiquement -->
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
