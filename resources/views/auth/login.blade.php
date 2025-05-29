<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Connexion | {{ config('app.name') }}</title>
    
    @vite(['resources/js/app.js'])
</head>
<body class="hold-transition login-page">
<div class="login-box">
    <!-- /.login-logo -->
    <div class="card card-outline card-primary">
        <div class="card-header text-center">
            <a href="{{ url('/') }}" class="h1">
            <img src="{{ asset('img/logo.jpg') }}" alt="{{ config('app.name') }}" width="250px">
            </a>
        </div>
        <div class="card-body">
            <p class="login-box-msg">Connectez-vous pour commencer votre session</p>

            <form action="{{ route('login') }}" method="post">
                @csrf
                <div class="input-group mb-3">
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" value="{{ old('email') }}">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="input-group mb-3">
                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Mot de passe">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="row">
                    <div class="col-7">
                        <div class="icheck-primary">
                            <input type="checkbox" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label for="remember">
                                Se souvenir de moi
                            </label>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-5">
                        <button type="submit" class="btn btn-primary btn-block">Connexion</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>

            @if (Route::has('password.request'))
                <p class="mt-3 mb-1">
                    <a href="{{ route('password.request') }}">Mot de passe oublié ?</a>
                </p>
            @endif

            <a href="{{ route('register') }}">Pas encore inscrire? Créer un compte.</a>
        </div>
        <!-- /.card-body -->
    </div>
</div>
<!-- /.login-box -->

<!-- Scripts are already included in the head -->
<script src="{{ asset('resources/js/adminlte.js') }}"></script>
</body>
</html>
