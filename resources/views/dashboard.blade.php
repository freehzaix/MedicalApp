@section('titlePage')
    Tableau de bord
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
                            <li class="breadcrumb-item active">@yield('titlePage')</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">

                    <!-- Total Patients -->
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3>{{ App\Models\Patient::count() }}</h3>
                                <p>Patients enregistrés</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-users"></i>
                            </div>
                            <a href="{{ route('patients.index') }}" class="small-box-footer">
                                Voir la liste <i class="fas fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div>

                    <!-- Total Rendez-vous -->
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3>{{ App\Models\RendezVous::count() }}</h3>
                                <p>Rendez-vous</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-calendar-check"></i>
                            </div>
                            <a href="{{ route('rendezvous.index') }}" class="small-box-footer">
                                Gérer les RDV <i class="fas fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div>

                    <!-- Total Médecins -->
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h3>{{ App\Models\User::role('medecin')->count() }}</h3>
                                <p>Médecins</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-user-md"></i>
                            </div>
                            <a href="{{ route('medecins.index') }}" class="small-box-footer">
                                Voir la liste <i class="fas fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div>

                    <!-- Total Médecins -->
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-primary">
                            <div class="inner">
                                <h3>{{ App\Models\Specialite::count() }}</h3>
                                <p>Spécialités</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-user-md"></i>
                            </div>
                            <a href="{{ route('specialites.index') }}" class="small-box-footer">
                                Voir la liste <i class="fas fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div>

                </div>

                <!-- Tableau calendrier RDV -->
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
                                    <th>Motif</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach (App\Models\RendezVous::latest()->take(5)->get() as $rdv)
                                    <tr>
                                        <td>{{ $rdv->patient->nom ?? 'Inconnu' }}</td>
                                        <td>{{ $rdv->medecin->nom ?? 'Inconnu' }}</td>
                                        <td>{{ \Carbon\Carbon::parse($rdv->date)->format('d/m/Y à H:i') }}</td>
                                        <td>
                                            <span
                                                class="badge 
                                                {{ $rdv->motif == 'terminé' ? 'btn btn-success' : ($rdv->motif == 'annulé' ? 'btn btn-danger' : 'btn btn-primary') }}">
                                                {{ ucfirst($rdv->motif) }}
                                            </span>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </section>
    </div>
</x-layout>
