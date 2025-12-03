@push('styles')
    <style>
        .hero-section {
            color: var(--white);
            padding: 200px 0 150px;
            text-align: center;
            position: relative;
            overflow: hidden;
            height: 100vh;
            min-height: 600px;
        }

        /* Slider Container */
        .hero-slider {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 1;
        }

        /* Slide Individual */
        .hero-slide {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            opacity: 0;
            transition: opacity 0.8s ease-in-out;
        }

        .hero-slide.active {
            opacity: 1;
        }

        .hero-slide::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            /* background: linear-gradient(rgba(60, 36, 21, 0.2), rgba(139, 69, 19, 0.3)); */
            z-index: 1;
        }

        .hero-content {
            position: relative;
            z-index: 3;
        }

        /* Navigation Arrows */
        .slider-nav {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background: rgba(212, 175, 55, 0.8);
            border: none;
            color: var(--dark-brown);
            width: 50px;
            height: 50px;
            border-radius: 50%;
            font-size: 20px;
            cursor: pointer;
            z-index: 4;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .slider-nav:hover {
            background: var(--primary-gold);
            transform: translateY(-50%) scale(1.1);
        }

        .slider-prev {
            left: 30px;
        }

        .slider-next {
            right: 30px;
        }

        /* Dots Indicator */
        .slider-dots {
            position: absolute;
            bottom: 30px;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            gap: 15px;
            z-index: 4;
        }

        .slider-dot {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.5);
            cursor: pointer;
            transition: all 0.3s ease;
            border: 2px solid transparent;
        }

        .slider-dot.active {
            background: var(--primary-gold);
            border-color: white;
            transform: scale(1.2);
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
            background: rgba(60, 36, 21, 0.648);
            /* Arrière-plan plus opaque et coloré */
            backdrop-filter: blur(20px);
            border: 2px solid var(--primary-gold);
            border-radius: 20px;
            padding: 2rem;
            text-align: center;
            min-width: 300px;
            transition: all 0.4s ease;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
            /* Ombre pour plus de profondeur */
            position: relative;
        }

        /* Pseudo-élément pour renforcer l'arrière-plan */
        .hero-option::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg,
                    rgba(212, 175, 55, 0.1) 0%,
                    rgba(60, 36, 21, 0.2) 50%,
                    rgba(212, 175, 55, 0.1) 100%);
            border-radius: 18px;
            z-index: -1;
        }

        .hero-option:hover {
            transform: translateY(-10px);
            background: white;
            /* Background doré au hover */
            box-shadow: 0 12px 40px rgba(0, 0, 0, 0.4);
        }

        .hero-option:hover h3,
        .hero-option:hover p {
            color: var(--dark-brown);
            /* Texte sombre au hover */
        }

        .hero-option h3 {
            color: white;
            font-weight: 700;
            margin-bottom: 1rem;
            font-size: 1.3rem;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.3);
            /* Ombre pour le texte */
        }

        .hero-option p {
            color: var(--white);
            font-weight: 500;
            line-height: 1.6;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.3);
            /* Ombre pour le texte */
        }

        .hero-option i {
            font-size: 1.5rem;
            margin-right: 0.5rem;
            color: var(--primary-gold);
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.3);
        }

        .hero-central-text {
            font-size: 2.5rem;
            font-weight: 700;
            margin: 4rem 0 3rem;
            color: var(--secondary-gold);
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        }

        /* ================== BOUTON CTA HERO ================== */
        .hero-cta-section {
            margin-top: 3rem;
        }

        .btn-hero-cta {
            background: linear-gradient(135deg, var(--primary-gold), var(--secondary-gold));
            color: var(--dark-brown);
            text-decoration: none;
            padding: 1.5rem 4rem;
            border-radius: 50px;
            font-weight: 700;
            font-size: 1.2rem;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            transition: all 0.4s ease;
            box-shadow: 0 10px 30px rgba(212, 175, 55, 0.4);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
            border: 3px solid transparent;
        }

        .btn-hero-cta::before {
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

        .btn-hero-cta:hover {
            color: linear-gradient(135deg, #3C2415 0%, #8B4513 100%);
            text-decoration: none;
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(212, 175, 55, 0.6);
            border-color: var(--secondary-gold);
        }

        .btn-hero-cta:hover::before {
            left: 0;
        }

        .btn-hero-cta:hover .fas {
            transform: translateX(8px) scale(1.2);
        }

        .btn-hero-cta .fas {
            margin-left: 1rem;
            transition: all 0.4s ease;
            font-size: 1.1rem;
        }

        .btn-hero-cta:active {
            transform: translateY(-2px);
        }

        /* Effet de pulsation */
        .btn-hero-cta::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            transform: translate(-50%, -50%);
            transition: width 0.6s ease, height 0.6s ease;
        }

        .btn-hero-cta:hover::after {
            width: 200px;
            height: 200px;
        }

        /* Responsive */
        @media (max-width: 991px) {
            .hero-section {
                padding: 150px 0 100px;
            }

            .hero-section h1 {
                font-size: 3rem;
            }

            .hero-central-text {
                font-size: 2rem;
                margin: 3rem 0 2rem;
            }

            .btn-hero-cta {
                padding: 1.2rem 3rem;
                font-size: 1.1rem;
            }

            .slider-nav {
                width: 40px;
                height: 40px;
                font-size: 16px;
            }

            .slider-prev {
                left: 15px;
            }

            .slider-next {
                right: 15px;
            }
        }

        @media (max-width: 768px) {
            .hero-section {
                padding: 120px 0 80px;
            }

            .hero-section h1 {
                font-size: 2.5rem;
            }

            .hero-options {
                flex-direction: column;
                align-items: center;
                gap: 1.5rem;
                margin: 2rem 0;
            }

            .hero-option {
                min-width: 280px;
                max-width: 350px;
                padding: 1.5rem;
            }

            .hero-central-text {
                font-size: 1.8rem;
                margin: 2.5rem 0 2rem;
            }

            .btn-hero-cta {
                padding: 1.1rem 2.5rem;
                font-size: 1rem;
                width: 90%;
                max-width: 350px;
            }

            .slider-nav {
                width: 35px;
                height: 35px;
                font-size: 14px;
            }

            .slider-prev {
                left: 10px;
            }

            .slider-next {
                right: 10px;
            }

            .slider-dots {
                bottom: 20px;
                gap: 10px;
            }

            .slider-dot {
                width: 10px;
                height: 10px;
            }
        }

        @media (max-width: 480px) {
            .hero-section h1 {
                font-size: 2rem;
            }

            .hero-central-text {
                font-size: 1.5rem;
                margin: 2rem 0 1.5rem;
            }

            .hero-option {
                min-width: 260px;
                padding: 1.2rem;
            }

            .hero-option h3 {
                font-size: 1.1rem;
            }

            .hero-option p {
                font-size: 0.9rem;
            }

            .btn-hero-cta {
                padding: 1rem 2rem;
                font-size: 0.95rem;
                letter-spacing: 1px;
            }

            .slider-nav {
                display: none;
                /* Cache les flèches sur mobile */
            }
        }
    </style>
@endpush

<section id="accueil" class="hero-section">
    <!-- Slider Background -->
    <div class="hero-slider">
        @if ($banniere && $banniere->count() > 0)
            @foreach ($banniere as $index => $slide)
                @php
                    $imageUrl = asset('images/default-banner.jpg'); // Image par défaut

                    // Récupérer l'image depuis la relation media
if ($slide->media && $slide->media->count() > 0) {
    $media = $slide->media->where('collection_name', 'banniere')->first() ?? $slide->media->first();
                        if ($media) {
                            $imageUrl = $media->getFullUrl();
                        }
                    }
                @endphp
                <div class="hero-slide {{ $index === 0 ? 'active' : '' }}"
                    style="background-image: url('{{ $imageUrl }}');">
                </div>
            @endforeach
        @else
            <div class="hero-slide active" style="background-image: url('{{ asset('images/default-banner.jpg') }}');">
            </div>
        @endif
    </div>

    <!-- Navigation Arrows -->
    @if ($banniere && $banniere->count() > 1)
        <button class="slider-nav slider-prev" onclick="changeSlide(-1)">
            <i class="fas fa-chevron-left"></i>
        </button>
        <button class="slider-nav slider-next" onclick="changeSlide(1)">
            <i class="fas fa-chevron-right"></i>
        </button>

        <!-- Dots Indicator -->
        <div class="slider-dots">
            @foreach ($banniere as $index => $slide)
                <div class="slider-dot {{ $index === 0 ? 'active' : '' }}" onclick="goToSlide({{ $index }})">
                </div>
            @endforeach
        </div>
    @endif

    <div class="container">
        <div class="hero-content" data-aos="fade-up">
            <!-- Encadrés côte à côte -->
            <div class="hero-options">
                @foreach ($activites as $item)
                    <a href="{{ route('page.activites', $item->slug) }}" class="text-decoration-none">
                        <div class="hero-option" data-aos="fade-right" data-aos-delay="200">
                            <h3><i class="{{ $item->icone }}"></i> {{ $item->libelle }}</h3>
                            {{-- <p>{{ $item->description }}</p> --}}
                        </div>
                    </a>
                @endforeach
            </div>

            <!-- Texte central -->
            {{-- <h3 class="hero-central-text" data-aos="zoom-in" data-aos-delay="600">
                Démarrez votre projet avec SCI SAGES dès aujourd'hui
            </h3> --}}

            <!-- Bouton Call to Action -->
            <div class="hero-cta-section">
                <a href="#form-projet" class="btn-hero-cta">
                    Démarrer votre projet
                    <i class="fas fa-rocket"></i>
                </a>
            </div>
        </div>
    </div>
</section>


@push('scripts')
    <script>
        // Variables pour le slider
        let currentSlide = 0;
        let slides = [];
        let dots = [];
        let slideInterval;
        let isTransitioning = false;

        // Initialisation du slider
        document.addEventListener('DOMContentLoaded', function() {
            slides = document.querySelectorAll('.hero-slide');
            dots = document.querySelectorAll('.slider-dot');

            if (slides.length > 1) {
                startAutoSlider();

                // Pause auto-slider au hover
                const heroSection = document.querySelector('.hero-section');
                heroSection.addEventListener('mouseenter', stopAutoSlider);
                heroSection.addEventListener('mouseleave', startAutoSlider);
            }
        });

        // Fonction pour changer de slide avec effet fade
        function changeSlide(direction) {
            if (isTransitioning || slides.length <= 1) return;

            isTransitioning = true;
            stopAutoSlider();

            // Calculer le nouveau slide
            const oldSlide = currentSlide;
            currentSlide += direction;

            if (currentSlide >= slides.length) {
                currentSlide = 0;
            } else if (currentSlide < 0) {
                currentSlide = slides.length - 1;
            }

            const newSlide = slides[currentSlide];
            const currentSlideEl = slides[oldSlide];

            // Commencer le fade in de la nouvelle slide immédiatement
            newSlide.style.opacity = '0';
            newSlide.classList.add('active');
            
            // Animer vers la nouvelle slide avec un léger délai
            setTimeout(() => {
                newSlide.style.opacity = '1';
                
                // Commencer le fade out de l'ancienne slide après un court délai
                setTimeout(() => {
                    currentSlideEl.style.opacity = '0.3';
                    
                    setTimeout(() => {
                        currentSlideEl.classList.remove('active');
                        currentSlideEl.style.opacity = '0';
                        
                        // Mettre à jour les points
                        if (dots.length > 0) {
                            dots[oldSlide].classList.remove('active');
                            dots[currentSlide].classList.add('active');
                        }
                        
                        setTimeout(() => {
                            isTransitioning = false;
                            startAutoSlider();
                        }, 100);
                    }, 200);
                }, 100);
            }, 50);
        }

        // Fonction pour aller directement à un slide
        function goToSlide(index) {
            if (isTransitioning || index === currentSlide || slides.length <= 1) return;

            isTransitioning = true;
            stopAutoSlider();

            const oldSlide = currentSlide;
            currentSlide = index;

            const newSlide = slides[currentSlide];
            const currentSlideEl = slides[oldSlide];

            // Commencer le fade in de la nouvelle slide immédiatement
            newSlide.style.opacity = '0';
            newSlide.classList.add('active');
            
            // Animer vers la nouvelle slide avec un léger délai
            setTimeout(() => {
                newSlide.style.opacity = '1';
                
                // Commencer le fade out de l'ancienne slide après un court délai
                setTimeout(() => {
                    currentSlideEl.style.opacity = '0.3';
                    
                    setTimeout(() => {
                        currentSlideEl.classList.remove('active');
                        currentSlideEl.style.opacity = '0';
                        
                        // Mettre à jour les points
                        if (dots.length > 0) {
                            dots[oldSlide].classList.remove('active');
                            dots[currentSlide].classList.add('active');
                        }
                        
                        setTimeout(() => {
                            isTransitioning = false;
                            startAutoSlider();
                        }, 100);
                    }, 200);
                }, 100);
            }, 50);
        }

        // Démarrer l'auto-slider
        function startAutoSlider() {
            if (slides.length <= 1) return;

            slideInterval = setInterval(() => {
                changeSlide(1);
            }, 4000); // Change toutes les 4 secondes
        }

        // Arrêter l'auto-slider
        function stopAutoSlider() {
            if (slideInterval) {
                clearInterval(slideInterval);
            }
        }

        // Gestion du swipe sur mobile
        let startX = 0;
        let startY = 0;

        document.querySelector('.hero-section').addEventListener('touchstart', function(e) {
            startX = e.touches[0].clientX;
            startY = e.touches[0].clientY;
        });

        document.querySelector('.hero-section').addEventListener('touchend', function(e) {
            if (!startX || !startY) return;

            const endX = e.changedTouches[0].clientX;
            const endY = e.changedTouches[0].clientY;

            const diffX = startX - endX;
            const diffY = startY - endY;

            // Vérifier que c'est un swipe horizontal
            if (Math.abs(diffX) > Math.abs(diffY) && Math.abs(diffX) > 50) {
                if (diffX > 0) {
                    // Swipe vers la gauche - slide suivant
                    changeSlide(1);
                } else {
                    // Swipe vers la droite - slide précédent
                    changeSlide(-1);
                }
            }

            startX = 0;
            startY = 0;
        });

        // Animation des chiffres des statistiques
        function animateStats() {
            const statNumbers = document.querySelectorAll('.stat-number');

            statNumbers.forEach(stat => {
                const dataTarget = stat.getAttribute('data-target');
                
                // Extraire le préfixe, le chiffre et le suffixe
                const prefixMatch = dataTarget.match(/^([^0-9]*)/);
                const numberMatch = dataTarget.match(/([0-9]+)/);
                const suffixMatch = dataTarget.match(/([^0-9]*)$/);
                
                const prefix = prefixMatch ? prefixMatch[1] : '';
                const target = numberMatch ? parseInt(numberMatch[1]) : 0;
                const suffix = suffixMatch && suffixMatch[1] !== prefix ? suffixMatch[1] : '';
                
                const increment = target / 100;
                let current = 0;

                stat.classList.add('animated');

                const timer = setInterval(() => {
                    current += increment;
                    if (current >= target) {
                        current = target;
                        clearInterval(timer);
                    }
                    // Afficher avec préfixe et suffixe
                    stat.textContent = prefix + Math.floor(current) + suffix;
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
@endpush
