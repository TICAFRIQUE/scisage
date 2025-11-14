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
        }

        p {
            margin-bottom: 0.5rem;
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
            padding: 1rem 0;
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

        /* Responsive pour mobile */
        @media (max-width: 991px) {
            .navbar-nav .dropdown-menu {
                position: static;
                float: none;
                width: 100%;
                margin-top: 0;
                background: rgba(60, 36, 21, 0.9);
                border: none;
                border-radius: 0;
                box-shadow: none;
                padding: 0;
            }

            .navbar-nav .dropdown-item {
                padding: 1rem 1.5rem;
                border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            }

            .navbar-nav .dropdown-item:last-child {
                border-bottom: none;
            }

            .dropdown-divider {
                display: none;
            }
        }

        /* ================== HERO SECTION ================== */


        /* ================== STATISTICS SECTION ================== */

        /* ================== PRESENTATION SECTION ================== */


        /* ================== CHRONOGRAMME SECTION ================== */


        /* ================== FAQ SECTION ================== */


        /* ================== CONTACT SECTION ================== */
        .contact-section {
            background: var(--gradient-brown);
            color: var(--white);
            padding: 120px 0;
        }

        .contact-form {
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(20px);
            border-radius: 25px;
            padding: 3rem;
            border: 2px solid rgba(212, 175, 55, 0.3);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2);
            position: relative;
            overflow: hidden;
        }

        .contact-form::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg,
                    rgba(212, 175, 55, 0.1) 0%,
                    rgba(255, 255, 255, 0.05) 50%,
                    rgba(212, 175, 55, 0.1) 100%);
            pointer-events: none;
            z-index: 0;
        }

        .contact-form>* {
            position: relative;
            z-index: 1;
        }

        .contact-form .form-control {
            background: rgba(255, 255, 255, 0.9);
            border: 2px solid rgba(212, 175, 55, 0.3);
            border-radius: 15px;
            padding: 1rem 1.5rem;
            font-size: 1rem;
            font-weight: 500;
            color: var(--dark-brown);
            margin-bottom: 1.5rem;
            transition: all 0.3s ease;
            backdrop-filter: blur(10px);
        }

        .contact-form .form-control::placeholder {
            color: rgba(60, 36, 21, 0.6);
            font-weight: 400;
        }

        .contact-form .form-control:focus {
            background: rgba(255, 255, 255, 1);
            border-color: var(--primary-gold);
            box-shadow: 0 0 0 4px rgba(212, 175, 55, 0.2);
            outline: none;
            transform: translateY(-2px);
        }

        .contact-form .row {
            margin-bottom: 0;
        }

        .contact-form .row .col-md-6 {
            padding-left: 0.75rem;
            padding-right: 0.75rem;
        }

        .contact-form textarea.form-control {
            min-height: 120px;
            resize: vertical;
            font-family: inherit;
        }

        .contact-form select.form-control {
            cursor: pointer;
        }

        .contact-form select.form-control option {
            background: var(--white);
            color: var(--dark-brown);
            padding: 0.5rem;
        }

        /* Bouton d'envoi personnalisé */
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

        /* Icônes dans les champs */
        .form-group-with-icon {
            position: relative;
        }

        .form-group-with-icon .form-control {
            padding-left: 3rem;
        }

        .form-group-with-icon .field-icon {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: var(--primary-gold);
            font-size: 1.1rem;
            z-index: 10;
        }

        /* Validation states */
        .form-control.is-valid {
            border-color: #28a745;
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 8 8'%3e%3cpath fill='%2328a745' d='m2.3 6.73.5-.4 3.5-3.6L6 2.4 2.8 5.6l-.8-.8-.4.4L2.3 6.73z'/%3e%3c/svg%3e");
            background-repeat: no-repeat;
            background-position: right calc(0.375em + 0.1875rem) center;
            background-size: calc(0.75em + 0.375rem) calc(0.75em + 0.375rem);
        }

        .form-control.is-invalid {
            border-color: #dc3545;
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 12 12' width='12' height='12' fill='none' stroke='%23dc3545'%3e%3ccircle cx='6' cy='6' r='4.5'/%3e%3cpath d='m5.8 4.6 1.4 1.4M6.2 7.4l1.4-1.4'/%3e%3c/svg%3e");
            background-repeat: no-repeat;
            background-position: right calc(0.375em + 0.1875rem) center;
            background-size: calc(0.75em + 0.375rem) calc(0.75em + 0.375rem);
        }

        /* ================== RESPONSIVE CONTACT FORM ================== */
        @media (max-width: 991px) {
            .contact-form {
                padding: 2.5rem;
                margin-top: 2rem;
            }
        }

        @media (max-width: 768px) {
            .contact-form {
                padding: 2rem;
                border-radius: 20px;
            }

            .contact-form .row .col-md-6 {
                padding-left: 0;
                padding-right: 0;
            }

            .contact-form .form-control {
                padding: 0.9rem 1.2rem;
                font-size: 0.95rem;
            }

            .btn-primary-custom {
                padding: 0.9rem 2rem;
                font-size: 1rem;
            }
        }

        @media (max-width: 480px) {
            .contact-form {
                padding: 1.5rem;
                margin: 1rem;
                border-radius: 15px;
            }

            .contact-form .form-control {
                padding: 0.8rem 1rem;
                font-size: 0.9rem;
                margin-bottom: 1rem;
            }

            .btn-primary-custom {
                padding: 0.8rem 1.5rem;
                font-size: 0.95rem;
            }
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
                font-size: 2.5rem;
            }

            .hero-central-text {
                font-size: 1.8rem;
            }

            .hero-options {
                flex-direction: column;
                align-items: center;
            }

            .hero-option {
                min-width: 280px;
            }

            .presentation-content {
                grid-template-columns: 1fr;
                gap: 2rem;
            }

            .chronogram-container {
                grid-template-columns: 1fr;
                gap: 3rem;
            }

            .section-title {
                font-size: 2.2rem;
            }

            .values-grid {
                grid-template-columns: 1fr;
            }

            .timeline-item:hover {
                transform: none;
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
    </style>
</head>

<body class="loading">
    <!-- Loader -->
    <div id="loader">
        <div class="loader-content">
            <div class="loader-logo">SCI SAGES</div>
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
                <a class="navbar-brand" href="#accueil">
                    <!-- Logo Image -->
                    <img src="{{ $parametre?->getFirstMediaUrl('logo_header') ?? URL::asset('images/logo.png') }}"
                        alt="SCI SAGES" width="70">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="#accueil">Accueil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('page.apropos')}}">Présentation</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="portfolioDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Activités
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="portfolioDropdown">
                                @foreach ($activites as $activite)
                                    <li><a class="dropdown-item" href="{{route('page.activites', $activite->slug)}}">
                                            <i class="{{ $activite->icone }} me-2"></i>{{ $activite->libelle }}
                                        </a></li>
                                @endforeach
                            </ul>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="portfolioDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Portfolio
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="portfolioDropdown">
                                <li><a class="dropdown-item" href="{{ route('page.portfolios', ['categorie' => 'realisations']) }}">
                                        <i class="fas fa-home me-2"></i>Réalisations
                                    </a></li>
                                <li><a class="dropdown-item" href="{{ route('page.portfolios', ['categorie' => 'conceptions']) }}">
                                        <i class="fas fa-drafting-compass me-2"></i>Conceptions
                                    </a></li>
                                <li><a class="dropdown-item" href="{{ route('page.portfolios', ['categorie' => 'projets']) }}">
                                        <i class="fas fa-building me-2"></i>Projets
                                    </a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="{{ route('page.portfolios' ,  ['categorie' => 'tous']) }}">
                                        <i class="fas fa-th-large me-2"></i>Tout voir
                                    </a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#valeurs">Actualités</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#contact">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a class="btn-request" href="#form-projet">Démarrer votre projet</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>



        <!--yield content-->
        @yield('content')


        <!-- Section Contact -->
        <section id="contact" class="contact-section">
            <div class="container">
                <div class="section-subtitle" data-aos="fade-up">Contactez-nous</div>
                <h2 class="section-title" style="color: white;" data-aos="fade-up" data-aos-delay="100">Avez-vous
                    des questions ?</h2>

                <div class="row">
                    <div class="col-lg-6" data-aos="fade-right" data-aos-delay="200">
                        <div class="contact-info">
                            <div class="contact-item">
                                <div class="contact-icon">
                                    <i class="fas fa-map-marker-alt"></i>
                                </div>
                                <div class="contact-details">
                                    <h5>Adresse</h5>
                                    <p>Abidjan, Cocody Angré 8ème Tranche<br>Rue des Jardins, Villa 123</p>
                                </div>
                            </div>
                            <div class="contact-item">
                                <div class="contact-icon">
                                    <i class="fas fa-phone"></i>
                                </div>
                                <div class="contact-details">
                                    <h5>Téléphone</h5>
                                    <p>+225 27 22 45 67 89<br>+225 07 08 09 10 11</p>
                                </div>
                            </div>
                            <div class="contact-item">
                                <div class="contact-icon">
                                    <i class="fas fa-envelope"></i>
                                </div>
                                <div class="contact-details">
                                    <h5>Email</h5>
                                    <p>contact@scisages.ci<br>info@scisages.ci</p>
                                </div>
                            </div>
                            <div class="contact-item">
                                <div class="contact-icon">
                                    <i class="fas fa-clock"></i>
                                </div>
                                <div class="contact-details">
                                    <h5>Horaires</h5>
                                    <p>Lun - Ven: 8h00 - 18h00<br>Sam: 9h00 - 16h00</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6" data-aos="fade-left" data-aos-delay="300">
                        <div class="contact-form">
                            <form id="contactForm">
                                <div class="row">
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" placeholder="Votre nom" required>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="email" class="form-control" placeholder="Votre email"
                                            required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <input type="tel" class="form-control" placeholder="Votre téléphone"
                                            required>
                                    </div>
                                    <div class="col-md-6">
                                        <select class="form-control" required>
                                            <option value="">Sujet</option>
                                            <option value="achat">Achat de maison</option>
                                            <option value="construction">Construction sur mesure</option>
                                            <option value="info">Demande d'information</option>
                                            <option value="autre">Autre</option>
                                        </select>
                                    </div>
                                </div>
                                <textarea class="form-control" rows="5" placeholder="Votre message" required></textarea>
                                <button type="submit" class="btn-primary-custom">
                                    <i class="fas fa-paper-plane"></i> Envoyer le message
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>


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
            duration: 1000,
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

        // FAQ Toggle
        document.querySelectorAll('.faq-question').forEach(question => {
            question.addEventListener('click', function() {
                const faqItem = this.parentNode;
                const answer = faqItem.querySelector('.faq-answer');
                const icon = this.querySelector('.faq-icon');

                // Fermer toutes les autres FAQ
                document.querySelectorAll('.faq-item').forEach(item => {
                    if (item !== faqItem) {
                        item.classList.remove('active');
                        item.querySelector('.faq-answer').classList.remove('active');
                    }
                });

                // Toggle la FAQ actuelle
                faqItem.classList.toggle('active');
                answer.classList.toggle('active');
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
        document.querySelectorAll('.navbar-nav .nav-link').forEach(link => {
            link.addEventListener('click', () => {
                const navbarCollapse = document.querySelector('.navbar-collapse');
                if (navbarCollapse.classList.contains('show')) {
                    const bsCollapse = new bootstrap.Collapse(navbarCollapse, {
                        toggle: false
                    });
                    bsCollapse.hide();
                }
            });
        });

        // Animation des chiffres des statistiques
        function animateStats() {
            const statNumbers = document.querySelectorAll('.stat-number');

            statNumbers.forEach(stat => {
                const target = parseInt(stat.getAttribute('data-target'));
                const increment = target / 100;
                let current = 0;

                stat.classList.add('animated');

                const timer = setInterval(() => {
                    current += increment;
                    if (current >= target) {
                        current = target;
                        clearInterval(timer);
                    }
                    stat.textContent = Math.floor(current);
                }, 20);
            });
        }

        // Observer pour les statistiques
        const statsObserver = new IntersectionObserver(function(entries) {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    animateStats();
                    statsObserver.unobserve(entry.target);
                }
            });
        }, {
            threshold: 0.5
        });

        // Observer la section des statistiques
        const statsSection = document.querySelector('.statistics-section');
        if (statsSection) {
            statsObserver.observe(statsSection);
        }
    </script>
</body>

</html>
