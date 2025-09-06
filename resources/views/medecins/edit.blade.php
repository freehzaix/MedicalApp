@extends('layouts.app')

@section('titlePage')
    Modifier le Médecin
@endsection

<x-layout>
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-md-8 offset-md-2">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title"><i class="fas fa-user-md"></i> Modifier un Médecin</h3>
                            </div>

                            <form method="POST" action="{{ route('medecins.update', $medecin->id) }}">
                                @csrf
                                @method('PUT')

                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="nom">Nom</label>
                                        <input type="text" class="form-control" id="nom" name="nom"
                                            value="{{ old('nom', $medecin->nom) }}" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="prenom">Prénom</label>
                                        <input type="text" class="form-control" id="prenom" name="prenom"
                                            value="{{ old('prenom', $medecin->prenom) }}" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control" id="email" name="email"
                                            value="{{ old('email', $medecin->email) }}" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="specialite">Spécialité</label>
                                        <select class="form-control" id="specialite" name="specialite_id" required>
                                            @foreach ($specialites as $specialite)
                                                <option value="{{ $specialite->id }}"
                                                    {{ $medecin->specialite_id == $specialite->id ? 'selected' : '' }}>
                                                    {{ $specialite->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="telephone">Téléphone</label>
                                        <input type="text" class="form-control" id="telephone" name="telephone"
                                            value="{{ old('telephone', $medecin->telephone) }}" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="tarif">Tarif</label>
                                        <input type="number" class="form-control" id="tarif" name="tarif"
                                            value="{{ old('tarif', $medecin->tarif) }}" required>
                                    </div>
                                </div>

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Mettre à jour</button>
                                    <a href="{{ route('medecins.index') }}" class="btn btn-secondary">Annuler</a>
                                </div>
                            </form>

                        </div>
                    </div>

                </div>
            </div>
        </section>
    </div>
</x-layout>
