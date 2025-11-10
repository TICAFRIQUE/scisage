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

        /* ================== HERO SECTION ================== */
        .hero-section {
            background: linear-gradient(rgba(60, 36, 21, 0.7), rgba(139, 69, 19, 0.5)),
                url('https://images.unsplash.com/photo-1560518883-ce09059eeffa?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1973&q=80');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            color: var(--white);
            padding: 200px 0 150px;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .hero-content {
            position: relative;
            z-index: 2;
        }

        .hero-section h1 {
            font-size: 4rem;
            font-weight: 800;
            margin-bottom: 2rem;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
            line-height: 1.2;
        }

        .hero-options {
            display: flex;
            justify-content: center;
            gap: 2rem;
            margin: 3rem 0;
            flex-wrap: wrap;
        }

        .hero-option {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(15px);
            border: 2px solid var(--primary-gold);
            border-radius: 20px;
            padding: 2rem;
            text-align: center;
            min-width: 300px;
            transition: all 0.4s ease;
        }

        .hero-option:hover {
            transform: translateY(-10px);
            background: rgba(212, 175, 55, 0.2);
        }

        .hero-option h3 {
            color: var(--secondary-gold);
            font-weight: 700;
            margin-bottom: 1rem;
            font-size: 1.3rem;
        }

        .hero-central-text {
            font-size: 2.5rem;
            font-weight: 700;
            margin: 4rem 0 3rem;
            color: var(--secondary-gold);
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        }

        .hero-form {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 20px;
            padding: 3rem;
            max-width: 600px;
            margin: 0 auto;
            box-shadow: var(--shadow-heavy);
            color: var(--dark-brown);
        }

        .form-control {
            border: 2px solid #ddd;
            border-radius: 10px;
            padding: 1rem;
            margin-bottom: 1.5rem;
            font-size: 1rem;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: var(--primary-gold);
            box-shadow: 0 0 0 0.2rem rgba(212, 175, 55, 0.25);
        }

        .btn-primary-custom {
            background: var(--gradient-gold);
            border: none;
            color: var(--dark-brown);
            padding: 1rem 3rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            border-radius: 50px;
            transition: all 0.4s ease;
            width: 100%;
        }

        .btn-primary-custom:hover {
            transform: translateY(-3px);
            box-shadow: var(--shadow-medium);
        }

        /* ================== STATISTICS SECTION ================== */
        .statistics-section {
            background: var(--gradient-brown);
            color: var(--white);
            padding: 80px 0;
            position: relative;
            overflow: hidden;
        }

        .statistics-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grain" width="100" height="100" patternUnits="userSpaceOnUse"><circle cx="20" cy="20" r="1" fill="%23FFD700" opacity="0.1"/><circle cx="80" cy="40" r="1.5" fill="%23D4AF37" opacity="0.1"/><circle cx="40" cy="70" r="1" fill="%23FFD700" opacity="0.1"/><circle cx="90" cy="90" r="1.5" fill="%23D4AF37" opacity="0.1"/><circle cx="10" cy="60" r="1" fill="%23FFD700" opacity="0.1"/></pattern></defs><rect width="100" height="100" fill="url(%23grain)"/></svg>') repeat;
            z-index: 1;
        }

        .statistics-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 3rem;
            position: relative;
            z-index: 2;
        }

        .stat-item {
            text-align: center;
            padding: 2.5rem 1.5rem;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(15px);
            border-radius: 20px;
            border: 2px solid rgba(212, 175, 55, 0.3);
            transition: all 0.4s ease;
            position: relative;
            overflow: hidden;
        }

        .stat-item::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 215, 0, 0.2), transparent);
            transition: left 0.6s ease;
        }

        .stat-item:hover::before {
            left: 100%;
        }

        .stat-item:hover {
            transform: translateY(-10px) scale(1.05);
            border-color: var(--primary-gold);
            background: rgba(255, 255, 255, 0.15);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
        }

        .stat-icon {
            width: 80px;
            height: 80px;
            background: var(--gradient-gold);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.5rem;
            font-size: 2.5rem;
            color: var(--dark-brown);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
            transition: all 0.4s ease;
            position: relative;
            z-index: 2;
        }

        .stat-item:hover .stat-icon {
            transform: scale(1.1) rotate(360deg);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.4);
        }

        .stat-number {
            font-size: 3.5rem;
            font-weight: 900;
            color: var(--secondary-gold);
            line-height: 1;
            margin-bottom: 1rem;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
            position: relative;
            z-index: 2;
        }

        .stat-label {
            font-size: 1.1rem;
            font-weight: 600;
            color: var(--white);
            text-transform: uppercase;
            letter-spacing: 1px;
            line-height: 1.4;
            position: relative;
            z-index: 2;
        }

        /* Animation des icônes */
        .stat-icon.animated {
            animation: iconBounce 0.8s cubic-bezier(0.68, -0.55, 0.265, 1.55) forwards;
        }

        @keyframes iconBounce {
            0% {
                transform: scale(0) rotate(-180deg);
                opacity: 0;
            }

            50% {
                transform: scale(1.2) rotate(10deg);
            }

            100% {
                transform: scale(1) rotate(0deg);
                opacity: 1;
            }
        }

        /* Animation des chiffres */
        .stat-number.animated {
            animation: numberPop 0.8s cubic-bezier(0.68, -0.55, 0.265, 1.55) forwards;
        }

        @keyframes numberPop {
            0% {
                transform: scale(0.3) rotate(-10deg);
                opacity: 0;
            }

            50% {
                transform: scale(1.1) rotate(2deg);
            }

            100% {
                transform: scale(1) rotate(0deg);
                opacity: 1;
            }
        }

        /* Responsive pour les statistiques */
        @media (max-width: 768px) {
            .statistics-container {
                grid-template-columns: 1fr;
                gap: 2rem;
            }

            .stat-number {
                font-size: 3rem;
            }

            .stat-icon {
                width: 70px;
                height: 70px;
                font-size: 2rem;
            }

            .stat-item {
                padding: 2rem 1rem;
            }

            .stat-item:hover {
                transform: translateY(-5px) scale(1.02);
            }
        }

        /* ================== PRESENTATION SECTION ================== */
        .presentation-section {
            background: var(--light-gray);
            padding: 120px 0;
        }

        .section-title {
            font-size: 3rem;
            font-weight: 800;
            text-align: center;
            margin-bottom: 3rem;
            color: var(--dark-brown);
        }

        .section-subtitle {
            color: var(--primary-gold);
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 2px;
            font-size: 1rem;
            margin-bottom: 1rem;
            text-align: center;
        }

        .presentation-content {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 4rem;
            align-items: center;
            margin-bottom: 5rem;
        }

        .presentation-text {
            font-size: 1.1rem;
            line-height: 1.8;
            color: var(--dark-gray);
        }

        .presentation-image {
            border-radius: 20px;
            overflow: hidden;
            box-shadow: var(--shadow-medium);
        }

        .presentation-image img {
            width: 100%;
            height: 400px;
            object-fit: cover;
        }

        .director-section {
            background: var(--white);
            border-radius: 20px;
            padding: 3rem;
            margin: 3rem 0;
            box-shadow: var(--shadow-light);
            text-align: center;
        }

        .director-photo {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
            margin: 0 auto 2rem;
            border: 4px solid var(--primary-gold);
        }

        .director-quote {
            font-size: 1.3rem;
            font-style: italic;
            color: var(--dark-brown);
            margin-bottom: 1rem;
        }

        .director-name {
            font-weight: 700;
            color: var(--primary-gold);
            font-size: 1.1rem;
        }

        .values-section {
            margin-top: 5rem;
        }

        .values-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
            margin-top: 3rem;
        }

        .value-card {
            background: var(--white);
            border-radius: 20px;
            padding: 3rem 2rem;
            text-align: center;
            box-shadow: var(--shadow-light);
            transition: all 0.4s ease;
        }

        .value-card:hover {
            transform: translateY(-10px);
            box-shadow: var(--shadow-medium);
        }

        .value-icon {
            width: 80px;
            height: 80px;
            background: var(--gradient-gold);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 2rem;
            font-size: 2rem;
            color: var(--dark-brown);
        }

        .value-title {
            font-size: 1.3rem;
            font-weight: 700;
            margin-bottom: 1rem;
            color: var(--dark-brown);
        }

        .value-description {
            color: var(--dark-gray);
            line-height: 1.6;
        }

        /* ================== CHRONOGRAMME SECTION ================== */
        .chronogram-section {
            background: var(--white);
            padding: 120px 0;
        }

        .chronogram-container {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 4rem;
            margin-top: 4rem;
        }

        .chronogram-column {
            position: relative;
        }

        .chronogram-title {
            font-size: 2rem;
            font-weight: 700;
            text-align: center;
            margin-bottom: 3rem;
            color: var(--dark-brown);
            padding: 1.5rem;
            background: var(--gradient-gold);
            border-radius: 15px;
            color: var(--white);
        }

        .timeline {
            position: relative;
            padding-left: 2rem;
        }

        .timeline::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            bottom: 0;
            width: 4px;
            background: var(--gradient-gold);
            border-radius: 2px;
        }

        .timeline-item {
            position: relative;
            margin-bottom: 3rem;
            background: var(--light-gray);
            border-radius: 15px;
            padding: 2rem;
            box-shadow: var(--shadow-light);
            transition: all 0.4s ease;
        }

        .timeline-item:hover {
            transform: translateX(10px);
            box-shadow: var(--shadow-medium);
        }

        .timeline-item::before {
            content: '';
            position: absolute;
            left: -2.5rem;
            top: 2rem;
            width: 20px;
            height: 20px;
            background: var(--primary-gold);
            border-radius: 50%;
            border: 4px solid var(--white);
            box-shadow: 0 0 0 3px var(--primary-gold);
        }

        .timeline-step {
            background: var(--primary-gold);
            color: var(--white);
            font-weight: 700;
            padding: 0.5rem 1rem;
            border-radius: 20px;
            display: inline-block;
            margin-bottom: 1rem;
            font-size: 0.9rem;
        }

        .timeline-title {
            font-size: 1.2rem;
            font-weight: 700;
            color: var(--dark-brown);
            margin-bottom: 0.5rem;
        }

        .timeline-description {
            color: var(--dark-gray);
            line-height: 1.6;
        }

        /* ================== FAQ SECTION ================== */
        .faq-section {
            background: var(--light-gray);
            padding: 120px 0;
        }

        .faq-container {
            max-width: 800px;
            margin: 0 auto;
        }

        .faq-item {
            background: var(--white);
            border-radius: 15px;
            margin-bottom: 1.5rem;
            box-shadow: var(--shadow-light);
            overflow: hidden;
            transition: all 0.4s ease;
        }

        .faq-item:hover {
            box-shadow: var(--shadow-medium);
        }

        .faq-question {
            padding: 2rem;
            background: var(--gradient-gold);
            color: var(--white);
            cursor: pointer;
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-weight: 600;
            font-size: 1.1rem;
            transition: all 0.3s ease;
        }

        .faq-question:hover {
            background: var(--gradient-brown);
        }

        .faq-answer {
            padding: 2rem;
            display: none;
            color: var(--dark-gray);
            line-height: 1.7;
        }

        .faq-answer.active {
            display: block;
            animation: fadeInDown 0.3s ease;
        }

        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .faq-icon {
            transition: transform 0.3s ease;
        }

        .faq-item.active .faq-icon {
            transform: rotate(180deg);
        }

        /* ================== CONTACT SECTION ================== */
        .contact-section {
            background: var(--gradient-brown);
            color: var(--white);
            padding: 120px 0;
        }

        .contact-form {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(15px);
            border-radius: 20px;
            padding: 3rem;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .contact-info {
            padding: 3rem 0;
        }

        .contact-item {
            display: flex;
            align-items: center;
            margin-bottom: 2rem;
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
            font-size: 1.5rem;
            color: var(--dark-brown);
        }

        .contact-details h5 {
            font-weight: 700;
            margin-bottom: 0.5rem;
            color: var(--secondary-gold);
        }

        .contact-details p {
            margin: 0;
            color: var(--white);
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
                            <a class="nav-link" href="#presentation">Présentation</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#projets">Nos projets</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#valeurs">Nos valeurs</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#faq">FAQ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#contact">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a class="btn-request" href="#contact">Soumettre votre demande</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Section Bannière Principale -->
        <section id="accueil" class="hero-section">
            <div class="container">
                <div class="hero-content" data-aos="fade-up">
                    <!-- Encadrés côte à côte -->
                    <div class="hero-options">
                        <div class="hero-option" data-aos="fade-right" data-aos-delay="200">
                            <h3><i class="fas fa-home"></i> Souscrire à nos maisons de rêves</h3>
                            <p>Découvrez notre sélection de maisons modernes prêtes à vous accueillir</p>
                        </div>
                        <div class="hero-option" data-aos="fade-left" data-aos-delay="400">
                            <h3><i class="fas fa-hammer"></i> Faites construire votre maison de rêve</h3>
                            <p>Concevons ensemble la maison qui vous ressemble</p>
                        </div>
                    </div>

                    <!-- Texte central -->
                    <h1 class="hero-central-text" data-aos="zoom-in" data-aos-delay="600">
                        Démarrez votre projet avec SCI SAGES dès aujourd'hui
                    </h1>

                    <!-- Formulaire simplifié -->
                    <div class="hero-form" data-aos="fade-up" data-aos-delay="800">
                        <form id="heroForm">
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="text" class="form-control" placeholder="Votre nom" required>
                                </div>
                                <div class="col-md-6">
                                    <input type="tel" class="form-control" placeholder="Votre téléphone"
                                        required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="email" class="form-control" placeholder="Votre email" required>
                                </div>
                                <div class="col-md-6">
                                    <select class="form-control" required>
                                        <option value="">Choisir le service</option>
                                        <option value="acheter">Acheter</option>
                                        <option value="construire">Faire construire</option>
                                    </select>
                                </div>
                            </div>
                            <button type="submit" class="btn-primary-custom">
                                <i class="fas fa-rocket"></i> Démarrer mon projet
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </section>

        <!-- Section Statistiques -->
        <section class="statistics-section">
            <div class="container">
                <div class="statistics-container" data-aos="fade-up">
                    <div class="stat-item" data-aos="zoom-in" data-aos-delay="100">
                        <div class="stat-icon">
                            <i class="fas fa-home"></i>
                        </div>
                        <div class="stat-number" data-target="43">0</div>
                        <div class="stat-label">Maisons construites</div>
                    </div>
                    <div class="stat-item" data-aos="zoom-in" data-aos-delay="200">
                        <div class="stat-icon">
                            <i class="fas fa-map"></i>
                        </div>
                        <div class="stat-number" data-target="8">0</div>
                        <div class="stat-label">Hectares de constructions</div>
                    </div>
                    <div class="stat-item" data-aos="zoom-in" data-aos-delay="300">
                        <div class="stat-icon">
                            <i class="fas fa-calendar-alt"></i>
                        </div>
                        <div class="stat-number" data-target="2014">0</div>
                        <div class="stat-label">Entreprise depuis</div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Section Présentation -->
        <section id="presentation" class="presentation-section">
            <div class="container">
                <div class="section-subtitle" data-aos="fade-up">À propos de nous</div>
                <h2 class="section-title" data-aos="fade-up" data-aos-delay="100">Qui sommes-nous ?</h2>

                <div class="presentation-content" data-aos="fade-up" data-aos-delay="200">
                    <div class="presentation-text">
                        <p>SCI SAGES est un promoteur immobilier de référence, spécialisé dans la vente et la
                            construction de maisons modernes. Depuis notre création, nous nous engageons à transformer
                            vos rêves immobiliers en réalité.</p>
                        <p>Notre expertise couvre tous les aspects de l'immobilier résidentiel : de la conception
                            architecturale à la livraison clés en main, en passant par l'accompagnement personnalisé de
                            nos clients tout au long de leur parcours.</p>
                        <p>Avec une équipe de professionnels passionnés et expérimentés, nous garantissons la qualité,
                            l'innovation et le respect des délais sur chacun de nos projets.</p>
                    </div>
                    <div class="presentation-image">
                        <img src="https://images.unsplash.com/photo-1541888946425-d81bb19240f5?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80"
                            alt="Chantier SCI SAGES" />
                    </div>
                </div>

                <!-- Mot du Directeur Général -->
                <div class="director-section" data-aos="fade-up" data-aos-delay="400">
                    <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=687&q=80"
                        alt="Directeur Général" class="director-photo" />
                    <p class="director-quote">"Notre mission est de construire plus que des maisons : nous bâtissons
                        les fondations de vos futurs souvenirs."</p>
                    <p class="director-name">- Jean-Baptiste KOUASSI, Directeur Général</p>
                </div>

                <!-- Nos valeurs -->
                <div class="values-section" id="valeurs" data-aos="fade-up" data-aos-delay="600">
                    <div class="section-subtitle">Nos engagements</div>
                    <h3 class="section-title">Nos valeurs et engagements</h3>
                    <div class="values-grid">
                        <div class="value-card" data-aos="zoom-in" data-aos-delay="100">
                            <div class="value-icon">
                                <i class="fas fa-handshake"></i>
                            </div>
                            <h4 class="value-title">Confiance</h4>
                            <p class="value-description">Nous bâtissons des relations durables basées sur la
                                transparence et l'honnêteté avec chacun de nos clients.</p>
                        </div>
                        <div class="value-card" data-aos="zoom-in" data-aos-delay="200">
                            <div class="value-icon">
                                <i class="fas fa-award"></i>
                            </div>
                            <h4 class="value-title">Qualité</h4>
                            <p class="value-description">Nous sélectionnons les meilleurs matériaux et travaillons avec
                                des artisans qualifiés pour garantir l'excellence.</p>
                        </div>
                        <div class="value-card" data-aos="zoom-in" data-aos-delay="300">
                            <div class="value-icon">
                                <i class="fas fa-lightbulb"></i>
                            </div>
                            <h4 class="value-title">Innovation</h4>
                            <p class="value-description">Nous intégrons les dernières technologies et tendances
                                architecturales dans nos conceptions.</p>
                        </div>
                        <div class="value-card" data-aos="zoom-in" data-aos-delay="400">
                            <div class="value-icon">
                                <i class="fas fa-smile"></i>
                            </div>
                            <h4 class="value-title">Satisfaction client</h4>
                            <p class="value-description">Votre satisfaction est notre priorité absolue. Nous vous
                                accompagnons jusqu'à la remise des clés et au-delà.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Section Chronogramme -->
        <section id="projets" class="chronogram-section">
            <div class="container">
                <div class="section-subtitle" data-aos="fade-up">Notre processus</div>
                <h2 class="section-title" data-aos="fade-up" data-aos-delay="100">Votre projet en 4 étapes</h2>

                <div class="chronogram-container">
                    <!-- Colonne gauche : Souscrire -->
                    <div class="chronogram-column" data-aos="fade-right" data-aos-delay="200">
                        <h3 class="chronogram-title">Souscrire à nos maisons de rêves</h3>
                        <div class="timeline">
                            <div class="timeline-item" data-aos="fade-up" data-aos-delay="300">
                                <div class="timeline-step">Étape 1</div>
                                <h4 class="timeline-title">Visiter et faire son choix</h4>
                                <p class="timeline-description">Découvrez notre catalogue de maisons disponibles et
                                    visitez celles qui vous intéressent. Nos conseillers vous accompagnent pour trouver
                                    la maison parfaite.</p>
                            </div>
                            <div class="timeline-item" data-aos="fade-up" data-aos-delay="400">
                                <div class="timeline-step">Étape 2</div>
                                <h4 class="timeline-title">Faire sa réservation</h4>
                                <p class="timeline-description">Réservez votre maison coup de cœur avec un acompte.
                                    Nous vous accompagnons dans toutes les démarches administratives et financières.</p>
                            </div>
                            <div class="timeline-item" data-aos="fade-up" data-aos-delay="500">
                                <div class="timeline-step">Étape 3</div>
                                <h4 class="timeline-title">Suivre l'évolution des travaux</h4>
                                <p class="timeline-description">Restez informé de l'avancement de votre maison grâce à
                                    notre suivi personnalisé et nos rapports d'étape réguliers.</p>
                            </div>
                            <div class="timeline-item" data-aos="fade-up" data-aos-delay="600">
                                <div class="timeline-step">Étape 4</div>
                                <h4 class="timeline-title">Profiter de votre espace</h4>
                                <p class="timeline-description">Recevez vos clés et emménagez dans votre nouvelle
                                    maison. Notre service après-vente reste à votre disposition.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Colonne droite : Faire construire -->
                    <div class="chronogram-column" data-aos="fade-left" data-aos-delay="200">
                        <h3 class="chronogram-title">Faire construire votre maison de rêve</h3>
                        <div class="timeline">
                            <div class="timeline-item" data-aos="fade-up" data-aos-delay="300">
                                <div class="timeline-step">Étape 1</div>
                                <h4 class="timeline-title">Étude et validation du projet</h4>
                                <p class="timeline-description">Rencontrez nos architectes pour définir vos besoins,
                                    votre budget et valider la faisabilité de votre projet sur votre terrain.</p>
                            </div>
                            <div class="timeline-item" data-aos="fade-up" data-aos-delay="400">
                                <div class="timeline-step">Étape 2</div>
                                <h4 class="timeline-title">Élaboration du plan d'exécution</h4>
                                <p class="timeline-description">Conception détaillée des plans, choix des matériaux et
                                    finitions. Validation du planning et signature du contrat de construction.</p>
                            </div>
                            <div class="timeline-item" data-aos="fade-up" data-aos-delay="500">
                                <div class="timeline-step">Étape 3</div>
                                <h4 class="timeline-title">Suivre l'évolution des travaux</h4>
                                <p class="timeline-description">Construction de votre maison avec un suivi
                                    hebdomadaire. Vous êtes informé de chaque étape importante du chantier.</p>
                            </div>
                            <div class="timeline-item" data-aos="fade-up" data-aos-delay="600">
                                <div class="timeline-step">Étape 4</div>
                                <h4 class="timeline-title">Profiter de votre espace</h4>
                                <p class="timeline-description">Réception de votre maison personnalisée et remise des
                                    clés. Garantie décennale et service après-vente inclus.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Section FAQ -->
        <section id="faq" class="faq-section">
            <div class="container">
                <div class="section-subtitle" data-aos="fade-up">Questions fréquentes</div>
                <h2 class="section-title" data-aos="fade-up" data-aos-delay="100">FAQ</h2>

                <div class="faq-container">
                    <div class="faq-item" data-aos="fade-up" data-aos-delay="200">
                        <div class="faq-question">
                            <span>Quels sont les délais de construction ?</span>
                            <i class="fas fa-chevron-down faq-icon"></i>
                        </div>
                        <div class="faq-answer">
                            <p>Les délais varient selon la complexité du projet. En moyenne, comptez 8 à 12 mois pour
                                une construction sur mesure et 6 à 8 mois pour nos maisons en catalogue. Nous nous
                                engageons sur un planning précis dès la signature du contrat.</p>
                        </div>
                    </div>

                    <div class="faq-item" data-aos="fade-up" data-aos-delay="300">
                        <div class="faq-question">
                            <span>Proposez-vous des solutions de financement ?</span>
                            <i class="fas fa-chevron-down faq-icon"></i>
                        </div>
                        <div class="faq-answer">
                            <p>Oui, nous travaillons avec plusieurs partenaires bancaires pour vous proposer les
                                meilleures solutions de financement adaptées à votre profil. Notre équipe vous
                                accompagne dans toutes vos démarches.</p>
                        </div>
                    </div>

                    <div class="faq-item" data-aos="fade-up" data-aos-delay="400">
                        <div class="faq-question">
                            <span>Quelles garanties offrez-vous ?</span>
                            <i class="fas fa-chevron-down faq-icon"></i>
                        </div>
                        <div class="faq-answer">
                            <p>Toutes nos constructions bénéficient de la garantie décennale, de la garantie biennale de
                                bon fonctionnement et de la garantie de parfait achèvement. Nous sommes également
                                assurés pour la garantie financière d'achèvement.</p>
                        </div>
                    </div>

                    <div class="faq-item" data-aos="fade-up" data-aos-delay="500">
                        <div class="faq-question">
                            <span>Puis-je personnaliser ma maison ?</span>
                            <i class="fas fa-chevron-down faq-icon"></i>
                        </div>
                        <div class="faq-answer">
                            <p>Absolument ! Que vous choisissiez une maison de notre catalogue ou une construction sur
                                mesure, de nombreuses options de personnalisation sont possibles : finitions,
                                aménagements, équipements, etc.</p>
                        </div>
                    </div>

                    <div class="faq-item" data-aos="fade-up" data-aos-delay="600">
                        <div class="faq-question">
                            <span>Intervenez-vous sur toute la Côte d'Ivoire ?</span>
                            <i class="fas fa-chevron-down faq-icon"></i>
                        </div>
                        <div class="faq-answer">
                            <p>Nous intervenons principalement sur Abidjan et ses environs, ainsi que dans les
                                principales villes de Côte d'Ivoire. N'hésitez pas à nous contacter pour vérifier si
                                votre zone est couverte.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Section Contact -->
        <section id="contact" class="contact-section">
            <div class="container">
                <div class="section-subtitle" data-aos="fade-up">Contactez-nous</div>
                <h2 class="section-title" style="color: white;" data-aos="fade-up" data-aos-delay="100">Parlons de
                    votre projet</h2>

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
                                <li><a href="#projets">Vente de maisons</a></li>
                                <li><a href="#projets">Construction sur mesure</a></li>
                                <li><a href="#projets">Rénovation</a></li>
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
                                <li><a href="#contact">Carrières</a></li>
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
