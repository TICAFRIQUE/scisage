@php
    $adminLogo = $parametre?->getFirstMediaUrl('logo_header') ?: asset('images/logo.png');
    $isAdminUser = Auth::check() && (in_array(Auth::user()->role, ['superadmin', 'developpeur']) || Auth::user()->can('voir-parametre'));
    $menu = [
        'Page d\'accueil' => [
            ['bannieres', 'ri-image-2-line', 'Bannières'],
            ['statistiques', 'ri-bar-chart-box-line', 'Chiffres clés'],
            ['engagements', 'ri-shield-star-line', 'Valeurs & engagements'],
            ['apropos', 'ri-information-line', 'À propos'],
            ['faqs', 'ri-question-answer-line', 'FAQ'],
        ],
        'Offres & chantiers' => [
            ['activites', 'ri-hammer-line', 'Activités'],
            ['projets', 'ri-list-ordered', 'Étapes des activités'],
            ['portfolios', 'ri-building-2-line', 'Portfolio & catalogue'],
        ],
        'Communication' => [
            ['actualites', 'ri-newspaper-line', 'Actualités'],
            ['equipes', 'ri-team-line', 'Équipe'],
        ],
    ];
@endphp

<!-- ========== Menu latéral ========== -->
<div class="app-menu navbar-menu">
    <div class="navbar-brand-box">
        <a href="{{ route('dashboard.index') }}" class="sage-brand">
            <span class="sage-brand__logo"><img src="{{ $adminLogo }}" alt="SCI SAGES"></span>
            <span class="sage-brand__text">
                <strong>SCI SAGES</strong>
                <small>Administration</small>
            </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover ms-auto"
            id="vertical-hover" aria-label="Épingler le menu">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>

    <div id="scrollbar">
        <div class="container-fluid">
            <div id="two-column-menu"></div>
            <ul class="navbar-nav" id="navbar-nav">

                @can('voir-tableau de bord')
                    <li class="nav-item">
                        <a class="nav-link menu-link {{ Route::is('dashboard.*') ? 'active' : '' }}"
                            href="{{ route('dashboard.index') }}">
                            <i class="ri-dashboard-2-line"></i> <span>Tableau de bord</span>
                        </a>
                    </li>
                @endcan

                @foreach ($menu as $section => $items)
                    <li class="menu-title"><span>{{ $section }}</span></li>
                    @foreach ($items as [$route, $icon, $label])
                        <li class="nav-item">
                            <a class="nav-link menu-link {{ Route::is($route . '.*') ? 'active' : '' }}"
                                href="{{ route($route . '.index') }}">
                                <i class="{{ $icon }}"></i> <span>{{ $label }}</span>
                            </a>
                        </li>
                    @endforeach
                @endforeach

                @if ($isAdminUser)
                    @php
                        $settingsOpen = Route::is('parametre.*', 'module.*', 'role.*', 'permission.*', 'admin-register.*');
                    @endphp
                    <li class="menu-title"><span>Administration</span></li>
                    <li class="nav-item">
                        <a class="nav-link menu-link {{ $settingsOpen ? 'active' : 'collapsed' }}" href="#sidebarAuth"
                            data-bs-toggle="collapse" role="button" aria-expanded="{{ $settingsOpen ? 'true' : 'false' }}"
                            aria-controls="sidebarAuth">
                            <i class="ri-settings-3-line"></i> <span>Paramètres</span>
                        </a>
                        <div class="collapse menu-dropdown {{ $settingsOpen ? 'show' : '' }}" id="sidebarAuth">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="{{ route('parametre.index') }}"
                                        class="nav-link {{ Route::is('parametre.*') ? 'active' : '' }}">Informations du site</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('admin-register.index') }}"
                                        class="nav-link {{ Route::is('admin-register.*') ? 'active' : '' }}">Utilisateurs</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('module.index') }}"
                                        class="nav-link {{ Route::is('module.*') ? 'active' : '' }}">Modules</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('role.index') }}"
                                        class="nav-link {{ Route::is('role.*') ? 'active' : '' }}">Rôles</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('permission.index') }}"
                                        class="nav-link {{ Route::is('permission.*') ? 'active' : '' }}">Permissions</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                @endif
            </ul>

            <div class="sage-sidebar-site">
                Vos modifications sont visibles immédiatement sur le site.
                <a href="{{ route('page.accueil') }}" target="_blank" rel="noopener">
                    <i class="ri-external-link-line"></i> Voir le site
                </a>
            </div>
        </div>
    </div>
    <div class="sidebar-background"></div>
</div>
<!-- Overlay mobile -->
<div class="vertical-overlay"></div>
