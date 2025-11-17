@extends('frontend.layouts.app')

@section('title', $activite->libelle . ' - SCI SAGES')

@push('styles')
    <style>
        /* ================== HERO BANNER ACTIVITÉ ================== */
        .activity-hero {
            background: linear-gradient(135deg, rgba(60, 36, 21, 0.8), rgba(139, 69, 19, 0.6)),
                url('{{ $activite->getFirstMediaUrl('image') ?: asset('images/default-activity.jpg') }}');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            height: 60vh;
            display: flex;
            align-items: center;
            position: relative;
            overflow: hidden;
        }

        .activity-hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(60, 36, 21, 0.2);
            z-index: 1;
        }

        .activity-hero-content {
            position: relative;
            z-index: 2;
            text-align: center;
            color: var(--white);
        }

        .activity-hero h1 {
            font-size: 3.5rem;
            font-weight: 800;
            margin-bottom: 1rem;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
            color: var(--white);
        }

        .activity-hero .hero-icon {
            font-size: 4rem;
            color: var(--primary-gold);
            margin: 3rem 0 1rem 0;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
        }

        .activity-description {
            font-size: 1.2rem;
            line-height: 1.8;
            max-width: 800px;
            margin: 0 auto;
            color: rgba(255, 255, 255, 0.9);
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.3);
        }

        /* ================== BREADCRUMB ================== */
        .breadcrumb-section {
            background: var(--light-gray);
            padding: 1rem 0;
            border-bottom: 3px solid var(--primary-gold);
        }

        .breadcrumb-custom {
            background: transparent;
            padding: 0;
            margin: 0;
            font-size: 0.95rem;
        }

        .breadcrumb-custom .breadcrumb-item {
            color: var(--dark-gray);
            font-weight: 500;
        }

        .breadcrumb-custom .breadcrumb-item+.breadcrumb-item::before {
            content: '›';
            color: var(--primary-gold);
            font-weight: 700;
            font-size: 1.2rem;
        }

        .breadcrumb-custom .breadcrumb-item a {
            color: var(--dark-brown);
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .breadcrumb-custom .breadcrumb-item a:hover {
            color: var(--primary-gold);
            text-decoration: underline;
        }

        .breadcrumb-custom .breadcrumb-item.active {
            color: var(--primary-gold);
            font-weight: 600;
        }

        /* ================== SECTION PROJETS/ÉTAPES ================== */
        .projects-section {
            padding: 100px 0;
            background: var(--white);
        }

        .section-title {
            text-align: center;
            font-size: 2.5rem;
            font-weight: 800;
            color: var(--dark-brown);
            margin-bottom: 3rem;
        }

        .section-subtitle {
            text-align: center;
            color: var(--primary-gold);
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 2px;
            font-size: 1rem;
            margin-bottom: 1rem;
        }

        .projects-timeline {
            position: relative;
            max-width: 1000px;
            margin: 0 auto;
            padding: 2rem 0;
        }

        .projects-timeline::before {
            content: '';
            position: absolute;
            left: 50%;
            top: 0;
            bottom: 0;
            width: 4px;
            background: linear-gradient(to bottom, var(--primary-gold), var(--secondary-gold));
            transform: translateX(-50%);
            border-radius: 2px;
        }

        .timeline-item {
            position: relative;
            margin-bottom: 4rem;
            width: 45%;
        }

        .timeline-item:nth-child(odd) {
            left: 0;
            text-align: right;
        }

        .timeline-item:nth-child(even) {
            left: 55%;
            text-align: left;
        }

        .timeline-content {
            background: var(--white);
            padding: 2.5rem;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            border: 2px solid var(--light-gray);
            transition: all 0.3s ease;
            position: relative;
        }

        .timeline-content::before {
            content: '';
            position: absolute;
            top: 50%;
            width: 20px;
            height: 20px;
            background: var(--white);
            border: 3px solid var(--primary-gold);
            transform: translateY(-50%);
        }

        .timeline-item:nth-child(odd) .timeline-content::before {
            right: -45px;
            transform: translateY(-50%) rotate(45deg);
        }

        .timeline-item:nth-child(even) .timeline-content::before {
            left: -45px;
            transform: translateY(-50%) rotate(45deg);
        }

        .timeline-content:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);
            border-color: var(--primary-gold);
        }

        .timeline-step {
            background: var(--gradient-gold);
            color: var(--dark-brown);
            font-weight: 700;
            padding: 0.5rem 1.5rem;
            border-radius: 25px;
            display: inline-block;
            margin-bottom: 1rem;
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .timeline-title {
            font-size: 1.4rem;
            font-weight: 700;
            color: var(--dark-brown);
            margin-bottom: 1rem;
            line-height: 1.3;
        }

        .timeline-description {
            color: var(--dark-gray);
            line-height: 1.7;
            font-size: 1rem;
            margin: 0;
        }

        .timeline-number {
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            width: 50px;
            height: 50px;
            background: var(--gradient-gold);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            color: var(--dark-brown);
            font-size: 1.2rem;
            box-shadow: 0 5px 15px rgba(212, 175, 55, 0.3);
            border: 4px solid var(--white);
        }

        /* Message si pas de projets */
        .no-projects {
            text-align: center;
            padding: 4rem 2rem;
            background: var(--light-gray);
            border-radius: 20px;
            margin: 2rem 0;
        }

        .no-projects i {
            font-size: 4rem;
            color: var(--primary-gold);
            margin-bottom: 1rem;
        }

        .no-projects h3 {
            color: var(--dark-brown);
            font-weight: 600;
            margin-bottom: 1rem;
        }

        .no-projects p {
            color: var(--dark-gray);
            font-size: 1.1rem;
        }



        /* ================== RESPONSIVE ================== */
        @media (max-width: 991px) {
            .activity-hero {
                height: 50vh;
            }

            .activity-hero h1 {
                font-size: 2.8rem;
            }

            .activity-hero .hero-icon {
                font-size: 3rem;
            }

            .projects-timeline::before {
                left: 30px;
            }

            .timeline-item {
                width: 100%;
                left: 50px !important;
                text-align: left !important;
            }

            .timeline-content::before {
                left: -45px !important;
            }

            .timeline-number {
                left: 30px;
            }
        }

        @media (max-width: 768px) {
            .activity-hero {
                height: 40vh;
            }

            .activity-hero h1 {
                font-size: 2.2rem;
            }

            .activity-hero .hero-icon {
                font-size: 2.5rem;
            }

            .activity-description {
                font-size: 1.1rem;
                padding: 0 1rem;
            }

            .projects-section {
                padding: 60px 0;
            }

            .section-title {
                font-size: 2rem;
            }

            .timeline-content {
                padding: 1.5rem;
                margin-right: 1rem;
            }

            .timeline-title {
                font-size: 1.2rem;
            }

            .timeline-description {
                font-size: 0.95rem;
            }

            .cta-section {
                padding: 60px 0;
            }

            .cta-title {
                font-size: 1.8rem;
            }

            .cta-description {
                font-size: 1.1rem;
            }
        }

        @media (max-width: 480px) {
            .activity-hero h1 {
                font-size: 1.8rem;
            }

            .timeline-item {
                left: 30px !important;
            }

            .timeline-content {
                margin-right: 0;
                padding: 1.2rem;
            }

            .timeline-number {
                width: 40px;
                height: 40px;
                font-size: 1rem;
            }

            .btn-cta {
                padding: 0.8rem 2rem;
                font-size: 1rem;
            }
        }
    </style>
@endpush

@section('content')
    <!-- Hero Banner -->
    <section class="activity-hero">
        <div class="container">
            <div class="activity-hero-content" data-aos="fade-up">
                @if ($activite->icone)
                    <div class="hero-icon">
                        <i class="{{ $activite->icone }}"></i>
                    </div>
                @endif
                <h1>{{ $activite->libelle }}</h1>
                {{-- <div class="activity-description">
                    {{ $activite->description }}
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
                    <li class="breadcrumb-item">
                        <a href="{{ route('page.accueil') }}#projets">Activités</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        {{ $activite->libelle }}
                    </li>
                </ol>
            </nav>
        </div>
    </section>

    <!-- Section des Projets/Étapes -->
    <section class="projects-section">
        <div class="container">
            <div class="section-subtitle" data-aos="fade-up">Processus détaillé</div>
            <h2 class="section-title" data-aos="fade-up" data-aos-delay="10">
                {{ $activite->libelle }}
            </h2>

            @if ($activite->projets && $activite->projets->count() > 0)
                <div class="projects-timeline">
                    @foreach ($activite->projets as $index => $projet)
                        <div class="timeline-item" data-aos="fade-up" data-aos-delay="10">
                            <div class="timeline-content">
                                <div class="timeline-step">
                                    @if ($projet->etape)
                                        Étape {{ $projet->etape }}
                                    @else
                                        Étape {{ $index + 1 }}
                                    @endif
                                </div>
                                <h3 class="timeline-title">{{ $projet->libelle }}</h3>
                                <p class="timeline-description">{{ $projet->description }}</p>
                            </div>
                            {{-- <div class="timeline-number">
                            {{ $projet->etape ?: $index + 1 }}
                        </div> --}}
                        </div>
                    @endforeach
                </div>
            @else
                <div class="no-projects" data-aos="fade-up" data-aos-delay="200">
                    <i class="fas fa-info-circle"></i>
                    <h3>Informations en cours de mise à jour</h3>
                    <p>Les détails des étapes pour cette activité seront bientôt disponibles. Contactez-nous pour plus
                        d'informations.</p>
                </div>
            @endif
        </div>
    </section>

    <!-- Section boutton démarrer votre projet -->
    @include('frontend.components.boutton_form_projet')

@endsection
