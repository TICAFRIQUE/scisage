@extends('backend.layouts.master-without-nav')
@section('title')
    Connexion
@endsection

@section('content')
    @php
        $cover = $parametre?->getFirstMediaUrl('cover');
        $logo = $parametre?->getFirstMediaUrl('logo_header') ?: asset('images/logo.png');
    @endphp

    <div class="sage-auth">
        <div class="sage-auth__visual" @if ($cover) style="background-image: url('{{ $cover }}')" @endif>
            <p class="text-uppercase fw-semibold mb-2" style="letter-spacing:.16em;color:#E2C46B">Espace d'administration</p>
            <h1>Nous bâtissons <span>votre rêve</span></h1>
            <p class="mb-0" style="max-width:440px">Gérez les chantiers, le catalogue de maisons et les actualités du site SCI SAGES.</p>
        </div>

        <div class="sage-auth__panel">
            <div class="sage-auth__card">
                <img src="{{ $logo }}" alt="SCI SAGES" class="sage-auth__logo">
                <h2>Connexion</h2>
                <p class="text-muted mb-4">Identifiez-vous pour accéder au tableau de bord.</p>

                @include('backend.components.alertMessage')

                <form action="{{ route('admin.login') }}" method="post" class="needs-validation" novalidate>
                    @csrf
                    <div class="mb-3">
                        <label for="username" class="form-label">Adresse email</label>
                        <input type="email" name="email" class="form-control" id="username" value="{{ old('email') }}"
                            placeholder="nom@scisages.ci" autocomplete="username" required autofocus>
                        <div class="invalid-feedback">Saisissez une adresse email valide.</div>
                    </div>

                    <div class="mb-4">
                        <label class="form-label" for="password-input">Mot de passe</label>
                        <div class="position-relative auth-pass-inputgroup">
                            <input type="password" name="password" class="form-control pe-5 password-input"
                                placeholder="Votre mot de passe" id="password-input" autocomplete="current-password" required>
                            <button class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon material-shadow-none"
                                type="button" id="password-addon" aria-label="Afficher le mot de passe">
                                <i class="ri-eye-fill align-middle"></i>
                            </button>
                            <div class="invalid-feedback">Saisissez votre mot de passe.</div>
                        </div>
                    </div>

                    <button class="btn btn-primary w-100" type="submit">
                        <i class="ri-login-box-line me-1"></i> Se connecter
                    </button>
                </form>

                <p class="text-center text-muted small mt-4 mb-0">
                    <a href="{{ route('page.accueil') }}" class="text-muted"><i class="ri-arrow-left-line"></i> Retour au site</a>
                    · &copy; {{ date('Y') }} SCI SAGES
                </p>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ URL::asset('build/js/pages/password-addon.init.js') }}"></script>
@endsection
