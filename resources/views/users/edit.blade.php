@section('titlePage')
    Éditer un utilisateur
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
                <div class="row justify-content-center">

                    <div class="col-md-6">
                        <div class="card card-warning">
                            <div class="card-header">
                                <h3 class="card-title"><i class="fas fa-user-edit"></i> Modifier l'utilisateur</h3>
                            </div>
                            <form method="POST" action="{{ route('users.update', $user->id) }}">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="nom">Nom</label>
                                        <input type="text" name="nom" class="form-control"
                                            value="{{ old('nom', $user->nom) }}" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="prenom">Prénom</label>
                                        <input type="text" name="prenom" class="form-control"
                                            value="{{ old('prenom', $user->prenom) }}" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" name="email" class="form-control"
                                            value="{{ old('email', $user->email) }}" required>
                                    </div>

                                    <div class="form-group" id="tarif-group"
                                        style="{{ $user->hasRole('medecin') ? '' : 'display:none;' }}">
                                        <label for="tarif">Tarif (FCFA)</label>
                                        <input type="number" step="0.01" name="tarif" class="form-control"
                                            value="{{ old('tarif', $user->tarif) }}">
                                    </div>


                                    <div class="form-group">
                                        <label for="password">Mot de passe <small>(laisser vide pour ne pas
                                                modifier)</small></label>
                                        <input type="password" name="password" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label for="role">Rôle</label>
                                        <select name="role" class="form-control" required>
                                            <option value="">Sélectionner un rôle</option>
                                            <option value="admin" {{ $user->hasRole('admin') ? 'selected' : '' }}>Admin
                                            </option>
                                            <option value="caissier" {{ $user->hasRole('caissier') ? 'selected' : '' }}>
                                                Caissier</option>
                                            <option value="medecin" {{ $user->hasRole('medecin') ? 'selected' : '' }}>
                                                Médecin</option>
                                            <option value="comptable"
                                                {{ $user->hasRole('comptable') ? 'selected' : '' }}>Comptable</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-warning">Mettre à jour</button>
                                    <a href="{{ route('users.index') }}" class="btn btn-secondary">Annuler</a>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </section>
    </div>
</x-layout>
