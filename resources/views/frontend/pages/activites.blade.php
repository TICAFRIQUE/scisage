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
            padding: 50px 0;
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
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

        /* Nouveau design de processus */
        .process-container {
            position: relative;
            margin: 0 auto;
            padding: 3rem 0;
        }

        .process-header {
            text-align: center;
            margin-bottom: 3rem;
        }

        .process-title {
            font-size: 2.2rem;
            font-weight: 700;
            color: var(--dark-brown);
            margin-bottom: 1rem;
        }

        .process-subtitle {
            font-size: 1.1rem;
            color: var(--dark-gray);
            max-width: 600px;
            margin: 0 auto;
            line-height: 1.6;
        }

        .process-row {
            margin-bottom: 3rem;
        }

        .step-card {
            background: var(--white);
            border-radius: 15px;
            padding: 2rem;
            text-align: center;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
            border: 2px solid transparent;
            transition: all 0.4s ease;
            position: relative;
            overflow: hidden;
            height: 100%;
        }

        .step-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 5px;
            background: var(--gradient-gold);
        }

        .step-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
            border-color: var(--primary-gold);
        }

        .step-number {
            width: 70px;
            height: 70px;
            background: var(--gradient-gold);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.2rem;
            font-size: 1.8rem;
            font-weight: 800;
            color: var(--dark-brown);
            box-shadow: 0 8px 20px rgba(212, 175, 55, 0.3);
            position: relative;
            z-index: 2;
        }

        .step-card:hover .step-number {
            transform: scale(1.1);
            box-shadow: 0 15px 35px rgba(212, 175, 55, 0.5);
        }

        .step-label {
            background: var(--primary-gold);
            color: var(--white);
            font-weight: 600;
            padding: 0.4rem 1rem;
            border-radius: 20px;
            display: inline-block;
            margin-bottom: 1rem;
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .step-title {
            font-size: 1.3rem;
            font-weight: 700;
            color: var(--dark-brown);
            margin-bottom: 1rem;
            line-height: 1.3;
            text-transform: uppercase;
        }

        .step-description {
            color: var(--dark-gray);
            line-height: 1.7;
            font-size: 0.95rem;
        }

        .step-icon {
            width: 50px;
            height: 50px;
            background: rgba(212, 175, 55, 0.1);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1rem;
            font-size: 1.3rem;
            color: var(--primary-gold);
        }

        /* Connecteur entre les lignes */
        .line-connector {
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 1.5rem 0;
            position: relative;
        }

        .line-connector::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 2px;
            height: 50px;
            background: var(--gradient-gold);
        }

        .line-connector-icon {
            background: var(--primary-gold);
            color: var(--white);
            width: 45px;
            height: 45px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
            z-index: 2;
            position: relative;
            box-shadow: 0 5px 15px rgba(212, 175, 55, 0.3);
        }

        /* Styles pour les boutons d'action */
        .action-section .btn:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(212, 175, 55, 0.6) !important;
        }

        /* Message si pas de projets */
        .no-projects {
            text-align: center;
            padding: 4rem 2rem;
            background: var(--white);
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            margin: 3rem auto;
        }

        .no-projects i {
            font-size: 4rem;
            color: var(--primary-gold);
            margin-bottom: 1rem;
        }

        .no-projects h3 {
            color: var(--dark-brown);
            font-weight: 700;
            margin-bottom: 1rem;
        }

        .no-projects p {
            color: var(--dark-gray);
            line-height: 1.6;
        }

        /* Responsive Design */
        @media (max-width: 1200px) {
            .process-row {
                margin-bottom: 2.5rem;
            }
        }

        @media (max-width: 768px) {
            .projects-section {
                padding: 60px 0;
            }

            .process-title {
                font-size: 1.8rem;
            }

            .process-row {
                margin-bottom: 2rem;
            }

            .step-card {
                padding: 2rem 1.5rem;
            }

            .step-number {
                width: 60px;
                height: 60px;
                font-size: 1.5rem;
            }

            .step-title {
                font-size: 1.1rem;
            }

            .step-description {
                font-size: 0.9rem;
            }

            .line-connector {
                margin: 1.5rem 0;
            }

            .line-connector::before {
                height: 40px;
            }

            .line-connector-icon {
                width: 40px;
                height: 40px;
                font-size: 1.1rem;
            }
        }

        @media (max-width: 480px) {
            .section-title {
                font-size: 2rem;
            }

            .process-title {
                font-size: 1.6rem;
            }

            .step-card {
                padding: 1.5rem 1rem;
            }

            .step-number {
                width: 50px;
                height: 50px;
                font-size: 1.2rem;
            }

            .process-row .col-lg-10 {
                padding-left: 15px;
                padding-right: 15px;
            }
        }

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
                padding: 20px 0;
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
            {{-- <div class="section-subtitle" data-aos="fade-up">Processus détaillé</div> --}}
            {{-- <h2 class="section-title" data-aos="fade-up" data-aos-delay="10">
                {{ $activite->libelle }}
            </h2>
            <p class="section-description text-center" data-aos="fade-up" data-aos-delay="100">
                {{ $activite->description }}
            </p> --}}

            @if ($activite->projets && $activite->projets->count() > 0)
                <div class="process-container">
                    <div class="process-header" data-aos="fade-up" data-aos-delay="100">
                        <h3 class="process-title">Étapes du Processus</h3>
                        <p class="process-subtitle">Découvrez notre approche méthodique et structurée pour mener à bien
                            votre projet</p>
                    </div>

                    @foreach ($activite->projets as $index => $projet)
                        <div class="row justify-content-center process-row">
                            <div class="col-lg-8 col-md-10 col-12">
                                <div class="step-card" data-aos="fade-up" data-aos-delay="100">
                                    <div class="step-icon">
                                        @if ($index == 0)
                                            <i class="fas fa-play"></i>
                                        @elseif($index == $activite->projets->count() - 1)
                                            <i class="fas fa-flag-checkered"></i>
                                        @else
                                            <i class="fas fa-cogs"></i>
                                        @endif
                                    </div>

                                    <div class="step-number">
                                        {{ $projet->etape ?: $index + 1 }}
                                    </div>

                                    <div class="step-label">
                                        @if ($projet->etape)
                                            Étape {{ $projet->etape }}
                                        @else
                                            Étape {{ $index + 1 }}
                                        @endif
                                    </div>

                                    <h3 class="step-title">{{ $projet->libelle }}</h3>
                                    <p class="step-description">{{ $projet->description }}</p>

                                    @if ($index == 0)
                                        <div class="step-status" style="margin-top: 1rem;">
                                            <span style="color: var(--primary-gold); font-weight: 600;">
                                                <i class="fas fa-rocket"></i> Démarrage
                                            </span>
                                        </div>
                                    @elseif($index == $activite->projets->count() - 1)
                                        <div class="step-status" style="margin-top: 1rem;">
                                            <span style="color: #28a745; font-weight: 600;">
                                                <i class="fas fa-check-circle"></i> Finalisation
                                            </span>
                                        </div>
                                    @else
                                        <div class="step-status" style="margin-top: 1rem;">
                                            <span style="color: #17a2b8; font-weight: 600;">
                                                <i class="fas fa-spinner"></i> En cours
                                            </span>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>

                        @if ($index < $activite->projets->count() - 1)
                            <div class="line-connector" data-aos="fade-up" data-aos-delay="{{ 200 + $index * 150 }}">
                                <div class="line-connector-icon">
                                    <i class="fas fa-arrow-down"></i>
                                </div>
                            </div>
                        @endif
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

    <!-- Section boutons conditionnels selon l'activité -->
    <section class="action-section" style="padding: 60px 0; background: var(--light-gray);">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-10 text-center">
                    @if ($activite->slug === 'souscrire-a-nos-maisons-de-reves')
                        <h3 class="mb-4" style="color: var(--dark-brown); font-weight: 700;">
                            <i class="fas fa-home me-2" style="color: var(--primary-gold);"></i>
                            Découvrez nos Maisons de Rêves
                        </h3>
                        <p class="mb-4" style="color: var(--dark-gray); font-size: 1.1rem; line-height: 1.6;">
                            Explorez notre catalogue de maisons exceptionnelles et trouvez celle qui correspond parfaitement
                            à vos attentes.
                        </p>
                        <a href="{{ route('page.souscrire.catalogue') }}" class="btn btn-primary btn-lg"
                            style="background: var(--gradient-gold); border: none; border-radius: 50px; padding: 15px 40px; font-weight: 600; text-transform: uppercase; letter-spacing: 1px; box-shadow: 0 10px 30px rgba(212, 175, 55, 0.4); transition: all 0.3s ease;">
                            <i class="fas fa-shopping-cart me-2"></i>
                            Choisir une Maison
                        </a>
                    @elseif($activite->slug === 'faire-construire-votre-maison-de-reve')
                        <h3 class="mb-4" style="color: var(--dark-brown); font-weight: 700;">
                            <i class="fas fa-hammer me-2" style="color: var(--primary-gold);"></i>
                            Construisons Votre Maison de Rêve
                        </h3>
                        <p class="mb-4" style="color: var(--dark-gray); font-size: 1.1rem; line-height: 1.6;">
                            Prêt à concrétiser votre projet ? Partagez-nous vos informations et nous vous accompagnerons
                            dans la réalisation de votre maison sur mesure.
                        </p>
                        <a href="{{ route('page.construction.personnalisee') }}" class="btn btn-primary btn-lg"
                            style="background: var(--gradient-gold); border: none; border-radius: 50px; padding: 15px 40px; font-weight: 600; text-transform: uppercase; letter-spacing: 1px; box-shadow: 0 10px 30px rgba(212, 175, 55, 0.4); transition: all 0.3s ease;">
                            <i class="fas fa-paper-plane me-2"></i>
                            Démarrer Mon Projet
                        </a>
                    @else
                        <!-- Bouton générique pour les autres activités -->
                        <h3 class="mb-4" style="color: var(--dark-brown); font-weight: 700;">
                            <i class="fas fa-rocket me-2" style="color: var(--primary-gold);"></i>
                            Intéressé par cette activité ?
                        </h3>
                        <p class="mb-4" style="color: var(--dark-gray); font-size: 1.1rem; line-height: 1.6;">
                            Contactez-nous pour en savoir plus sur cette activité et découvrir comment nous pouvons vous
                            accompagner.
                        </p>
                        <a href="#form-projet" class="btn btn-primary btn-lg"
                            style="background: var(--gradient-gold); border: none; border-radius: 50px; padding: 15px 40px; font-weight: 600; text-transform: uppercase; letter-spacing: 1px; box-shadow: 0 10px 30px rgba(212, 175, 55, 0.4); transition: all 0.3s ease;">
                            <i class="fas fa-envelope me-2"></i>
                            Nous Contacter
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </section>

    <!-- Section boutton démarrer votre projet (seulement si pas de bouton spécifique affiché) -->
    @if (
        $activite->slug !== 'souscrire-a-nos-maisons-de-reves' &&
            $activite->slug !== 'faire-construire-votre-maison-de-reve')
        @include('frontend.components.boutton_form_projet')
    @endif

@endsection
