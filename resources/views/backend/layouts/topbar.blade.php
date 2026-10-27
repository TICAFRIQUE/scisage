@php
    $topLogo = $parametre?->getFirstMediaUrl('logo_header') ?: asset('images/logo.png');
@endphp
<header id="page-topbar">
    <div class="layout-width">
        <div class="navbar-header">
            <div class="d-flex align-items-center">
                <!-- Logo (affiché en disposition horizontale uniquement) -->
                <div class="navbar-brand-box horizontal-logo">
                    <a href="{{ route('dashboard.index') }}" class="logo logo-dark">
                        <span class="logo-sm"><img src="{{ $topLogo }}" alt="SCI SAGES" height="28"></span>
                        <span class="logo-lg"><img src="{{ $topLogo }}" alt="SCI SAGES" height="40"></span>
                    </a>
                </div>

                <button type="button"
                    class="btn btn-sm px-3 fs-16 header-item vertical-menu-btn topnav-hamburger material-shadow-none"
                    id="topnav-hamburger-icon" aria-label="Afficher / masquer le menu">
                    <span class="hamburger-icon"><span></span><span></span><span></span></span>
                </button>
            </div>

            <div class="d-flex align-items-center gap-1">
                <a href="{{ route('page.accueil') }}" target="_blank" rel="noopener"
                    class="btn btn-soft-primary btn-sm d-none d-md-inline-flex align-items-center gap-1 me-2">
                    <i class="ri-external-link-line"></i> Voir le site
                </a>
                <div class="header-item d-sm-flex">
                    <a href="{{ route('page.accueil') }}" target="_blank" rel="noopener"
                        class="btn btn-icon btn-topbar material-shadow-none btn-ghost-secondary rounded-circle d-md-none"
                        aria-label="Voir le site">
                        <i class="bx bx-globe fs-22"></i>
                    </a>
                    <button type="button"
                        class="btn btn-icon btn-topbar material-shadow-none btn-ghost-secondary rounded-circle light-dark-mode"
                        aria-label="Mode clair / sombre">
                        <i class="bx bx-moon fs-22"></i>
                    </button>
                </div>

                @auth
                    <div class="dropdown ms-sm-2 header-item topbar-user">
                        <button type="button" class="btn material-shadow-none" id="page-header-user-dropdown"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="d-flex align-items-center">
                                <img class="rounded-circle header-profile-user"
                                    src="{{ Auth::user()->avatar ? URL::asset('images/' . Auth::user()->avatar) : URL::asset('images/user-icon.png') }}"
                                    alt="">
                                <span class="text-start ms-xl-2">
                                    <span class="d-none d-xl-inline-block ms-1 fw-semibold user-name-text">{{ Auth::user()->username }}</span>
                                    <span class="d-none d-xl-block ms-1 fs-12 user-name-sub-text text-capitalize">{{ Auth::user()->roles[0]->name ?? '' }}</span>
                                </span>
                            </span>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end">
                            <h6 class="dropdown-header">Bonjour {{ Auth::user()->username }} !</h6>
                            <a class="dropdown-item" href="{{ route('admin-register.profil', Auth::user()->id) }}">
                                <i class="mdi mdi-account-circle text-muted fs-16 align-middle me-1"></i>
                                <span class="align-middle">Mon profil</span>
                            </a>
                            <a class="dropdown-item" href="{{ route('page.accueil') }}" target="_blank" rel="noopener">
                                <i class="mdi mdi-web text-muted fs-16 align-middle me-1"></i>
                                <span class="align-middle">Voir le site</span>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item text-danger" href="#"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="bx bx-power-off fs-16 align-middle me-1"></i>
                                <span class="align-middle">Déconnexion</span>
                            </a>
                            <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </div>
                @endauth
            </div>
        </div>
    </div>
</header>
