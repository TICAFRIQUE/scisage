@push('styles')
    <style>
        .hero-section {
            background: linear-gradient(rgba(60, 36, 21, 0), rgba(139, 69, 19, 0.075)),
                url('{{ $banniere?->getFirstMediaUrl('banniere') ?? asset('images/default-banner.jpg') }}');
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
            background: rgba(212, 175, 55, 0.9);
            /* Background doré au hover */
            box-shadow: 0 12px 40px rgba(0, 0, 0, 0.4);
        }

        .hero-option:hover h3,
        .hero-option:hover p {
            color: var(--dark-brown);
            /* Texte sombre au hover */
        }

        .hero-option h3 {
            color: var(--secondary-gold);
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
        }
    </style>
@endpush

<section id="accueil" class="hero-section">
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
@endpush
