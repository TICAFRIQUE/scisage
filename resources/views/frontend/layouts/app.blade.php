<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="SCI SAGES - Promoteur immobilier spécialisé dans la vente et la construction de maisons modernes de rêve.">
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('favicon/site.webmanifest') }}">
    <title>SCI SAGES - Promoteur Immobilier - Maisons de Rêve</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- AOS CSS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

        @stack('styles')

    <style>
        :root {
            --primary-gold: #D4AF37;
            --secondary-gold: #FFD700;
            --dark-brown: #3C2415;
            --light-brown: #8B4513;
            --white: #FFFFFF;
            --light-gray: #F8F9FA;
            --dark-gray: #6C757D;
            --gradient-gold: linear-gradient(135deg, #D4AF37 0%, #FFD700 100%);
            --gradient-brown: linear-gradient(135deg, #3C2415 0%, #8B4513 100%);
            --shadow-light: 0 5px 15px rgba(0, 0, 0, 0.1);
            --shadow-medium: 0 10px 30px rgba(0, 0, 0, 0.15);
            --shadow-heavy: 0 20px 40px rgba(0, 0, 0, 0.2);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            color: var(--dark-brown);
            line-height: 1.6;
            overflow-x: hidden;
            margin: 0;
            padding: 0;
        }

         /* ================== CORRECTIONS RESPONSIVE MOBILE ================== */
        /* Forcer le viewport à respecter la largeur mobile */
        html {
            overflow-x: hidden;
        }

        /* body {
            overflow-x: hidden;
            width: 100%;
            max-width: 100vw;
        } */


        p {
            margin-bottom: 0.5rem !important;
        }

        .section-padding {
            padding: 100px 0;
        }

        /* ================== LOADER ================== */
        #loader {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: var(--gradient-brown);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 9999;
            transition: opacity 0.8s ease-out;
        }

        .loader-content {
            text-align: center;
            color: var(--white);
        }

        .loader-logo {
            font-size: 4rem;
            font-weight: 800;
            color: var(--secondary-gold);
            margin-bottom: 1rem;
            animation: logoScale 1.5s ease-in-out infinite alternate;
        }

        .loader-tagline {
            font-size: 1.2rem;
            font-weight: 300;
            letter-spacing: 2px;
            text-transform: uppercase;
            margin-bottom: 2rem;
            animation: fadeInUp 0.8s ease-out 0.3s both;
        }

        .loader-spinner {
            width: 60px;
            height: 60px;
            border: 3px solid rgba(255, 255, 255, 0.3);
            border-top: 3px solid var(--primary-gold);
            border-radius: 50%;
            animation: spin 1s linear infinite;
            margin: 0 auto;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        @keyframes logoScale {
            from {
                transform: scale(1);
            }

            to {
                transform: scale(1.05);
            }
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        body.loading {
            overflow: hidden;
        }

        .main-content {
            opacity: 0;
            transition: opacity 0.6s ease-in;
        }

        .main-content.loaded {
            opacity: 1;
        }

        #loader.hide {
            opacity: 0;
            pointer-events: none;
        }

        /* ================== HEADER ================== */
        .navbar {
            background: rgba(60, 36, 21, 0.95);
            backdrop-filter: blur(15px);
            padding: 0.5rem 1rem; /* Réduire le padding du menu */
            transition: all 0.4s ease;
            border-bottom: 1px solid rgba(212, 175, 55, 0.2);
        }

        .navbar-brand {
            font-weight: 800;
            font-size: 2rem;
            color: var(--secondary-gold);
            text-decoration: none;
        }

        .navbar-nav .nav-link {
            color: var(--white);
            font-weight: 500;
            margin: 0 1rem;
            transition: all 0.3s ease;
            position: relative;
            text-transform: uppercase;
            font-size: 0.9rem;
            letter-spacing: 0.5px;
        }

        .navbar-nav .nav-link::before {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: -5px;
            left: 50%;
            background: var(--primary-gold);
            transition: all 0.3s ease;
            transform: translateX(-50%);
        }

        .navbar-nav .nav-link:hover {
            color: var(--primary-gold);
        }

        .navbar-nav .nav-link:hover::before {
            width: 100%;
        }

        .btn-request {
            background: var(--gradient-gold);
            border: none;
            color: var(--dark-brown);
            padding: 0.8rem 2rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            border-radius: 50px;
            transition: all 0.4s ease;
            text-decoration: none;
            display: inline-block;
        }

        .btn-request:hover {
            transform: translateY(-3px);
            box-shadow: var(--shadow-medium);
            color: var(--dark-brown);
        }


        /* ================== DROPDOWN MENU ================== */
        .navbar-nav .dropdown-menu {
            background: rgba(60, 36, 21, 0.98);
            backdrop-filter: blur(15px);
            border: 1px solid rgba(212, 175, 55, 0.3);
            border-radius: 15px;
            padding: 1rem;
            margin-top: 0.5rem;
            box-shadow: var(--shadow-medium);
            min-width: 250px;
        }

        .navbar-nav .dropdown-item {
            color: var(--white);
            padding: 0.8rem 1.2rem;
            border-radius: 10px;
            transition: all 0.3s ease;
            font-weight: 500;
            display: flex;
            align-items: center;
            text-transform: uppercase;
            font-size: 0.85rem;
            letter-spacing: 0.5px;
        }

        .navbar-nav .dropdown-item:hover {
            background: var(--gradient-gold);
            color: var(--dark-brown);
            transform: translateX(5px);
        }

        .navbar-nav .dropdown-item i {
            color: var(--primary-gold);
            width: 20px;
            transition: all 0.3s ease;
        }

        .navbar-nav .dropdown-item:hover i {
            color: var(--dark-brown);
            transform: scale(1.2);
        }

        .dropdown-divider {
            border-color: rgba(212, 175, 55, 0.3);
            margin: 0.8rem 0;
        }

        /* Style pour le lien dropdown toggle */
        .navbar-nav .dropdown-toggle::after {
            border-top: 0.4em solid;
            border-right: 0.3em solid transparent;
            border-bottom: 0;
            border-left: 0.3em solid transparent;
            margin-left: 0.5rem;
            transition: transform 0.3s ease;
        }

        .navbar-nav .dropdown-toggle[aria-expanded="true"]::after {
            transform: rotate(180deg);
        }

        .navbar-nav .dropdown-toggle:hover {
            color: var(--primary-gold);
        }

        /* Animation d'apparition du menu */
        .dropdown-menu {
            opacity: 0;
            transform: translateY(-10px);
            transition: all 0.3s ease;
            display: block !important;
            visibility: hidden;
        }

        .dropdown-menu.show {
            opacity: 1;
            transform: translateY(0);
            visibility: visible;
        }

        /* ================== HERO SECTION ================== */


        /* ================== STATISTICS SECTION ================== */

        /* ================== PRESENTATION SECTION ================== */


        /* ================== CHRONOGRAMME SECTION ================== */


        /* ================== FAQ SECTION ================== */


        /* ================== CONTACT SECTION ================== */
         .btn-primary-custom {
            background: linear-gradient(135deg, var(--primary-gold), var(--secondary-gold));
            border: none;
            color: var(--dark-brown);
            padding: 1rem 2.5rem;
            font-size: 1.1rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            border-radius: 30px;
            cursor: pointer;
            transition: all 0.4s ease;
            box-shadow: 0 8px 25px rgba(212, 175, 55, 0.4);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            width: 100%;
            margin-top: 1rem;
            position: relative;
            overflow: hidden;
        }

        .btn-primary-custom::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, var(--white), rgba(255, 255, 255, 0.9));
            transition: left 0.4s ease;
            z-index: -1;
        }

        .btn-primary-custom:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 35px rgba(212, 175, 55, 0.6);
            color: var(--primary-gold);
        }

        .btn-primary-custom:hover::before {
            left: 0;
        }

        .btn-primary-custom:active {
            transform: translateY(-1px);
        }

        .btn-primary-custom i {
            font-size: 1rem;
            transition: transform 0.3s ease;
        }

        .btn-primary-custom:hover i {
            transform: translateX(3px);
        }

       
        /* ================== FOOTER ================== */
        .footer {
            background: var(--dark-brown);
            color: var(--white);
            padding: 80px 0 40px;
        }

        .footer-logo {
            font-size: 2.5rem;
            font-weight: 800;
            color: var(--secondary-gold);
            margin-bottom: 1rem;
        }

        .footer-description {
            font-size: 1.1rem;
            line-height: 1.8;
            color: #ccc;
            margin-bottom: 2rem;
        }

        .social-icons {
            display: flex;
            gap: 1rem;
        }

        .social-icon {
            width: 50px;
            height: 50px;
            background: var(--gradient-gold);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--dark-brown);
            font-size: 1.2rem;
            transition: all 0.4s ease;
            text-decoration: none;
        }

        .social-icon:hover {
            transform: translateY(-5px) scale(1.1);
            box-shadow: var(--shadow-medium);
        }

        .footer-section h5 {
            font-size: 1.2rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
            color: var(--secondary-gold);
        }

        .footer-links {
            list-style: none;
            padding: 0;
        }

        .footer-links li {
            margin-bottom: 0.8rem;
        }

        .footer-links a {
            color: #ccc;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .footer-links a:hover {
            color: var(--primary-gold);
        }

        .footer-bottom {
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            padding-top: 2rem;
            margin-top: 3rem;
            text-align: center;
            color: #888;
        }

        /* ================== RESPONSIVE ================== */
        @media (max-width: 768px) {
            .hero-section h1 {
                font-size: 2rem; /* Réduire la taille du texte */
            }

            .navbar-brand img {
                width: 50px; /* Réduire la taille du logo */
            }

            .navbar-nav .nav-link {
                font-size: 0.85rem; /* Réduire la taille des liens */
                margin: 0.5rem 0; /* Espacement vertical */
            }

            .section-title {
                font-size: 1.8rem; /* Réduire les titres */
            }

            .footer-logo {
                font-size: 2rem; /* Réduire la taille du logo dans le footer */
            }

            .footer-description {
                font-size: 1rem; /* Réduire la taille du texte */
            }

            .footer-links a {
                font-size: 0.9rem; /* Réduire la taille des liens */
            }

            .contact-item {
                flex-direction: column; /* Aligner les éléments verticalement */
                text-align: center;
            }

            .contact-icon {
                margin: 0 auto 1rem auto; /* Centrer l'icône */
            }
        }

        /* Fix for grids on small screens */
        @media (max-width: 576px) {
            .values-grid,
            .portfolio-grid {
                grid-template-columns: 1fr; /* Une seule colonne sur les petits écrans */
            }

            .portfolio-card {
                margin-bottom: 1rem; /* Ajouter un espacement entre les cartes */
            }
        }

        /* ================== INFORMATIONS DE CONTACT ================== */
        .contact-info {
            padding: 2rem 0;
        }

        .contact-item {
            display: flex;
            align-items: flex-start;
            margin-bottom: 3rem;
            padding: 1.5rem;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(15px);
            border-radius: 20px;
            border: 1px solid rgba(212, 175, 55, 0.2);
            transition: all 0.3s ease;
        }

        .contact-item:hover {
            transform: translateY(-5px);
            background: rgba(255, 255, 255, 0.15);
            border-color: rgba(212, 175, 55, 0.4);
        }

        .contact-icon {
            width: 60px;
            height: 60px;
            background: var(--gradient-gold);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 1.5rem;
            flex-shrink: 0;
            box-shadow: 0 8px 20px rgba(212, 175, 55, 0.3);
        }

        .contact-icon i {
            font-size: 1.4rem;
            color: var(--dark-brown);
        }

        .contact-details h5 {
            color: var(--secondary-gold);
            font-weight: 700;
            font-size: 1.2rem;
            margin-bottom: 0.5rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .contact-details p {
            color: var(--white);
            margin: 0;
            line-height: 1.6;
            font-weight: 400;
        }

        /* Section title pour contact */
        .contact-section .section-title {
            color: var(--white);
            margin-bottom: 3rem;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
        }

        .contact-section .section-subtitle {
            color: var(--secondary-gold);
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 2px;
            font-size: 1rem;
            margin-bottom: 1rem;
            text-align: center;
        }

        /* ================== RESPONSIVE CONTACT INFO ================== */
        @media (max-width: 991px) {
            .contact-info {
                margin-top: 3rem;
                padding: 1.5rem 0;
            }

            .contact-item {
                margin-bottom: 2rem;
                padding: 1.2rem;
            }

            .contact-icon {
                width: 50px;
                height: 50px;
                margin-right: 1rem;
            }

            .contact-icon i {
                font-size: 1.2rem;
            }

            .contact-details h5 {
                font-size: 1.1rem;
            }
        }

        @media (max-width: 768px) {
            .contact-info {
                margin-top: 2rem;
            }

            .contact-item {
                margin-bottom: 1.5rem;
                padding: 1rem;
                border-radius: 15px;
            }

            .contact-icon {
                width: 45px;
                height: 45px;
                margin-right: 1rem;
            }

            .contact-icon i {
                font-size: 1.1rem;
            }

            .contact-details h5 {
                font-size: 1rem;
                margin-bottom: 0.3rem;
            }

            .contact-details p {
                font-size: 0.9rem;
                line-height: 1.5;
            }
        }

        @media (max-width: 480px) {
            .contact-item {
                flex-direction: column;
                text-align: center;
                padding: 1.2rem;
            }

            .contact-icon {
                margin: 0 auto 1rem auto;
                width: 50px;
                height: 50px;
            }

            .contact-details h5 {
                font-size: 1.1rem;
                margin-bottom: 0.5rem;
            }

            .contact-details p {
                font-size: 0.95rem;
            }
        }

        /* ================== ANIMATIONS ================== */
        .fade-in-up {
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.6s ease;
        }

        .fade-in-up.visible {
            opacity: 1;
            transform: translateY(0);
        }

        .floating {
            animation: floating 3s ease-in-out infinite;
        }

        @keyframes floating {

            0%,
            100% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-10px);
            }
        }

        /* Forcer les images et grilles à s'adapter */
        img {
            max-width: 100%;
            height: auto;
        }

        .row {
            margin-left: 0;
            margin-right: 0;
        }

        /* ================== CORRECTION DROPDOWN MOBILE UNIQUEMENT ================== */
        @media (max-width: 991px) {
            .navbar {
                padding: 0.5rem 1rem;
            }
            
            .navbar-brand img {
                width: 50px;
                height: auto;
            }
            
            .navbar-toggler {
                border: none;
                padding: 0.25rem 0.5rem;
                font-size: 1.1rem;
                color: var(--white);
            }
            
            .navbar-toggler:focus {
                box-shadow: none;
            }
            
            .navbar-collapse {
                margin-top: 1rem;
            }
            
            .navbar-nav .nav-link {
                padding: 0.8rem 1rem;
                margin: 0;
                border-bottom: 1px solid rgba(255, 255, 255, 0.1);
                text-align: center;
            }
            
            .navbar-nav .nav-link::before {
                display: none; /* Supprimer l'underline sur mobile */
            }
            
            /* DROPDOWN MENU MOBILE - CORRECTION */
            .navbar-nav .dropdown-menu {
                position: static !important;
                float: none !important;
                width: 100% !important;
                margin-top: 0 !important;
                background: rgba(40, 25, 15, 0.95) !important;
                border: none !important;
                border-radius: 0 !important;
                box-shadow: none !important;
                padding: 0 !important;
                transform: none !important;
                backdrop-filter: none !important;
                min-width: auto !important;
                
                /* Masquer par défaut */
                display: none !important;
                opacity: 0 !important;
                visibility: hidden !important;
            }
            
            /* Quand le dropdown est ouvert */
            .navbar-nav .dropdown-menu.show {
                display: block !important;
                opacity: 1 !important;
                visibility: visible !important;
            }
            
            .navbar-nav .dropdown-item {
                padding: 1rem 1.5rem;
                border-bottom: 1px solid rgba(255, 255, 255, 0.1);
                text-align: center;
                background: transparent;
                color: var(--white);
                transition: all 0.3s ease;
                margin: 0;
                border-radius: 0;
                display: block;
                width: 100%;
            }
            
            .navbar-nav .dropdown-item:hover {
                background: rgba(212, 175, 55, 0.2) !important;
                color: var(--primary-gold) !important;
                transform: none !important;
            }
            
            .navbar-nav .dropdown-item:last-child {
                border-bottom: none;
            }
            
            .navbar-nav .dropdown-item i {
                color: var(--primary-gold);
                width: 20px;
                margin-right: 10px;
                text-align: center;
            }
            
            .navbar-nav .dropdown-item:hover i {
                color: var(--dark-brown);
            }
            
            .dropdown-divider {
                display: none;
            }
            
            /* Style pour la flèche du dropdown sur mobile */
            .navbar-nav .dropdown-toggle::after {
                transition: transform 0.3s ease;
            }
            
            .navbar-nav .dropdown-toggle[aria-expanded="true"]::after {
                transform: rotate(180deg);
            }
        }

        @media (max-width: 576px) {
            .navbar-nav .dropdown-item {
                padding: 0.8rem 1rem;
                font-size: 0.9rem;
            }
            
            .navbar-nav .dropdown-item i {
                margin-right: 8px;
            }
        }

        /* ================== LIENS ACTIFS ================== */
.navbar-nav .nav-link.active {
    color: var(--primary-gold) !important;
    font-weight: 600;
}

.navbar-nav .nav-link.active::before {
    width: 100% !important;
    background: var(--secondary-gold);
}

/* Pour les dropdowns actifs */
.navbar-nav .dropdown-toggle.active {
    color: var(--primary-gold) !important;
    font-weight: 600;
}

.navbar-nav .dropdown-toggle.active::before {
    width: 100% !important;
    background: var(--secondary-gold);
}

.navbar-nav .dropdown-item.active {
    background: var(--gradient-gold) !important;
    color: var(--dark-brown) !important;
    transform: translateX(5px);
}

/* Mobile responsive pour les liens actifs */
@media (max-width: 991px) {
    .navbar-nav .nav-link.active {
        background: rgba(212, 175, 55, 0.2);
        border-left: 3px solid var(--primary-gold);
    }
    
    .navbar-nav .dropdown-item.active {
        background: rgba(212, 175, 55, 0.3) !important;
        border-left: 3px solid var(--secondary-gold);
    }
}
    </style>
</head>

<body class="loading">
    <!-- Loader -->
    <div id="loader">
        <div class="loader-content">
            <div class="loader-logo">
                <img src="{{ $parametre?->getFirstMediaUrl('logo_header') ?? URL::asset('images/logo.png') }}"
                        alt="SCI SAGES" width="100">
            </div>
            <div class="loader-tagline">Votre maison de rêve vous attend</div>
            <div class="loader-spinner"></div>
        </div>
    </div>

    <!-- Contenu principal -->
    <div class="main-content">
        <!-- Header -->
        <!-- Header -->
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
            <div class="container">
                <a class="navbar-brand" href="{{ route('page.accueil') }}">
                    <img src="{{ $parametre?->getFirstMediaUrl('logo_header') ?? URL::asset('images/logo.png') }}"
                        alt="SCI SAGES" width="70">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('page.accueil') ? 'active' : '' }}" 
                               href="{{ route('page.accueil') }}">Accueil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('page.apropos') ? 'active' : '' }}" 
                               href="{{ route('page.apropos') }}">Présentation</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle {{ request()->routeIs('page.activites*') ? 'active' : '' }}" 
                               href="#" id="activitesDropdown" role="button"
                               data-bs-toggle="dropdown" aria-expanded="false">
                                Activités
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="activitesDropdown">
                                @foreach ($activites as $activite)
                                    <li><a class="dropdown-item {{ request()->routeIs('page.activites') && request()->route('slug') == $activite->slug ? 'active' : '' }}" 
                                           href="{{ route('page.activites', $activite->slug) }}">
                                            <i class="{{ $activite->icone }} me-2"></i>{{ $activite->libelle }}
                                        </a></li>
                                @endforeach
                            </ul>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle {{ request()->routeIs('page.portfolios*') ? 'active' : '' }}" 
                               href="#" id="portfolioDropdown" role="button"
                               data-bs-toggle="dropdown" aria-expanded="false">
                                Portfolio
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="portfolioDropdown">
                                <li><a class="dropdown-item {{ request()->routeIs('page.portfolios') && request()->get('categorie') == 'realisations' ? 'active' : '' }}" 
                                       href="{{ route('page.portfolios', ['categorie' => 'realisations']) }}">
                                    <i class="fas fa-home me-2"></i>Réalisations
                                </a></li>
                                <li><a class="dropdown-item {{ request()->routeIs('page.portfolios') && request()->get('categorie') == 'conceptions' ? 'active' : '' }}" 
                                       href="{{ route('page.portfolios', ['categorie' => 'conceptions']) }}">
                                    <i class="fas fa-drafting-compass me-2"></i>Conceptions
                                </a></li>
                                <li><a class="dropdown-item {{ request()->routeIs('page.portfolios') && request()->get('categorie') == 'projets' ? 'active' : '' }}" 
                                       href="{{ route('page.portfolios', ['categorie' => 'projets']) }}">
                                    <i class="fas fa-building me-2"></i>Projets
                                </a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item {{ request()->routeIs('page.portfolios') && request()->get('categorie') == 'tous' ? 'active' : '' }}" 
                                       href="{{ route('page.portfolios', ['categorie' => 'tous']) }}">
                                    <i class="fas fa-th-large me-2"></i>Tout voir
                                </a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('page.actualites*') ? 'active' : '' }}" 
                               href="#actualites">Actualités</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('page.contact*') || request()->is('*contact*') ? 'active' : '' }}" 
                               href="{{ url('/#contact') }}">Contact</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>



        <!--yield content-->
        @yield('content')


        <!-- Section Contact -->
       


        @include('frontend.components.boutton_flottant')

        <!-- Footer -->
        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 mb-4">
                        <div class="footer-logo">SCI SAGES</div>
                        <p class="footer-description">Promoteur immobilier de confiance, nous réalisons vos rêves
                            immobiliers avec passion et expertise.</p>
                        <div class="social-icons">
                            <a href="#" class="social-icon"><i class="fab fa-facebook-f"></i></a>
                            <a href="#" class="social-icon"><i class="fab fa-instagram"></i></a>
                            <a href="#" class="social-icon"><i class="fab fa-linkedin-in"></i></a>
                            <a href="#" class="social-icon"><i class="fab fa-twitter"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-2 col-md-6 mb-4">
                        <div class="footer-section">
                            <h5>Services</h5>
                            <ul class="footer-links">
                                @foreach ($activites as $item)
                                    <li><a href="#projets">{{ $item->libelle }}</a></li>
                                @endforeach
                             
                                <li><a href="#contact">Conseil immobilier</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-2 col-md-6 mb-4">
                        <div class="footer-section">
                            <h5>Entreprise</h5>
                            <ul class="footer-links">
                                <li><a href="#presentation">À propos</a></li>
                                <li><a href="#valeurs">Nos valeurs</a></li>
                                <li><a href="#projets">Nos projets</a></li>
                                <li><a href="#form-projet">Démarrer votre projet</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-4 mb-4">
                        <div class="footer-section">
                            <h5>Newsletter</h5>
                            <p>Restez informé de nos derniers projets et actualités</p>
                            <form class="newsletter-form">
                                <div class="input-group">
                                    <input type="email" class="form-control" placeholder="Votre email">
                                    <button type="submit" class="btn-primary-custom">S'abonner</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="footer-bottom">
                    <p>&copy; 2025 SCI SAGES. Tous droits réservés. | <a href="#" style="color: #ccc;">Mentions
                            légales</a> | <a href="#" style="color: #ccc;">Politique de confidentialité</a></p>
                </div>
            </div>
        </footer>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    @stack('scripts')

    <script>
        // Loader
        (function() {
            document.body.classList.add('loading');

            let loaderTimer = setTimeout(function() {
                hideLoader();
            }, 2000);

            window.addEventListener('load', function() {
                clearTimeout(loaderTimer);
                hideLoader();
            });

            function hideLoader() {
                const loader = document.getElementById('loader');
                const mainContent = document.querySelector('.main-content');

                if (loader) {
                    loader.classList.add('hide');
                    document.body.classList.remove('loading');

                    if (mainContent) {
                        mainContent.classList.add('loaded');
                    }

                    setTimeout(function() {
                        loader.style.display = 'none';
                    }, 800);
                }
            }
        })();

        // Initialize AOS
        AOS.init({
            duration: 500,
            once: true,
            offset: 100
        });

        // Navbar scroll effect
        window.addEventListener('scroll', function() {
            const navbar = document.querySelector('.navbar');
            if (window.scrollY > 100) {
                navbar.style.background = 'rgba(60, 36, 21, 0.98)';
                navbar.style.padding = '0.8rem 0';
            } else {
                navbar.style.background = 'rgba(60, 36, 21, 0.95)';
                navbar.style.padding = '1rem 0';
            }
        });

        // Smooth scrolling
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

       

        // Form submissions
        document.getElementById('heroForm').addEventListener('submit', function(e) {
            e.preventDefault();
            alert('Merci pour votre demande ! Nous vous contacterons très prochainement.');
        });

        document.getElementById('contactForm').addEventListener('submit', function(e) {
            e.preventDefault();
            alert('Votre message a été envoyé avec succès ! Nous vous répondrons dans les plus brefs délais.');
        });

        // Fade in animation
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver(function(entries) {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                }
            });
        }, observerOptions);

        document.querySelectorAll('.fade-in-up').forEach(el => {
            observer.observe(el);
        });

        // Mobile menu close
        // document.querySelectorAll('.navbar-nav .nav-link').forEach(link => {
        //     link.addEventListener('click', () => {
        //         const navbarCollapse = document.querySelector('.navbar-collapse');
        //         if (navbarCollapse.classList.contains('show')) {
        //             const bsCollapse = new bootstrap.Collapse(navbarCollapse, {
        //                 toggle: false
        //             });
        //             bsCollapse.hide();
        //         }
        //     });
        // });


    </script>
</body>

</html>
