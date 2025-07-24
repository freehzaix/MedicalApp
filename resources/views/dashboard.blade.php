@section('titlePage')
  Tableau de bord
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

                    <!-- Box: Consultations du jour -->
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>25</h3>
                                <p>Consultations du jour</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-user-md"></i>
                            </div>
                            <a href="#" class="small-box-footer">Plus d'infos <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                    <!-- Box: Patients enregistrés -->
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3>320</h3>
                                <p>Patients enregistrés</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-users"></i>
                            </div>
                            <a href="#" class="small-box-footer">Voir la liste <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                    <!-- Box: Rendez-vous à venir -->
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3>12</h3>
                                <p>Rendez-vous à venir</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-calendar-check"></i>
                            </div>
                            <a href="#" class="small-box-footer">Gérer les RDV <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                    <!-- Box: Revenus du mois -->
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h3>850.000 FCFA</h3>
                                <p>Revenus ce mois</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-wallet"></i>
                            </div>
                            <a href="#" class="small-box-footer">Voir le rapport <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                </div>

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Calendrier des RDV</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Patient</th>
                                    <th>Médecin</th>
                                    <th>Date</th>
                                    <th>Statut</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Jean Koffi</td>
                                    <td>Dr. Kouamé</td>
                                    <td>17/07/2025</td>
                                    <td><span class="badge bg-success">Terminée</span></td>
                                </tr>
                                <!-- Autres lignes -->
                            </tbody>
                        </table>
                    </div>
                </div>





            </div>
        </section>
        <!-- /.content -->
    </div>
</x-layout>
