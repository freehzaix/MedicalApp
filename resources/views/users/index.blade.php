@section('titlePage')
    Gestion des utilisateurs
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

                    <!-- Formulaire d'ajout -->
                    <div class="col-md-4">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title"><i class="fas fa-user-plus"></i> Ajouter un utilisateur</h3>
                            </div>
                            <form method="POST" action="{{ route('users.store') }}">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="nom">Nom</label>
                                        <input type="text" name="nom" class="form-control"
                                            placeholder="Ex: Dupont" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="prenom">Prénom</label>
                                        <input type="text" name="prenom" class="form-control"
                                            placeholder="Ex: Jean" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" name="email" class="form-control"
                                            placeholder="exemple@mail.com" required>
                                    </div>

                                    <div class="form-group" id="tarif-group">
                                        <label for="tarif">Tarif (FCFA)</label>
                                        <input type="number" step="0.01" name="tarif" class="form-control"
                                            value="{{ old('tarif', 0) }}">
                                    </div>

                                    <script>
                                        // Afficher/cacher le champ tarif en fonction du rôle sélectionné
                                        document.querySelector('select[name="role"]').addEventListener('change', function() {
                                            let tarifGroup = document.getElementById('tarif-group');
                                            if (this.value === 'medecin') {
                                                tarifGroup.style.display = 'block';
                                            } else {
                                                tarifGroup.style.display = 'none';
                                            }
                                        });
                                    </script>


                                    <div class="form-group">
                                        <label for="password">Mot de passe</label>
                                        <input type="password" name="password" class="form-control" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="role">Rôle</label>
                                        <select name="role" class="form-control" required>
                                            <option value="">Sélectionner un rôle</option>
                                            <option value="admin">Admin</option>
                                            <option value="caissier">Caissier</option>
                                            <option value="medecin">Médecin</option>
                                            <option value="comptable">Comptable</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- Liste des utilisateurs -->
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Liste des utilisateurs</h3>
                            </div>
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nom</th>
                                            <th>Email</th>
                                            <th>Rôle(s)</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>
                                                    @foreach ($user->getRoleNames() as $roleName)
                                                        <span class="badge badge-info">{{ ucfirst($roleName) }}</span>
                                                    @endforeach
                                                </td>
                                                <td>
                                                    <a href="{{ route('users.edit', $user->id) }}"
                                                        class="btn btn-warning btn-sm">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <form action="{{ route('users.destroy', $user->id) }}"
                                                        method="POST" style="display:inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            onclick="return confirm('Supprimer cet utilisateur ?')"
                                                            class="btn btn-danger btn-sm">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                                <div class="d-flex justify-content-center mt-3">
                                    {{ $users->links('pagination::bootstrap-4') }}
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
    </div>
</x-layout>
