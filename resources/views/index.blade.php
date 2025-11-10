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
        @include('frontend.sections.banniere')

        <!-- Section Statistiques -->
        @include('frontend.sections.statistique')

        <!-- Section Présentation -->
       @include('frontend.sections.presentation')

        <!-- Section Chronogramme -->
       @include('frontend.sections.projets')

        <!-- Section FAQ -->
        @include('frontend.sections.faq')

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
