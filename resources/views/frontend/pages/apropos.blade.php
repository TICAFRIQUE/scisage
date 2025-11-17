@extends('frontend.layouts.app')

@section('title', 'À propos - SCI SAGES')

@push('styles')
    <style>
        /* ================== HERO BANNER À PROPOS ================== */
        .apropos-hero {
            background: linear-gradient(135deg, rgba(60, 36, 21, 0.85), rgba(139, 69, 19, 0.7)),
                url('{{ asset('images/apropos-hero-bg.jpg') }}');
            background-size: cover;
            background-position: center;
            height: 50vh;
            display: flex;
            align-items: center;
            position: relative;
        }

        .apropos-hero-content {
            position: relative;
            z-index: 2;
            text-align: center;
            color: var(--white);
        }

        .apropos-hero h1 {
            font-size: 3rem;
            font-weight: 800;
            margin-bottom: 1rem;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
            color: var(--white);
        }

        .apropos-hero .hero-icon {
            font-size: 3.5rem;
            color: var(--primary-gold);
            /* margin-bottom: 1rem; */
            margin: 3rem 0 1rem 0;
            /* Ajouter une marge en haut */

            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
        }

        .apropos-description {
            font-size: 1.1rem;
            line-height: 1.6;
            max-width: 700px;
            margin: 0 auto;
            color: rgba(255, 255, 255, 0.95);
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.3);
        }

        /* ================== BREADCRUMB ================== */
        .breadcrumb-section {
            background: var(--light-gray);
            padding: 1rem 0;
            border-bottom: 2px solid var(--primary-gold);
        }

        .breadcrumb-custom {
            background: transparent;
            padding: 0;
            margin: 0;
            font-size: 0.9rem;
        }

        .breadcrumb-custom .breadcrumb-item {
            color: var(--dark-gray);
            font-weight: 500;
        }

        .breadcrumb-custom .breadcrumb-item+.breadcrumb-item::before {
            content: '›';
            color: var(--primary-gold);
            font-weight: 700;
        }

        .breadcrumb-custom .breadcrumb-item a {
            color: var(--dark-brown);
            text-decoration: none;
            transition: color 0.2s ease;
        }

        .breadcrumb-custom .breadcrumb-item a:hover {
            color: var(--primary-gold);
        }

        .breadcrumb-custom .breadcrumb-item.active {
            color: var(--primary-gold);
            font-weight: 600;
        }

        /* ================== SECTION À PROPOS ================== */
        .apropos-section {
            padding: 80px 0;
            background: var(--white);
        }

        .apropos-container {
            /* display: grid; */
            grid-template-columns: 1fr 1fr;
            gap: 4rem;
            align-items: center;
            /* margin-bottom: 4rem; */
        }

        .apropos-content h2 {
            font-size: 2.5rem;
            font-weight: 800;
            color: var(--dark-brown);
            margin-bottom: 1rem;
            line-height: 1.2;
        }

        .apropos-content .subtitle {
            color: var(--primary-gold);
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            font-size: 0.9rem;
            margin-bottom: 1rem;
        }

        .apropos-content p {
            font-size: 1.1rem;
            line-height: 1.8;
            color: var(--dark-gray);
            margin-bottom: 1.5rem;
            text-align: justify;
        }

        .apropos-image {
            position: relative;
            overflow: hidden;
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
        }

        .apropos-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .apropos-image:hover img {
            transform: scale(1.05);
        }

        /* ================== SECTION VALEURS ================== */
        .valeurs-section {
            background: var(--light-gray);
            padding: 60px 0;
        }

        .section-header {
            text-align: center;
            margin-bottom: 3rem;
        }

        .section-subtitle {
            color: var(--primary-gold);
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            font-size: 0.9rem;
            margin-bottom: 0.5rem;
        }

        .section-title {
            font-size: 2.5rem;
            font-weight: 800;
            color: var(--dark-brown);
            margin: 0;
        }

        .valeurs-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
        }

        .valeur-card {
            background: var(--white);
            padding: 2.5rem 2rem;
            border-radius: 15px;
            text-align: center;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            border-top: 4px solid var(--primary-gold);
        }

        .valeur-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
        }

        .valeur-icon {
            font-size: 3rem;
            color: var(--primary-gold);
            margin-bottom: 1.5rem;
        }

        .valeur-card h3 {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--dark-brown);
            margin-bottom: 1rem;
        }

        .valeur-card p {
            color: var(--dark-gray);
            line-height: 1.6;
            font-size: 1rem;
        }

        /* ================== SECTION ÉQUIPE ================== */
        .equipe-section {
            padding: 80px 0;
            background: var(--white);
        }

        .equipe-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            /* 3 colonnes fixes */
            gap: 2.5rem;
            margin-top: 3rem;
            max-width: 1200px;
            /* Limiter la largeur pour un meilleur rendu */
            margin-left: auto;
            margin-right: auto;
        }

        .membre-card {
            background: var(--white);
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            position: relative;
            width: 100%;
            /* Assurer que les cartes prennent toute la largeur disponible */
        }

        .membre-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.2);
        }

        .membre-image {
            position: relative;
            height: 280px;
            /* Réduire légèrement la hauteur pour un meilleur équilibre */
            overflow: hidden;
        }

        .membre-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .membre-card:hover .membre-image img {
            transform: scale(1.1);
        }

        .membre-overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: linear-gradient(transparent, rgba(60, 36, 21, 0.9));
            padding: 2rem 1.5rem 1.5rem;
            color: var(--white);
            transform: translateY(50%);
            transition: transform 0.3s ease;
        }

        .membre-card:hover .membre-overlay {
            transform: translateY(0);
        }

        .membre-content {
            padding: 1.8rem 1.5rem;
            /* Réduire légèrement le padding */
            text-align: center;
        }

        .membre-nom {
            font-size: 1.3rem;
            /* Légèrement plus petit */
            font-weight: 700;
            color: var(--dark-brown);
            margin-bottom: 0.5rem;
            line-height: 1.2;
        }

        .membre-poste {
            color: var(--primary-gold);
            font-weight: 600;
            font-size: 0.95rem;
            margin-bottom: 1rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .membre-description {
            color: var(--dark-gray);
            line-height: 1.5;
            font-size: 0.9rem;
            margin-bottom: 1.2rem;
            height: 60px;
            /* Hauteur fixe pour uniformiser */
            overflow: hidden;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
        }

        .membre-contact {
            display: flex;
            justify-content: center;
            gap: 0.5rem;
            flex-wrap: wrap;
        }

        .contact-info {
            background: var(--light-gray);
            padding: 0.3rem 0.7rem;
            border-radius: 12px;
            font-size: 0.75rem;
            color: var(--dark-brown);
            display: flex;
            align-items: center;
            gap: 0.3rem;
            transition: all 0.3s ease;
        }

        .contact-info:hover {
            background: var(--primary-gold);
            color: var(--white);
            transform: translateY(-2px);
        }

        /* ================== STATISTIQUES ================== */
        .stats-section {
            background: var(--gradient-gold);
            padding: 60px 0;
            color: var(--dark-brown);
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 2rem;
            text-align: center;
        }

        .stat-item {
            padding: 1.5rem;
        }

        .stat-number {
            font-size: 3rem;
            font-weight: 800;
            margin-bottom: 0.5rem;
            color: var(--dark-brown);
        }

        .stat-label {
            font-size: 1.1rem;
            font-weight: 600;
            color: var(--dark-brown);
            opacity: 0.8;
        }

        /* ================== RESPONSIVE ================== */
        @media (max-width: 991px) {
            .apropos-hero h1 {
                font-size: 2.5rem;
            }

            .apropos-container {
                grid-template-columns: 1fr;
                gap: 3rem;
            }

            .apropos-content h2 {
                font-size: 2rem;
            }

            .section-title {
                font-size: 2rem;
            }

            /* ================== SECTION ÉQUIPE ================== */
            .equipe-section {
                padding: 80px 0;
                background: var(--white);
            }

            .equipe-grid {
                display: grid;
                grid-template-columns: repeat(3, 1fr);
                /* 3 colonnes fixes */
                gap: 2.5rem;
                margin-top: 3rem;
                max-width: 1200px;
                /* Limiter la largeur pour un meilleur rendu */
                margin-left: auto;
                margin-right: auto;
            }

            .membre-card {
                background: var(--white);
                border-radius: 20px;
                overflow: hidden;
                box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
                transition: all 0.3s ease;
                position: relative;
                width: 100%;
                /* Assurer que les cartes prennent toute la largeur disponible */
            }

            .membre-card:hover {
                transform: translateY(-10px);
                box-shadow: 0 25px 50px rgba(0, 0, 0, 0.2);
            }

            .membre-image {
                position: relative;
                height: 280px;
                /* Réduire légèrement la hauteur pour un meilleur équilibre */
                overflow: hidden;
            }

            .membre-image img {
                width: 100%;
                height: 100%;
                object-fit: cover;
                transition: transform 0.3s ease;
            }

            .membre-card:hover .membre-image img {
                transform: scale(1.1);
            }

            .membre-overlay {
                position: absolute;
                bottom: 0;
                left: 0;
                right: 0;
                background: linear-gradient(transparent, rgba(60, 36, 21, 0.9));
                padding: 2rem 1.5rem 1.5rem;
                color: var(--white);
                transform: translateY(50%);
                transition: transform 0.3s ease;
            }

            .membre-card:hover .membre-overlay {
                transform: translateY(0);
            }

            .membre-content {
                padding: 1.8rem 1.5rem;
                /* Réduire légèrement le padding */
                text-align: center;
            }

            .membre-nom {
                font-size: 1.3rem;
                /* Légèrement plus petit */
                font-weight: 700;
                color: var(--dark-brown);
                margin-bottom: 0.5rem;
                line-height: 1.2;
            }

            .membre-poste {
                color: var(--primary-gold);
                font-weight: 600;
                font-size: 0.95rem;
                margin-bottom: 1rem;
                text-transform: uppercase;
                letter-spacing: 0.5px;
            }

            .membre-description {
                color: var(--dark-gray);
                line-height: 1.5;
                font-size: 0.9rem;
                margin-bottom: 1.2rem;
                height: 60px;
                /* Hauteur fixe pour uniformiser */
                overflow: hidden;
                display: -webkit-box;
                -webkit-line-clamp: 3;
                -webkit-box-orient: vertical;
            }

            .membre-contact {
                display: flex;
                justify-content: center;
                gap: 0.5rem;
                flex-wrap: wrap;
            }

            .contact-info {
                background: var(--light-gray);
                padding: 0.3rem 0.7rem;
                border-radius: 12px;
                font-size: 0.75rem;
                color: var(--dark-brown);
                display: flex;
                align-items: center;
                gap: 0.3rem;
                transition: all 0.3s ease;
            }

            .contact-info:hover {
                background: var(--primary-gold);
                color: var(--white);
                transform: translateY(-2px);
            }

            /* ================== RESPONSIVE ================== */
            @media (max-width: 1200px) {
                .equipe-grid {
                    max-width: 1000px;
                    gap: 2rem;
                }

                .membre-image {
                    height: 260px;
                }
            }

            @media (max-width: 991px) {
                .equipe-grid {
                    grid-template-columns: repeat(2, 1fr);
                    /* 2 colonnes sur tablettes */
                    gap: 2rem;
                    max-width: 700px;
                }

                .membre-image {
                    height: 280px;
                }
            }

            @media (max-width: 768px) {
                .equipe-grid {
                    grid-template-columns: 1fr;
                    /* 1 colonne sur mobile */
                    gap: 1.5rem;
                    max-width: 400px;
                }

                .membre-content {
                    padding: 2rem;
                }

                .membre-nom {
                    font-size: 1.4rem;
                }

                .membre-description {
                    height: auto;
                    /* Hauteur automatique sur mobile */
                    -webkit-line-clamp: none;
                }
            }

            @media (max-width: 480px) {
                .membre-content {
                    padding: 1.5rem;
                }

                .contact-info {
                    font-size: 0.8rem;
                    padding: 0.4rem 0.8rem;
                }
            }

                {
                grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
                gap: 2rem;
            }
        }

        @media (max-width: 768px) {
            .apropos-hero {
                height: 40vh;
            }

            .apropos-hero h1 {
                font-size: 2rem;
            }

            .apropos-hero .hero-icon {
                font-size: 2.5rem;
            }

            .apropos-description {
                font-size: 1rem;
                padding: 0 1rem;
            }

            .apropos-section {
                padding: 60px 0;
            }

            .apropos-container {
                gap: 2rem;
            }

            .apropos-content h2 {
                font-size: 1.8rem;
            }

            .apropos-content p {
                font-size: 1rem;
            }

            .section-title {
                font-size: 1.8rem;
            }

            .valeurs-grid {
                grid-template-columns: 1fr;
                gap: 1.5rem;
            }

            .valeur-card {
                padding: 2rem 1.5rem;
            }

            .equipe-grid {
                grid-template-columns: 1fr;
                gap: 1.5rem;
            }

            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 1.5rem;
            }

            .stat-number {
                font-size: 2.5rem;
            }
        }

        @media (max-width: 480px) {
            .apropos-hero h1 {
                font-size: 1.7rem;
            }

            .valeur-card {
                padding: 1.5rem 1rem;
            }

            .membre-content {
                padding: 1.5rem;
            }

            .stats-grid {
                grid-template-columns: 1fr;
            }

            .stat-number {
                font-size: 2rem;
            }
        }
    </style>
@endpush

@section('content')
    <!-- Hero Banner -->
    <section class="apropos-hero">
        <div class="container">
            <div class="apropos-hero-content">
                <div class="hero-icon">
                    <i class="fas fa-users"></i>
                </div>
                <h1>À Propos de SCI SAGES</h1>
                {{-- <div class="apropos-description">
                    Découvrez notre histoire, nos valeurs et l'équipe passionnée qui œuvre chaque jour
                    pour concrétiser vos projets immobiliers avec excellence et innovation.
                </div> --}}
            </div>
        </div>
    </section>

    <!-- Breadcrumb -->
    <section class="breadcrumb-section">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-custom">
                    <li class="breadcrumb-item">
                        <a href="{{ route('page.accueil') }}">
                            <i class="fas fa-home me-1"></i>Accueil
                        </a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        À propos
                    </li>
                </ol>
            </nav>
        </div>
    </section>

    <!-- Section À Propos -->
    @if ($apropos)
        <section class="apropos-section">
            <div class="container">
                <div class="apropos-container">
                    <div class="apropos-content">
                        <div class="subtitle text-center">MOT DU DIRECTEUR</div>
                        <h2>Excellence et Innovation Immobilière</h2>
                        <div class="description">
                            {!! $apropos->description ??
                                'SCI SAGES est votre partenaire de confiance dans le domaine de l\'immobilier. Fort de notre expérience et de notre expertise, nous accompagnons nos clients dans la réalisation de leurs projets les plus ambitieux.' !!}
                        </div>
                    </div>
                    {{-- <div class="apropos-image">
                @if ($apropos->getFirstMediaUrl('image'))
                    <img src="{{ $apropos->getFirstMediaUrl('image') }}" alt="{{ $apropos->libelle }}" loading="lazy">
                @else
                    <img src="https://via.placeholder.com/600x400/cccccc/666666?text=Image+A+Propos" alt="À propos" loading="lazy">
                @endif
            </div> --}}
                </div>
            </div>
        </section>
    @endif

    <!-- Section Valeurs -->
    <section class="valeurs-section">
        <div class="container">
            <div class="section-header">
                <div class="section-subtitle">Nos Piliers</div>
                <h2 class="section-title">Nos Valeurs</h2>
            </div>

            <div class="valeurs-grid">
                @foreach ($engagements as $item)
                    <div class="valeur-card">
                        <div class="valeur-icon">
                            <i class="{{ $item->icone ?? '' }}"></i>
                        </div>
                        <h3>{{ $item->libelle ?? '' }}</h3>
                        <p>{{ $item->description ?? '' }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Section Statistiques -->
    <section class="stats-section">
        <div class="container">
            <div class="stats-grid">

                @foreach ($statistiques as $item)
                    <div class="stat-item">
                        <div class="stat-number" data-target="{{ $item->chiffre ?? 0 }}">0</div>
                        <div class="stat-label">{{ $item->libelle ?? '' }}</div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Section Équipe -->
    <section class="equipe-section">
        <div class="container">
            <div class="section-header">
                <div class="section-subtitle">Notre Force</div>
                <h2 class="section-title">Notre Équipe</h2>
            </div>

            <div class="equipe-grid">
                @forelse($equipes as $membre)
                    <div class="membre-card">
                        <div class="membre-image">
                            @if ($membre->getFirstMediaUrl('image'))
                                <img src="{{ $membre->getFirstMediaUrl('image') }}"
                                    alt="{{ $membre->nom }} {{ $membre->prenom }}" loading="lazy">
                            @else
                                <img src="https://via.placeholder.com/300x300/cccccc/666666?text={{ strtoupper(substr($membre->prenom, 0, 1)) }}{{ strtoupper(substr($membre->nom, 0, 1)) }}"
                                    alt="{{ $membre->nom }} {{ $membre->prenom }}" loading="lazy">
                            @endif

                            @if ($membre->description)
                                <div class="membre-overlay">
                                    <p>{{ $membre->description }}</p>
                                </div>
                            @endif
                        </div>

                        <div class="membre-content">
                            <h3 class="membre-nom">{{ $membre->prenom }} {{ $membre->nom }}</h3>
                            <div class="membre-poste">{{ $membre->poste ?? 'Membre de l\'équipe' }}</div>

                            @if ($membre->description)
                                <div class="membre-description">{{ Str::limit($membre->description, 80) }}</div>
                            @endif

                            <div class="membre-contact">
                                @if ($membre->email)
                                    <div class="contact-info">
                                        <i class="fas fa-envelope"></i>
                                        {{ $membre->email }}
                                    </div>
                                @endif

                                @if ($membre->telephone)
                                    <div class="contact-info">
                                        <i class="fas fa-phone"></i>
                                        {{ $membre->telephone }}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center py-5">
                        <i class="fas fa-users fa-3x text-muted mb-3"></i>
                        <h4>Équipe en cours de constitution</h4>
                        <p class="text-muted">Les informations sur notre équipe seront bientôt disponibles.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
    @include('frontend.components.boutton_form_projet')


    <script>
        // Animation des compteurs
        document.addEventListener('DOMContentLoaded', function() {
            const animateCounters = () => {
                const counters = document.querySelectorAll('.stat-number');

                counters.forEach(counter => {
                    const target = parseInt(counter.getAttribute('data-target'));
                    const duration = 2000; // 2 secondes
                    const step = target / (duration / 16); // 60fps
                    let current = 0;

                    const updateCounter = () => {
                        current += step;
                        if (current < target) {
                            counter.textContent = Math.floor(current);
                            requestAnimationFrame(updateCounter);
                        } else {
                            counter.textContent = target;
                        }
                    };

                    updateCounter();
                });
            };

            // Intersection Observer pour déclencher l'animation au scroll
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        animateCounters();
                        observer.unobserve(entry.target);
                    }
                });
            }, {
                threshold: 0.5
            });

            const statsSection = document.querySelector('.stats-section');
            if (statsSection) {
                observer.observe(statsSection);
            }

            // Animation des cartes équipe au scroll
            const observerCards = new IntersectionObserver((entries) => {
                entries.forEach((entry, index) => {
                    if (entry.isIntersecting) {
                        setTimeout(() => {
                            entry.target.style.opacity = '1';
                            entry.target.style.transform = 'translateY(0)';
                        }, index * 100);
                        observerCards.unobserve(entry.target);
                    }
                });
            }, {
                threshold: 0.1
            });

            // Appliquer l'animation aux cartes équipe
            document.querySelectorAll('.membre-card').forEach(card => {
                card.style.opacity = '0';
                card.style.transform = 'translateY(50px)';
                card.style.transition = 'all 0.6s ease';
                observerCards.observe(card);
            });

            // Smooth scrolling pour les ancres
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function(e) {
                    e.preventDefault();
                    const target = document.querySelector(this.getAttribute('href'));
                    if (target) {
                        target.scrollIntoView({
                            behavior: 'smooth',
                            block: 'start'
                        });
                    }
                });
            });
        });
    </script>

@endsection
