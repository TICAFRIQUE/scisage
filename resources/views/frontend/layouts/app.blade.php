@php
    $logoUrl = $parametre?->getFirstMediaUrl('logo_header') ?: asset('images/logo.png');
    $siteName = 'SCI SAGES';
    $phones = collect([$parametre?->contact1, $parametre?->contact2, $parametre?->contact3])->filter()->values();
    $emails = collect([$parametre?->email1, $parametre?->email2])->filter()->values();
    $telHref = fn($n) => 'tel:' . preg_replace('/[^0-9+]/', '', $n);
    $whatsappNumber = preg_replace('/[^0-9]/', '', $parametre?->contact3 ?: $parametre?->contact1 ?: '');
    $socials = collect([
        'facebook-f' => $parametre?->lien_facebook,
        'instagram' => $parametre?->lien_instagram,
        'linkedin-in' => $parametre?->lien_linkedin,
        'tiktok' => $parametre?->lien_tiktok,
        'x-twitter' => $parametre?->lien_twitter,
    ])->filter();
    $isHome = request()->routeIs('page.accueil');

    // URL canonique : on garde seulement les paramètres qui changent vraiment le contenu
    // (catégorie du portfolio, numéro de page), pour éviter les doublons dans Google.
    $canonicalQuery = collect(request()->only(['categorie', 'page']))
        ->reject(fn($v, $k) => ($k === 'categorie' && $v === 'tous') || ($k === 'page' && (int) $v <= 1) || $v === null || $v === '')
        ->all();
    $canonicalUrl = url()->current() . ($canonicalQuery ? '?' . http_build_query($canonicalQuery) : '');
@endphp
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="theme-color" content="#2A1A0B">

    <!-- SEO -->
    <title>@yield('title', 'SCI SAGES - Promoteur immobilier & construction en Côte d\'Ivoire')</title>
    <meta name="description" content="@yield('description', 'SCI SAGES, promoteur immobilier et constructeur en Côte d\'Ivoire. Maisons clé en main, construction sur mesure et suivi de chantier à Abidjan.')">
    <meta name="keywords" content="@yield('keywords', 'promoteur immobilier, construction maison, BTP Côte d\'Ivoire, villa moderne, construction sur mesure, SCI SAGES, immobilier Abidjan')">
    <meta name="author" content="SCI SAGES">
    <meta name="robots" content="@yield('robots', 'index, follow, max-image-preview:large')">
    <link rel="canonical" href="@yield('canonical', $canonicalUrl)">
    <link rel="sitemap" type="application/xml" href="{{ route('seo.sitemap') }}">

    <!-- Open Graph -->
    <meta property="og:type" content="@yield('og_type', 'website')">
    <meta property="og:url" content="@yield('canonical', $canonicalUrl)">
    <meta property="og:title" content="@yield('og_title', 'SCI SAGES - Promoteur immobilier & construction')">
    <meta property="og:description" content="@yield('og_description', 'Construction et vente de maisons modernes en Côte d\'Ivoire.')">
    <meta property="og:image" content="@yield('og_image', asset('images/logo.png'))">
    <meta property="og:locale" content="fr_FR">
    <meta property="og:site_name" content="SCI SAGES">

    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="@yield('twitter_title', 'SCI SAGES - Promoteur immobilier')">
    <meta name="twitter:description" content="@yield('twitter_description', 'Construction et vente de maisons modernes en Côte d\'Ivoire')">
    <meta name="twitter:image" content="@yield('twitter_image', asset('images/logo.png'))">

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favicon/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('favicon/site.webmanifest') }}">

    <!-- Données structurées (Schema.org) : fiche entreprise -->
    <script type="application/ld+json">
    {!! json_encode(array_filter([
        '@context' => 'https://schema.org',
        '@type' => 'HomeAndConstructionBusiness',
        '@id' => url('/') . '#entreprise',
        'name' => 'SCI SAGES',
        'alternateName' => 'Société Civile Immobilière SAGES',
        'slogan' => 'Nous bâtissons votre rêve',
        'description' => 'Promoteur immobilier et constructeur de maisons modernes en Côte d\'Ivoire : maisons clé en main, construction sur mesure et suivi de chantier.',
        'url' => url('/'),
        'logo' => asset('images/logo.png'),
        'image' => $logoUrl,
        'telephone' => $phones->first(),
        'email' => $emails->first(),
        'address' => array_filter(['@type' => 'PostalAddress', 'addressCountry' => 'CI', 'addressLocality' => 'Abidjan', 'streetAddress' => $parametre?->localisation]),
        'areaServed' => ['@type' => 'Country', 'name' => 'Côte d\'Ivoire'],
        'foundingDate' => '2014',
        'openingHoursSpecification' => [
            ['@type' => 'OpeningHoursSpecification', 'dayOfWeek' => ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'], 'opens' => '08:00', 'closes' => '18:00'],
            ['@type' => 'OpeningHoursSpecification', 'dayOfWeek' => 'Saturday', 'opens' => '09:00', 'closes' => '16:00'],
        ],
        'sameAs' => $socials->values()->all() ?: null,
    ]), JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_HEX_TAG) !!}
    </script>
    @if ($isHome)
        <script type="application/ld+json">
        {!! json_encode([
            '@context' => 'https://schema.org',
            '@type' => 'WebSite',
            'name' => 'SCI SAGES',
            'url' => url('/'),
            'inLanguage' => 'fr-CI',
            'publisher' => ['@id' => url('/') . '#entreprise'],
        ], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_HEX_TAG) !!}
        </script>
    @endif
    @stack('schema')

    <!-- Connexions anticipées (réduit la latence des ressources externes) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://cdn.jsdelivr.net" crossorigin>
    <link rel="preconnect" href="https://cdnjs.cloudflare.com" crossorigin>
    <link rel="preload" as="image" href="{{ $logoUrl }}">

    <!-- Polices : Barlow (corps) + Barlow Condensed (titres, style chantier) -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Barlow+Condensed:wght@500;600;700;800&family=Barlow:wght@400;500;600;700&display=swap">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css">

    @stack('styles')

    <!-- Charte SCI SAGES (chargée en dernier pour harmoniser toutes les pages) -->
    <link rel="stylesheet" href="{{ asset('front/css/sage-btp.css') }}?v={{ @filemtime(public_path('front/css/sage-btp.css')) }}">
    <link rel="stylesheet" href="{{ asset('front/css/sage-sections.css') }}?v={{ @filemtime(public_path('front/css/sage-sections.css')) }}">
</head>

<body class="{{ $isHome ? 'is-home' : 'is-inner' }}">
    <a href="#main" class="skip-link">Aller au contenu</a>
    <div class="page-progress is-loading" id="pageProgress" aria-hidden="true"></div>

    <!-- Barre d'informations -->
    <div class="topbar d-none d-lg-flex">
        <div class="container">
            <ul class="topbar-info">
                @if ($parametre?->localisation)
                    <li><i class="fas fa-location-dot"></i> {{ Str::limit($parametre->localisation, 48) }}</li>
                @endif
                @if ($phones->isNotEmpty())
                    <li><i class="fas fa-phone"></i> <a href="{{ $telHref($phones->first()) }}">{{ $phones->first() }}</a></li>
                @endif
                @if ($emails->isNotEmpty())
                    <li><i class="fas fa-envelope"></i> <a href="mailto:{{ $emails->first() }}">{{ $emails->first() }}</a></li>
                @endif
                <li><i class="fas fa-clock"></i> Lun - Ven : 8h - 18h · Sam : 9h - 16h</li>
            </ul>
            @if ($socials->isNotEmpty())
                <div class="topbar-social">
                    @foreach ($socials as $icon => $link)
                        <a href="{{ $link }}" target="_blank" rel="noopener" aria-label="{{ ucfirst(explode('-', $icon)[0]) }}"><i class="fab fa-{{ $icon }}"></i></a>
                    @endforeach
                </div>
            @endif
        </div>
    </div>

    <!-- En-tête -->
    <header class="site-header" id="siteHeader">
        <nav class="navbar navbar-expand-lg" aria-label="Navigation principale">
            <div class="container">
                <a class="navbar-brand" href="{{ route('page.accueil') }}" aria-label="{{ $siteName }} - Accueil">
                    <img src="{{ $logoUrl }}" alt="{{ $siteName }}" width="78" height="62" fetchpriority="high">
                </a>

                <button class="nav-burger d-lg-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#mainNav"
                    aria-controls="mainNav" aria-expanded="false" aria-label="Ouvrir le menu">
                    <span></span><span></span><span></span>
                </button>

                <div class="offcanvas offcanvas-end" tabindex="-1" id="mainNav" aria-labelledby="mainNavLabel">
                    <div class="offcanvas-header">
                        <img src="{{ $logoUrl }}" alt="{{ $siteName }}" class="offcanvas-logo" id="mainNavLabel">
                        <button type="button" class="offcanvas-close" data-bs-dismiss="offcanvas" aria-label="Fermer le menu">
                            <i class="fas fa-xmark"></i>
                        </button>
                    </div>

                    <div class="offcanvas-body">
                        <ul class="navbar-nav ms-lg-auto align-items-lg-center">
                            <li class="nav-item">
                                <a class="nav-link {{ $isHome ? 'active' : '' }}" href="{{ route('page.accueil') }}"
                                    data-section="accueil">Accueil</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('page.apropos') ? 'active' : '' }}"
                                    href="{{ route('page.apropos') }}">Présentation</a>
                            </li>

                            @if ($activites && $activites->count())
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle {{ request()->routeIs('page.activites', 'page.souscrire.catalogue', 'page.construction.personnalisee') ? 'active' : '' }}"
                                        href="#" id="activitesDropdown" role="button" data-bs-toggle="dropdown"
                                        aria-expanded="false">
                                        Activités <i class="fas fa-chevron-down nav-caret"></i>
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="activitesDropdown">
                                        @foreach ($activites as $activite)
                                            <li>
                                                <a class="dropdown-item {{ request()->routeIs('page.activites') && request()->route('slug') == $activite->slug ? 'active' : '' }}"
                                                    href="{{ route('page.activites', $activite->slug) }}">
                                                    <i class="{{ $activite->icone ?: 'fas fa-hard-hat' }}"></i>
                                                    <span>{{ $activite->libelle }}</span>
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </li>
                            @endif

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle {{ request()->routeIs('page.portfolios*') ? 'active' : '' }}"
                                    href="#" id="portfolioDropdown" role="button" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    Portfolio <i class="fas fa-chevron-down nav-caret"></i>
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="portfolioDropdown">
                                    @foreach ([
                                        'realisations' => ['fas fa-house-circle-check', 'Réalisations'],
                                        'conceptions' => ['fas fa-compass-drafting', 'Conceptions'],
                                        'projets' => ['fas fa-building', 'Projets en cours'],
                                    ] as $key => [$icon, $label])
                                        <li>
                                            <a class="dropdown-item {{ request()->get('categorie') == $key ? 'active' : '' }}"
                                                href="{{ route('page.portfolios', ['categorie' => $key]) }}">
                                                <i class="{{ $icon }}"></i><span>{{ $label }}</span>
                                            </a>
                                        </li>
                                    @endforeach
                                    <li><hr class="dropdown-divider"></li>
                                    <li>
                                        <a class="dropdown-item {{ request()->routeIs('page.portfolios') && in_array(request()->get('categorie', 'tous'), ['tous']) ? 'active' : '' }}"
                                            href="{{ route('page.portfolios', ['categorie' => 'tous']) }}">
                                            <i class="fas fa-table-cells-large"></i><span>Tout voir</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('page.actualites*') ? 'active' : '' }}"
                                    href="{{ route('page.actualites') }}">Actualités</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('page.accueil') }}#contact" data-section="contact">Contact</a>
                            </li>
                        </ul>

                        <a href="{{ route('page.accueil') }}#form-projet" class="btn-sage btn-sage--sm header-cta">
                            <i class="fas fa-helmet-safety"></i> Démarrer mon projet
                        </a>

                        <div class="offcanvas-contact d-lg-none">
                            @foreach ($phones->take(2) as $phone)
                                <a href="{{ $telHref($phone) }}"><i class="fas fa-phone"></i> {{ $phone }}</a>
                            @endforeach
                            @if ($emails->isNotEmpty())
                                <a href="mailto:{{ $emails->first() }}"><i class="fas fa-envelope"></i> {{ $emails->first() }}</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <main id="main">
        @yield('content')
    </main>

    @include('frontend.components.boutton_flottant', ['whatsappNumber' => $whatsappNumber])

    <!-- Pied de page -->
    <footer class="site-footer">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-4 col-md-6">
                    <a href="{{ route('page.accueil') }}" class="footer-brand d-inline-block">
                        <img src="{{ $logoUrl }}" alt="{{ $siteName }}" width="90" height="72" loading="lazy">
                    </a>
                    <p class="footer-about">
                        {{ $parametre?->description_projet ? Str::limit(strip_tags($parametre->description_projet), 180) : 'Promoteur immobilier et constructeur en Côte d\'Ivoire. De la conception à la remise des clés, nous bâtissons des maisons solides, modernes et durables.' }}
                    </p>
                    @if ($socials->isNotEmpty())
                        <div class="social-icons">
                            @foreach ($socials as $icon => $link)
                                <a href="{{ $link }}" class="social-icon" target="_blank" rel="noopener"
                                    aria-label="{{ ucfirst(explode('-', $icon)[0]) }}"><i class="fab fa-{{ $icon }}"></i></a>
                            @endforeach
                        </div>
                    @endif
                </div>

                <div class="col-lg-2 col-md-6 col-6">
                    <h2 class="footer-title">Navigation</h2>
                    <ul class="footer-links">
                        <li><a href="{{ route('page.accueil') }}">Accueil</a></li>
                        <li><a href="{{ route('page.apropos') }}">Présentation</a></li>
                        <li><a href="{{ route('page.portfolios') }}">Portfolio</a></li>
                        <li><a href="{{ route('page.actualites') }}">Actualités</a></li>
                        <li><a href="{{ route('page.accueil') }}#faq">FAQ</a></li>
                        <li><a href="{{ route('page.accueil') }}#contact">Contact</a></li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-6 col-6">
                    <h2 class="footer-title">Nos activités</h2>
                    <ul class="footer-links">
                        @foreach ($activites ?? [] as $item)
                            <li><a href="{{ route('page.activites', $item->slug) }}">{{ $item->libelle }}</a></li>
                        @endforeach
                        <li><a href="{{ route('page.souscrire.catalogue') }}">Catalogue de maisons</a></li>
                        <li><a href="{{ route('page.construction.personnalisee') }}">Construction sur mesure</a></li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-6">
                    <h2 class="footer-title">Contact</h2>
                    <ul class="footer-contact">
                        @if ($parametre?->localisation)
                            <li><i class="fas fa-location-dot"></i><span>{{ $parametre->localisation }}</span></li>
                        @endif
                        @if ($phones->isNotEmpty())
                            <li><i class="fas fa-phone"></i>
                                <span>
                                    @foreach ($phones as $phone)
                                        <a href="{{ $telHref($phone) }}">{{ $phone }}</a>@if (!$loop->last)<br>@endif
                                    @endforeach
                                </span>
                            </li>
                        @endif
                        @foreach ($emails as $email)
                            <li><i class="fas fa-envelope"></i><a href="mailto:{{ $email }}">{{ $email }}</a></li>
                        @endforeach
                        <li><i class="fas fa-clock"></i><span>Lun - Ven : 8h - 18h<br>Sam : 9h - 16h</span></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="footer-bottom">
            <div class="container">
                <p class="mb-0">&copy; {{ date('Y') }} {{ $siteName }}. Tous droits réservés.</p>
                <nav aria-label="Liens légaux">
                    <a href="#">Mentions légales</a>
                    <a href="#">Confidentialité</a>
                    <span>Réalisé par <a href="https://www.ticafrique.com/" target="_blank" rel="noopener">TICAFRIQUE</a></span>
                </nav>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.14.5/dist/sweetalert2.all.min.js"></script>

    <script>
        (function() {
            'use strict';

            // ---- Barre de progression (remplace le loader plein écran) ----
            const progress = document.getElementById('pageProgress');
            const endProgress = () => {
                if (!progress) return;
                progress.classList.remove('is-loading');
                progress.classList.add('is-done');
            };
            if (document.readyState === 'complete') endProgress();
            else window.addEventListener('load', endProgress);
            setTimeout(endProgress, 4000);

            // ---- Animations au scroll ----
            if (window.AOS) {
                AOS.init({
                    duration: 650,
                    easing: 'ease-out-cubic',
                    once: true,
                    offset: 60,
                    disable: window.matchMedia('(prefers-reduced-motion: reduce)').matches
                });
            }

            // ---- En-tête : ombre au scroll ----
            const header = document.getElementById('siteHeader');
            const backToTop = document.getElementById('backToTop');
            let ticking = false;
            const onScroll = () => {
                const y = window.scrollY;
                header && header.classList.toggle('is-scrolled', y > 20);
                backToTop && backToTop.classList.toggle('show', y > 500);
                ticking = false;
            };
            window.addEventListener('scroll', () => {
                if (!ticking) {
                    requestAnimationFrame(onScroll);
                    ticking = true;
                }
            }, { passive: true });
            onScroll();

            backToTop && backToTop.addEventListener('click', () => window.scrollTo({ top: 0, behavior: 'smooth' }));

            // ---- Menu mobile ----
            const nav = document.getElementById('mainNav');
            const burger = document.querySelector('.nav-burger');
            if (nav && burger) {
                nav.addEventListener('show.bs.offcanvas', () => burger.setAttribute('aria-expanded', 'true'));
                nav.addEventListener('hide.bs.offcanvas', () => burger.setAttribute('aria-expanded', 'false'));
                // Ferme le tiroir quand on suit un lien
                nav.querySelectorAll('a[href]:not([data-bs-toggle])').forEach(link => {
                    link.addEventListener('click', () => {
                        const oc = window.bootstrap && bootstrap.Offcanvas.getInstance(nav);
                        oc && oc.hide();
                    });
                });
            }

            // ---- Défilement fluide pour les ancres internes de la page ----
            document.querySelectorAll('a[href*="#"]').forEach(anchor => {
                anchor.addEventListener('click', function(e) {
                    const url = new URL(this.href, window.location.href);
                    if (url.pathname !== window.location.pathname || !url.hash || url.hash === '#') return;
                    const target = document.getElementById(decodeURIComponent(url.hash.slice(1)));
                    if (!target) return;
                    e.preventDefault();
                    target.scrollIntoView({ behavior: 'smooth', block: 'start' });
                    history.replaceState(null, '', url.hash);
                });
            });

            // ---- Lien actif selon la section visible (accueil) ----
            const sectionLinks = document.querySelectorAll('.site-header .nav-link[data-section]');
            if (document.body.classList.contains('is-home') && 'IntersectionObserver' in window) {
                const allLinks = document.querySelectorAll('.site-header .navbar-nav > .nav-item > .nav-link');
                const spy = new IntersectionObserver(entries => {
                    entries.forEach(entry => {
                        if (!entry.isIntersecting) return;
                        const id = entry.target.id;
                        const match = [...sectionLinks].find(l => l.dataset.section === id);
                        if (!match) return;
                        allLinks.forEach(l => l.classList.remove('active'));
                        match.classList.add('active');
                    });
                }, { rootMargin: '-45% 0px -50% 0px' });
                ['accueil', 'contact'].forEach(id => {
                    const el = document.getElementById(id);
                    el && spy.observe(el);
                });
            }

            // ---- Images : fondu une fois chargées ----
            document.querySelectorAll('img.img-fade').forEach(img => {
                const done = () => {
                    img.classList.add('is-loaded');
                    img.closest('.img-frame')?.classList.add('is-ready');
                };
                if (img.complete && img.naturalWidth) done();
                else {
                    img.addEventListener('load', done, { once: true });
                    img.addEventListener('error', done, { once: true });
                }
            });

            // ---- Compteurs animés (.js-counter[data-target]) ----
            const counters = document.querySelectorAll('.js-counter');
            if (counters.length && 'IntersectionObserver' in window) {
                const animate = el => {
                    const raw = String(el.dataset.target || '');
                    const m = raw.match(/^(\D*)([\d\s.,]+)(.*)$/);
                    if (!m) { el.textContent = raw; return; }
                    const target = parseInt(m[2].replace(/\D/g, ''), 10) || 0;
                    // Une année (ex. 2014) s'affiche telle quelle, sans animation
                    if (target >= 1900 && target <= 2100) { el.textContent = raw; return; }
                    const start = performance.now();
                    const duration = 1600;
                    const step = now => {
                        const p = Math.min((now - start) / duration, 1);
                        const eased = 1 - Math.pow(1 - p, 3);
                        el.textContent = m[1] + Math.round(target * eased) + m[3];
                        if (p < 1) requestAnimationFrame(step);
                    };
                    requestAnimationFrame(step);
                };
                const io = new IntersectionObserver(entries => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            animate(entry.target);
                            io.unobserve(entry.target);
                        }
                    });
                }, { threshold: .4 });
                counters.forEach(c => io.observe(c));
            }
        })();
    </script>

    @stack('scripts')
</body>

</html>
