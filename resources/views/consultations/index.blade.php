@section('titlePage')
    Gestion des consultations
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
                    <div class="col-12">

                        <!-- Card -->
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title"><i class="fas fa-stethoscope"></i> Liste des consultations</h3>
                                <div class="card-tools">
                                    <a href="{{ route('consultations.create') }}" class="btn btn-success btn-sm">
                                        <i class="fas fa-plus"></i> Nouvelle consultation
                                    </a>
                                </div>
                            </div>

                            <!-- Table -->
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Médecin</th>
                                            <th>Patient</th>
                                            <th>Service</th>
                                            <th>Prix</th>
                                            <th>Date et heure</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($consultations as $consultation)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $consultation->medecin->nom }}</td>
                                                <td>{{ $consultation->patient->nom }}</td>
                                                <td>{{ $consultation->service->nom }}</td>
                                                <td>{{ number_format($consultation->prix, 0, ',', ' ') }} FCFA</td>
                                                <td>{{ $consultation->date_consultation->format('d/m/Y H:i') }}</td>
                                                <td>
                                                    <a href="{{ route('consultations.edit', $consultation->id) }}"
                                                        class="btn btn-warning btn-sm">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <form
                                                        action="{{ route('consultations.destroy', $consultation->id) }}"
                                                        method="POST" style="display:inline-block"
                                                        onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette consultation ?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="7" class="text-center text-muted">
                                                    Aucune consultation enregistrée.
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>

                            <!-- Pagination -->
                            <div class="card-footer clearfix">
                                {{ $consultations->links() }}
                            </div>
                        </div>
                        <!-- /.card -->

                    </div>
                </div>
            </div>
        </section>
    </div>
</x-layout>
