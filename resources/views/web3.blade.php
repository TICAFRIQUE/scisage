<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SCI SAGES - Promoteur Immobilier</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --gold-light: #D4AF37;
            --gold-dark: #B8860B;
            --brown-dark: #3C2A1E;
            --brown-light: #5D4037;
            --white: #FFFFFF;
            --gray-light: #F5F5F5;
            --gray-medium: #E0E0E0;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            line-height: 1.6;
            color: #333;
            background-color: var(--white);
        }

        /* Header */
        header {
            background-color: var(--white);
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
        }

        .header-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem 5%;
            max-width: 1400px;
            margin: 0 auto;
        }

        .logo {
            display: flex;
            align-items: center;
        }

        .logo-text {
            font-size: 1.8rem;
            font-weight: 700;
            background: linear-gradient(to right, var(--gold-light), var(--gold-dark));
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }

        .logo-dot {
            width: 10px;
            height: 10px;
            background: linear-gradient(135deg, var(--gold-light), var(--gold-dark));
            border-radius: 50%;
            margin-left: 5px;
        }

        nav ul {
            display: flex;
            list-style: none;
        }

        nav ul li {
            margin-left: 2rem;
        }

        nav ul li a {
            text-decoration: none;
            color: var(--brown-dark);
            font-weight: 500;
            transition: color 0.3s;
        }

        nav ul li a:hover {
            color: var(--gold-dark);
        }

        .cta-button {
            background: linear-gradient(135deg, var(--gold-light), var(--gold-dark));
            color: var(--white);
            border: none;
            padding: 0.8rem 1.5rem;
            border-radius: 30px;
            font-weight: 600;
            cursor: pointer;
            transition: transform 0.3s, box-shadow 0.3s;
            text-decoration: none;
            display: inline-block;
        }

        .cta-button:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(212, 175, 55, 0.4);
        }

        .mobile-menu {
            display: none;
            font-size: 1.5rem;
            cursor: pointer;
        }

        /* Hero Section */
        .hero {
            height: 100vh;
            background: linear-gradient(rgba(60, 42, 30, 0.7), rgba(60, 42, 30, 0.7)), url('https://images.unsplash.com/photo-1560518883-ce09059eeffa?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1473&q=80');
            background-size: cover;
            background-position: center;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: var(--white);
            padding: 0 5%;
            margin-top: 70px;
        }

        .hero-content {
            max-width: 900px;
        }

        .hero h1 {
            font-size: 3rem;
            margin-bottom: 1.5rem;
            font-weight: 700;
        }

        .hero p {
            font-size: 1.2rem;
            margin-bottom: 2rem;
        }

        .hero-buttons {
            display: flex;
            justify-content: center;
            gap: 1.5rem;
            margin-bottom: 2.5rem;
        }

        .hero-button {
            background: rgba(255, 255, 255, 0.2);
            color: var(--white);
            border: 2px solid var(--white);
            padding: 0.8rem 1.8rem;
            border-radius: 30px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            text-decoration: none;
        }

        .hero-button:hover {
            background: var(--white);
            color: var(--brown-dark);
        }

        .hero-form {
            background: rgba(255, 255, 255, 0.9);
            padding: 2rem;
            border-radius: 10px;
            max-width: 600px;
            margin: 0 auto;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
        }

        .form-group {
            margin-bottom: 1rem;
            text-align: left;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            color: var(--brown-dark);
            font-weight: 500;
        }

        .form-group input, .form-group select {
            width: 100%;
            padding: 0.8rem;
            border: 1px solid var(--gray-medium);
            border-radius: 5px;
            font-family: 'Poppins', sans-serif;
        }

        .form-row {
            display: flex;
            gap: 1rem;
        }

        /* Section Styles */
        section {
            padding: 5rem 5%;
            max-width: 1400px;
            margin: 0 auto;
        }

        .section-title {
            text-align: center;
            margin-bottom: 3rem;
        }

        .section-title h2 {
            font-size: 2.5rem;
            color: var(--brown-dark);
            margin-bottom: 1rem;
            position: relative;
            display: inline-block;
        }

        .section-title h2::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 4px;
            background: linear-gradient(to right, var(--gold-light), var(--gold-dark));
            border-radius: 2px;
        }

        /* About Section */
        .about-content {
            display: flex;
            align-items: center;
            gap: 3rem;
            margin-bottom: 4rem;
        }

        .about-text {
            flex: 1;
        }

        .about-text h3 {
            font-size: 1.8rem;
            color: var(--brown-dark);
            margin-bottom: 1.5rem;
        }

        .about-text p {
            margin-bottom: 1.5rem;
            color: #555;
        }

        .about-image {
            flex: 1;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .about-image img {
            width: 100%;
            height: auto;
            display: block;
            transition: transform 0.5s;
        }

        .about-image:hover img {
            transform: scale(1.05);
        }

        .director-section {
            display: flex;
            align-items: center;
            gap: 2rem;
            background: var(--gray-light);
            padding: 2rem;
            border-radius: 10px;
            margin-bottom: 4rem;
        }

        .director-portrait {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            overflow: hidden;
            border: 5px solid var(--white);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .director-portrait img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .director-quote {
            flex: 1;
        }

        .director-quote blockquote {
            font-size: 1.2rem;
            font-style: italic;
            color: var(--brown-dark);
            margin-bottom: 1rem;
            position: relative;
            padding-left: 2rem;
        }

        .director-quote blockquote::before {
            content: '"';
            font-size: 4rem;
            position: absolute;
            left: -1rem;
            top: -1rem;
            color: var(--gold-light);
            opacity: 0.3;
        }

        .director-quote p {
            font-weight: 600;
            color: var(--brown-light);
        }

        .values-section {
            text-align: center;
        }

        .values-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
        }

        .value-item {
            padding: 2rem 1rem;
            border-radius: 10px;
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .value-item:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }

        .value-icon {
            width: 80px;
            height: 80px;
            margin: 0 auto 1.5rem;
            background: linear-gradient(135deg, var(--gold-light), var(--gold-dark));
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--white);
            font-size: 2rem;
        }

        .value-item h3 {
            font-size: 1.5rem;
            color: var(--brown-dark);
            margin-bottom: 1rem;
        }

        .value-item p {
            color: #555;
        }

        /* Timeline Section */
        .timeline-section {
            background: var(--gray-light);
            padding: 5rem 5%;
        }

        .timeline-container {
            display: flex;
            gap: 3rem;
            position: relative;
        }

        .timeline-container::before {
            content: '';
            position: absolute;
            top: 0;
            bottom: 0;
            left: 50%;
            width: 4px;
            background: linear-gradient(to bottom, var(--gold-light), var(--gold-dark));
            transform: translateX(-50%);
        }

        .timeline-column {
            flex: 1;
        }

        .timeline-title {
            text-align: center;
            margin-bottom: 2rem;
            padding: 1rem;
            background: var(--white);
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        }

        .timeline-title h3 {
            font-size: 1.5rem;
            color: var(--brown-dark);
        }

        .timeline-item {
            background: var(--white);
            padding: 1.5rem;
            border-radius: 10px;
            margin-bottom: 2rem;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            position: relative;
            transition: transform 0.3s;
        }

        .timeline-item:hover {
            transform: translateY(-5px);
        }

        .timeline-item::before {
            content: '';
            position: absolute;
            top: 50%;
            width: 20px;
            height: 20px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--gold-light), var(--gold-dark));
        }

        .timeline-left .timeline-item::before {
            right: -40px;
        }

        .timeline-right .timeline-item::before {
            left: -40px;
        }

        .timeline-item h4 {
            font-size: 1.2rem;
            color: var(--brown-dark);
            margin-bottom: 0.5rem;
        }

        .timeline-item p {
            color: #555;
        }

        /* Footer */
        footer {
            background: var(--brown-dark);
            color: var(--white);
            padding: 4rem 5% 2rem;
        }

        .footer-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
            max-width: 1400px;
            margin: 0 auto;
        }

        .footer-column h3 {
            font-size: 1.5rem;
            margin-bottom: 1.5rem;
            position: relative;
            padding-bottom: 0.5rem;
        }

        .footer-column h3::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 50px;
            height: 3px;
            background: linear-gradient(to right, var(--gold-light), var(--gold-dark));
        }

        .footer-column p, .footer-column a {
            color: var(--gray-medium);
            margin-bottom: 1rem;
            display: block;
            text-decoration: none;
            transition: color 0.3s;
        }

        .footer-column a:hover {
            color: var(--gold-light);
        }

        .social-icons {
            display: flex;
            gap: 1rem;
            margin-top: 1.5rem;
        }

        .social-icons a {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.1);
            display: flex;
            align-items: center;
            justify-content: center;
            transition: background 0.3s;
        }

        .social-icons a:hover {
            background: var(--gold-light);
        }

        .copyright {
            text-align: center;
            margin-top: 3rem;
            padding-top: 2rem;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            color: var(--gray-medium);
        }

        /* Responsive */
        @media (max-width: 992px) {
            .about-content, .director-section {
                flex-direction: column;
            }
            
            .timeline-container {
                flex-direction: column;
            }
            
            .timeline-container::before {
                display: none;
            }
            
            .timeline-item::before {
                display: none;
            }
            
            .hero-buttons {
                flex-direction: column;
                align-items: center;
            }
            
            .hero-button {
                width: 100%;
                max-width: 300px;
            }
        }

        @media (max-width: 768px) {
            nav ul {
                display: none;
            }
            
            .mobile-menu {
                display: block;
            }
            
            .header-container {
                padding: 1rem;
            }
            
            .hero h1 {
                font-size: 2.2rem;
            }
            
            section {
                padding: 3rem 5%;
            }
            
            .section-title h2 {
                font-size: 2rem;
            }
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header>
        <div class="header-container">
            <div class="logo">
                <span class="logo-text">SCI SAGES</span>
                <div class="logo-dot"></div>
            </div>
            
            <nav>
                <ul>
                    <li><a href="#accueil">Accueil</a></li>
                    <li><a href="#presentation">Présentation</a></li>
                    <li><a href="#projets">Nos projets</a></li>
                    <li><a href="#valeurs">Nos valeurs</a></li>
                    <li><a href="#faq">FAQ</a></li>
                    <li><a href="#contact">Contact</a></li>
                </ul>
            </nav>
            
            <a href="#contact" class="cta-button">Soumettre votre demande</a>
            
            <div class="mobile-menu">
                <i class="fas fa-bars"></i>
            </div>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="hero" id="accueil">
        <div class="hero-content">
            <h1>Démarrez votre projet avec SCI SAGES dès aujourd'hui</h1>
            <p>Votre partenaire de confiance pour la construction et l'acquisition de maisons modernes</p>
            
            <div class="hero-buttons">
                <a href="#" class="hero-button">Souscrire à nos maisons de rêves</a>
                <a href="#" class="hero-button">Faites construire votre maison de rêve</a>
            </div>
            
            <div class="hero-form">
                <form>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="name">Nom</label>
                            <input type="text" id="name" placeholder="Votre nom">
                        </div>
                        <div class="form-group">
                            <label for="phone">Téléphone</label>
                            <input type="tel" id="phone" placeholder="Votre numéro">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" placeholder="Votre email">
                    </div>
                    
                    <div class="form-group">
                        <label for="service">Choix du service</label>
                        <select id="service">
                            <option value="">Sélectionnez une option</option>
                            <option value="acheter">Acheter</option>
                            <option value="construire">Faire construire</option>
                        </select>
                    </div>
                    
                    <button type="submit" class="cta-button" style="width: 100%;">Démarrer mon projet</button>
                </form>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="presentation">
        <div class="section-title">
            <h2>Qui sommes-nous ?</h2>
        </div>
        
        <div class="about-content">
            <div class="about-text">
                <h3>SCI SAGES, votre promoteur immobilier de confiance</h3>
                <p>SCI SAGES est un promoteur immobilier spécialisé dans la vente et la construction de maisons modernes. Forts de plus de 15 ans d'expérience, nous accompagnons nos clients dans la réalisation de leur projet immobilier, de la conception à la livraison.</p>
                <p>Notre équipe d'experts met à votre service son savoir-faire et son expertise pour vous garantir un projet réussi, respectant les délais et le budget convenus.</p>
                <p>Nous nous engageons à créer des espaces de vie qui allient esthétique, fonctionnalité et durabilité, en utilisant des matériaux de qualité et en suivant les dernières innovations dans le domaine de la construction.</p>
            </div>
            
            <div class="about-image">
                <img src="https://images.unsplash.com/photo-1541888946425-d81bb19240f5?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80" alt="Chantier de construction">
            </div>
        </div>
        
        <div class="director-section">
            <div class="director-portrait">
                <img src="https://images.unsplash.com/photo-1560250097-0b93528c311a?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1374&q=80" alt="Directeur Général">
            </div>
            
            <div class="director-quote">
                <blockquote>Chez SCI SAGES, nous croyons que chaque projet immobilier est unique et mérite une attention particulière. Notre mission est de transformer vos rêves en réalité, en créant des espaces de vie qui vous ressemblent.</blockquote>
                <p>Jean Dupont, Directeur Général</p>
            </div>
        </div>
        
        <div class="values-section" id="valeurs">
            <div class="section-title">
                <h2>Nos valeurs et engagements</h2>
            </div>
            
            <div class="values-grid">
                <div class="value-item">
                    <div class="value-icon">
                        <i class="fas fa-handshake"></i>
                    </div>
                    <h3>Confiance</h3>
                    <p>Nous établissons des relations durables basées sur la transparence et la confiance mutuelle avec nos clients.</p>
                </div>
                
                <div class="value-item">
                    <div class="value-icon">
                        <i class="fas fa-award"></i>
                    </div>
                    <h3>Qualité</h3>
                    <p>Nous nous engageons à utiliser des matériaux de première qualité et à respecter les normes les plus strictes.</p>
                </div>
                
                <div class="value-item">
                    <div class="value-icon">
                        <i class="fas fa-lightbulb"></i>
                    </div>
                    <h3>Innovation</h3>
                    <p>Nous intégrons les dernières innovations techniques et architecturales dans tous nos projets.</p>
                </div>
                
                <div class="value-item">
                    <div class="value-icon">
                        <i class="fas fa-smile"></i>
                    </div>
                    <h3>Satisfaction client</h3>
                    <p>Votre satisfaction est notre priorité absolue. Nous nous engageons à dépasser vos attentes.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Timeline Section -->
    <section class="timeline-section" id="projets">
        <div class="section-title">
            <h2>Projet en 5 étapes</h2>
        </div>
        
        <div class="timeline-container">
            <div class="timeline-column timeline-left">
                <div class="timeline-title">
                    <h3>Souscrire à nos maisons de rêves</h3>
                </div>
                
                <div class="timeline-item">
                    <h4>Étape 1: Visiter et faire son choix</h4>
                    <p>Découvrez nos modèles de maisons et visitez nos réalisations pour choisir celle qui correspond à vos attentes.</p>
                </div>
                
                <div class="timeline-item">
                    <h4>Étape 2: Faire sa réservation</h4>
                    <p>Réservez votre future maison en signant le contrat de réservation et en versant l'acompte requis.</p>
                </div>
                
                <div class="timeline-item">
                    <h4>Étape 3: Suivre l'évolution des travaux</h4>
                    <p>Accédez à notre plateforme en ligne pour suivre en temps réel l'avancement de la construction de votre maison.</p>
                </div>
                
                <div class="timeline-item">
                    <h4>Étape 4: Profiter de votre espace</h4>
                    <p>Récupérez les clés de votre nouvelle maison et profitez pleinement de votre nouvel espace de vie.</p>
                </div>
            </div>
            
            <div class="timeline-column timeline-right">
                <div class="timeline-title">
                    <h3>Faire construire votre maison de rêve</h3>
                </div>
                
                <div class="timeline-item">
                    <h4>Étape 1: Étude et validation du projet</h4>
                    <p>Nous étudions ensemble votre projet, vos besoins et votre budget pour définir les contours de votre future maison.</p>
                </div>
                
                <div class="timeline-item">
                    <h4>Étape 2: Élaboration du plan d'exécution</h4>
                    <p>Nos architectes conçoivent les plans détaillés de votre maison, intégrant toutes vos spécifications.</p>
                </div>
                
                <div class="timeline-item">
                    <h4>Étape 3: Suivre l'évolution des travaux</h4>
                    <p>Accédez à notre plateforme en ligne pour suivre en temps réel l'avancement de la construction de votre maison.</p>
                </div>
                
                <div class="timeline-item">
                    <h4>Étape 4: Profiter de votre espace</h4>
                    <p>Récupérez les clés de votre nouvelle maison et profitez pleinement de votre nouvel espace de vie.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer id="contact">
        <div class="footer-container">
            <div class="footer-column">
                <h3>SCI SAGES</h3>
                <p>Votre partenaire de confiance pour la construction et l'acquisition de maisons modernes.</p>
                <div class="social-icons">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
            
            <div class="footer-column">
                <h3>Liens rapides</h3>
                <a href="#accueil">Accueil</a>
                <a href="#presentation">Présentation</a>
                <a href="#projets">Nos projets</a>
                <a href="#valeurs">Nos valeurs</a>
                <a href="#faq">FAQ</a>
                <a href="#contact">Contact</a>
            </div>
            
            <div class="footer-column">
                <h3>Contactez-nous</h3>
                <p><i class="fas fa-map-marker-alt"></i> 123 Avenue de l'Immobilier, 75000 Paris</p>
                <p><i class="fas fa-phone"></i> +33 1 23 45 67 89</p>
                <p><i class="fas fa-envelope"></i> contact@scisages.fr</p>
            </div>
            
            <div class="footer-column">
                <h3>Horaires d'ouverture</h3>
                <p>Lundi - Vendredi: 9h00 - 18h00</p>
                <p>Samedi: 9h00 - 12h00</p>
                <p>Dimanche: Fermé</p>
            </div>
        </div>
        
        <div class="copyright">
            <p>&copy; 2023 SCI SAGES. Tous droits réservés.</p>
        </div>
    </footer>

    <script>
        // Mobile menu toggle
        document.querySelector('.mobile-menu').addEventListener('click', function() {
            document.querySelector('nav ul').style.display = 
                document.querySelector('nav ul').style.display === 'flex' ? 'none' : 'flex';
        });

        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                
                const targetId = this.getAttribute('href');
                if(targetId === '#') return;
                
                const targetElement = document.querySelector(targetId);
                if(targetElement) {
                    window.scrollTo({
                        top: targetElement.offsetTop - 80,
                        behavior: 'smooth'
                    });
                    
                    // Close mobile menu after clicking a link
                    if(window.innerWidth <= 768) {
                        document.querySelector('nav ul').style.display = 'none';
                    }
                }
            });
        });
    </script>
</body>
</html>