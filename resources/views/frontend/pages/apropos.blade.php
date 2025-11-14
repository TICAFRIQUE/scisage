
@extends('frontend.layouts.app')

@section('title', 'À propos - SCI SAGES')

@section('content')

<style>
    /* ================== HERO SECTION À PROPOS ================== */
    .about-hero {
        background: linear-gradient(135deg, rgba(60, 36, 21, 0.85), rgba(139, 69, 19, 0.7)), 
                    url('{{ asset('images/about-hero-bg.jpg') }}');
        background-size: cover;
        background-position: center;
        height: 60vh;
        display: flex;
        align-items: center;
        position: relative;
        overflow: hidden;
    }

    .about-hero::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(45deg, 
            rgba(60, 36, 21, 0.9) 0%, 
            rgba(139, 69, 19, 0.7) 50%, 
            rgba(212, 175, 55, 0.1) 100%);
        z-index: 1;
    }

    .about-hero-content {
        position: relative;
        z-index: 2;
        text-align: center;
        color: var(--white);
    }

    .about-hero h1 {
        font-size: 3.5rem;
        font-weight: 800;
        margin-bottom: 1.5rem;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        color: var(--white);
    }

    .about-hero .hero-icon {
        font-size: 4rem;
        color: var(--primary-gold);
        margin-bottom: 1.5rem;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
        animation: floating 3s ease-in-out infinite;
    }

    .about-hero-description {
        font-size: 1.2rem;
        line-height: 1.6;
        max-width: 800px;
        margin: 0 auto;
        color: rgba(255, 255, 255, 0.95);
        text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.3);
        font-weight: 300;
    }

    /* ================== BREADCRUMB ================== */
    .breadcrumb-section {
        background: var(--light-gray);
        padding: 1.5rem 0;
        border-bottom: 3px solid var(--primary-gold);
    }

    .breadcrumb-custom {
        background: transparent;
        padding: 0;
        margin: 0;
        font-size: 1rem;
    }

    .breadcrumb-custom .breadcrumb-item {
        color: var(--dark-gray);
        font-weight: 500;
    }

    .breadcrumb-custom .breadcrumb-item + .breadcrumb-item::before {
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
    }

    .breadcrumb-custom .breadcrumb-item.active {
        color: var(--primary-gold);
        font-weight: 600;
    }

    /* ================== SECTION À PROPOS ================== */
    .about-content-section {
        padding: 100px 0;
        background: var(--white);
        position: relative;
    }

    .about-content-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 100px;
        background: linear-gradient(180deg, var(--light-gray) 0%, transparent 100%);
        z-index: 1;
    }

    .about-content {
        position: relative;
        z-index: 2;
    }

    .about-image {
        position: relative;
        border-radius: 25px;
        overflow: hidden;
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.15);
        transform: perspective(1000px) rotateY(-5deg);
        transition: all 0.4s ease;
    }

    .about-image:hover {
        transform: perspective(1000px) rotateY(0deg) translateY(-10px);
        box-shadow: 0 30px 80px rgba(0, 0, 0, 0.2);
    }

    .about-image img {
        width: 100%;
        height: auto;
        min-height: 400px;
        object-fit: cover;
        transition: transform 0.4s ease;
    }

    .about-image:hover img {
        transform: scale(1.05);
    }

    .about-image-overlay {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(135deg, 
            rgba(212, 175, 55, 0.1) 0%, 
            transparent 50%, 
            rgba(60, 36, 21, 0.1) 100%);
        pointer-events: none;
    }

    .about-text {
        padding-left: 3rem;
    }

    .about-text h2 {
        font-size: 2.8rem;
        font-weight: 800;
        color: var(--dark-brown);
        margin-bottom: 1.5rem;
        position: relative;
    }

    .about-text h2::after {
        content: '';
        position: absolute;
        bottom: -10px;
        left: 0;
        width: 100px;
        height: 4px;
        background: var(--gradient-gold);
        border-radius: 2px;
    }

    .about-text .section-subtitle {
        color: var(--primary-gold);
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 2px;
        font-size: 1rem;
        margin-bottom: 1rem;
    }

    .about-description {
        font-size: 1.1rem;
        line-height: 1.8;
        color: var(--dark-gray);
        margin-bottom: 2rem;
        text-align: justify;
    }

    .about-description p {
        margin-bottom: 1.5rem;
    }

    .about-stats {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(120px, 1fr));
        gap: 2rem;
        margin-top: 3rem;
        padding-top: 2rem;
        border-top: 2px solid var(--light-gray);
    }

    .about-stat {
        text-align: center;
    }

    .about-stat-number {
        font-size: 2.5rem;
        font-weight: 800;
        color: var(--primary-gold);
        display: block;
        margin-bottom: 0.5rem;
    }

    .about-stat-label {
        font-size: 0.9rem;
        color: var(--dark-gray);
        text-transform: uppercase;
        font-weight: 600;
        letter-spacing: 0.5px;
    }

    /* ================== SECTION ÉQUIPE ================== */
    .team-section {
        background: var(--light-gray);
        padding: 100px 0;
        position: relative;
    }

    .section-header {
        text-align: center;
        margin-bottom: 4rem;
    }

    .section-title {
        font-size: 2.8rem;
        font-weight: 800;
        color: var(--dark-brown);
        margin-bottom: 1rem;
    }

    .section-subtitle {
        color: var(--primary-gold);
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 2px;
        font-size: 1rem;
        margin-bottom: 1rem;
    }

    .section-description {
        font-size: 1.1rem;
        color: var(--dark-gray);
        max-width: 600px;
        margin: 0 auto;
        line-height: 1.6;
    }

    .team-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 2.5rem;
        margin-top: 3rem;
    }

    .team-card {
        background: var(--white);
        border-radius: 25px;
        overflow: hidden;
        box-shadow: 0 15px 40px rgba(0, 0, 0, 0.1);
        transition: all 0.4s ease;
        position: relative;
        transform: translateY(0);
    }

    .team-card:hover {
        transform: translateY(-15px);
        box-shadow: 0 25px 60px rgba(0, 0, 0, 0.15);
    }

    .team-image {
        position: relative;
        height: 300px;
        overflow: hidden;
    }

    .team-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.4s ease;
    }

    .team-card:hover .team-image img {
        transform: scale(1.1);
    }

    .team-overlay {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(135deg, 
            rgba(60, 36, 21, 0.8) 0%, 
            rgba(212, 175, 55, 0.6) 100%);
        opacity: 0;
        transition: opacity 0.4s ease;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .team-card:hover .team-overlay {
        opacity: 1;
    }

    .team-social {
        display: flex;
        gap: 1rem;
    }

    .social-link {
        width: 45px;
        height: 45px;
        background: rgba(255, 255, 255, 0.9);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--dark-brown);
        text-decoration: none;
        transition: all 0.3s ease;
        transform: translateY(20px);
        opacity: 0;
    }

    .team-card:hover .social-link {
        transform: translateY(0);
        opacity: 1;
    }

    .team-card:hover .social-link:nth-child(1) { transition-delay: 0.1s; }
    .team-card:hover .social-link:nth-child(2) { transition-delay: 0.2s; }
    .team-card:hover .social-link:nth-child(3) { transition-delay: 0.3s; }

    .social-link:hover {
        background: var(--primary-gold);
        transform: translateY(-5px) scale(1.1);
    }

    .team-info {
        padding: 2rem;
        text-align: center;
    }

    .team-name {
        font-size: 1.4rem;
        font-weight: 700;
        color: var(--dark-brown);
        margin-bottom: 0.5rem;
    }

    .team-position {
        font-size: 1rem;
        color: var(--primary-gold);
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        margin-bottom: 1rem;
    }

    .team-description {
        font-size: 0.95rem;
        color: var(--dark-gray);
        line-height: 1.6;
        text-align: center;
    }

    /* ================== ANIMATIONS ================== */
    @keyframes floating {
        0%, 100% { transform: translateY(0px); }
        50% { transform: translateY(-15px); }
    }

    .fade-in-up {
        opacity: 0;
        transform: translateY(50px);
        transition: all 0.8s ease;
    }

    .fade-in-up.visible {
        opacity: 1;
        transform: translateY(0);
    }

    .fade-in-left {
        opacity: 0;
        transform: translateX(-50px);
        transition: all 0.8s ease;
    }

    .fade-in-left.visible {
        opacity: 1;
        transform: translateX(0);
    }

    .fade-in-right {
        opacity: 0;
        transform: translateX(50px);
        transition: all 0.8s ease;
    }

    .fade-in-right.visible {
        opacity: 1;
        transform: translateX(0);
    }

    /* ================== RESPONSIVE ================== */
    @media (max-width: 991px) {
        .about-hero {
            height: 50vh;
        }

        .about-hero h1 {
            font-size: 2.8rem;
        }

        .about-hero .hero-icon {
            font-size: 3rem;
        }

        .about-text {
            padding-left: 0;
            margin-top: 3rem;
        }

        .about-text h2 {
            font-size: 2.2rem;
        }

        .team-grid {
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
        }

        .section-title {
            font-size: 2.2rem;
        }
    }

    @media (max-width: 768px) {
        .about-hero {
            height: 45vh;
        }

        .about-hero h1 {
            font-size: 2.2rem;
        }

        .about-hero-description {
            font-size: 1.1rem;
            padding: 0 1rem;
        }

        .about-content-section {
            padding: 80px 0;
        }

        .team-section {
            padding: 80px 0;
        }

        .about-text h2 {
            font-size: 1.9rem;
        }

        .about-description {
            font-size: 1rem;
        }

        .about-stats {
            grid-template-columns: repeat(2, 1fr);
            gap: 1.5rem;
        }

        .section-title {
            font-size: 1.9rem;
        }

        .team-grid {
            grid-template-columns: 1fr;
            gap: 1.5rem;
        }

        .team-image {
            height: 250px;
        }
    }

    @media (max-width: 480px) {
        .about-hero h1 {
            font-size: 1.9rem;
        }

        .about-hero .hero-icon {
            font-size: 2.5rem;
        }

        .about-text h2 {
            font-size: 1.6rem;
        }

        .section-title {
            font-size: 1.6rem;
        }

        .team-info {
            padding: 1.5rem;
        }

        .team-name {
            font-size: 1.2rem;
        }

        .about-stats {
            grid-template-columns: 1fr;
        }
    }
</style>

<!-- Hero Section -->
<section class="about-hero">
    <div class="container">
        <div class="about-hero-content">
            <div class="hero-icon">
                <i class="fas fa-users"></i>
            </div>
            <h1>À propos de SCI SAGES</h1>
            <div class="about-hero-description">
                Découvrez notre histoire, nos valeurs et l'équipe passionnée qui donne vie à vos projets immobiliers de rêve.
            </div>
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
                        <i class="fas fa-home me-2"></i>Accueil
                    </a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    À propos
                </li>
            </ol>
        </nav>
    </div>
</section>

<!-- Section Contenu À propos -->
<section class="about-content-section">
    <div class="container">
        <div class="about-content">
            @if($apropos)
                <div class="row align-items-center">
                    <div class="col-lg-6 fade-in-left">
                        <div class="about-image">
                            @if($apropos->getFirstMediaUrl('image'))
                                <img src="{{ $apropos->getFirstMediaUrl('image') }}" alt="À propos de SCI SAGES" loading="lazy">
                            @else
                                <img src="https://via.placeholder.com/600x400/cccccc/000000?text=Image+Non+Disponible" alt="À propos de SCI SAGES" loading="lazy">
                            @endif
                            <div class="about-image-overlay"></div>
                        </div>
                    </div>
                    <div class="col-lg-6 fade-in-right">
                        <div class="about-text">
                            <div class="section-subtitle">Notre Histoire</div>
                            <h2>SCI SAGES</h2>
                            <div class="about-description">
                                {!! nl2br(e($apropos->description)) !!}
                            </div>
                            
                            <!-- Statistiques -->
                            <div class="about-stats">
                                <div class="about-stat fade-in-up">
                                    <span class="about-stat-number" data-target="150">0</span>
                                    <span class="about-stat-label">Projets Réalisés</span>
                                </div>
                                <div class="about-stat fade-in-up">
                                    <span class="about-stat-number" data-target="10">0</span>
                                    <span class="about-stat-label">Années d'Expérience</span>
                                </div>
                                <div class="about-stat fade-in-up">
                                    <span class="about-stat-number" data-target="500">0</span>
                                    <span class="about-stat-label">Clients Satisfaits</span>
                                </div>
                                <div class="about-stat fade-in-up">
                                    <span class="about-stat-number" data-target="25">0</span>
                                    <span class="about-stat-label">Collaborateurs</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <div class="row justify-content-center">
                    <div class="col-lg-8 text-center">
                        <i class="fas fa-info-circle fa-3x text-muted mb-3"></i>
                        <h3>Contenu à venir</h3>
                        <p class="text-muted">Les informations à propos seront bientôt disponibles.</p>
                    </div>
                </div>
            @endif
        </div>
    </div>
</section>

<!-- Section Équipe -->
{{-- <section class="team-section">
    <div class="container">
        <div class="section-header fade-in-up">
            <div class="section-subtitle">Notre Équipe</div>
            <h2 class="section-title">Des Professionnels à Votre Service</h2>
            <p class="section-description">
                Rencontrez notre équipe de professionnels passionnés et expérimentés, 
                dédiés à la réussite de vos projets immobiliers.
            </p>
        </div>

        @if($equipes && $equipes->count() > 0)
            <div class="team-grid">
                @foreach($equipes as $index => $membre)
                    <div class="team-card fade-in-up" style="animation-delay: {{ $index * 0.1 }}s">
                        <div class="team-image">
                            @if($membre->getFirstMediaUrl('photo'))
                                <img src="{{ $membre->getFirstMediaUrl('photo') }}" alt="{{ $membre->prenoms }} {{ $membre->nom }}" loading="lazy">
                            @else
                                <img src="https://via.placeholder.com/300x300/cccccc/000000?text={{ urlencode($membre->prenoms . ' ' . $membre->nom) }}" alt="{{ $membre->prenoms }} {{ $membre->nom }}" loading="lazy">
                            @endif
                            
                            <div class="team-overlay">
                                <div class="team-social">
                                    <a href="#" class="social-link" title="LinkedIn">
                                        <i class="fab fa-linkedin-in"></i>
                                    </a>
                                    <a href="#" class="social-link" title="Twitter">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                    <a href="#" class="social-link" title="Email">
                                        <i class="fas fa-envelope"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        
                        <div class="team-info">
                            <h3 class="team-name">{{ $membre->prenoms }} {{ $membre->nom }}</h3>
                            <p class="team-position">{{ $membre->fonction }}</p>
                            @if($membre->description)
                                <p class="team-description">{{ $membre->description }}</p>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center">
                    <i class="fas fa-users fa-3x text-muted mb-3"></i>
                    <h3>Équipe à venir</h3>
                    <p class="text-muted">Les profils de notre équipe seront bientôt disponibles.</p>
                </div>
            </div>
        @endif
    </div>
</section> --}}

<script>

</script>

@endsection