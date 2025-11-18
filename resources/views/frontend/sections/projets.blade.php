@push('styles')
    <style>
        .chronogram-section {
            background: var(--white);
            padding: 120px 0;
        }

        .chronogram-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(400px, 1fr));
            gap: 4rem;
            margin-top: 4rem;
        }

        .chronogram-column {
            position: relative;
        }

        .chronogram-title {
            font-size: 1.8rem;
            font-weight: 700;
            text-align: center;
            margin-bottom: 3rem;
            color: var(--white);
            padding: 1.5rem;
            background: var(--gradient-gold);
            border-radius: 15px;
            box-shadow: var(--shadow-light);
            text-transform: capitalize;
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
            background: var(--white);
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
            margin-bottom: 0.8rem;
        }

        .timeline-description {
            color: var(--dark-gray);
            line-height: 1.6;
            font-size: 1rem;
        }

        /* ================== BOUTON DÉMARRER PROJET ================== */
        .read-more-section {
            text-align: center;
            margin-top: 5rem;
            padding-top: 3rem;
            border-top: 2px solid var(--light-gray);
        }

        .btn-read-more {
            background: linear-gradient(135deg, var(--primary-gold), var(--secondary-gold));
            color: var(--dark-brown);
            text-decoration: none;
            padding: 1.2rem 3rem;
            border-radius: 35px;
            font-weight: 700;
            font-size: 1.1rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            transition: all 0.3s ease;
            box-shadow: 0 8px 25px rgba(212, 175, 55, 0.3);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
            transform: translateY(0);
        }

        .btn-read-more::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, var(--secondary-gold), var(--primary-gold));
            transition: left 0.3s ease;
            z-index: -1;
        }

        .btn-read-more:hover {
            color: var(--dark-brown);
            text-decoration: none;
            transform: translateY(-3px);
            box-shadow: 0 12px 35px rgba(212, 175, 55, 0.4);
        }

        .btn-read-more:hover::before {
            left: 0;
        }

        .btn-read-more:hover .fas.fa-arrow-right {
            transform: translateX(5px);
        }

        .btn-read-more .fas {
            transition: transform 0.3s ease;
        }

        .btn-read-more:active {
            transform: translateY(-1px);
        }

        .btn-text {
            margin: 0 0.5rem;
        }

        /* Effet de pulsation subtil */
        .btn-read-more::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            background: rgba(255, 255, 255, 0.3);
            border-radius: 50%;
            transform: translate(-50%, -50%);
            transition: width 0.6s ease, height 0.6s ease;
        }

        .btn-read-more:hover::after {
            width: 300px;
            height: 300px;
        }

        /* Responsive */
        @media (max-width: 991px) {
            .chronogram-container {
                grid-template-columns: 1fr;
                gap: 3rem;
            }

            .chronogram-title {
                font-size: 1.6rem;
                padding: 1.2rem;
            }

            .read-more-section {
                margin-top: 4rem;
                padding-top: 2rem;
            }
        }

        @media (max-width: 768px) {
            .chronogram-section {
                padding: 80px 0;
            }

            .chronogram-container {
                gap: 2rem;
                margin-top: 3rem;
            }

            .chronogram-title {
                font-size: 1.4rem;
                padding: 1rem;
            }

            .timeline {
                padding-left: 1.5rem;
            }

            .timeline-item {
                padding: 1.5rem;
                margin-bottom: 2rem;
            }

            .timeline-item:hover {
                transform: translateX(5px);
            }

            .timeline-item::before {
                left: -2rem;
                width: 16px;
                height: 16px;
            }

            .timeline-title {
                font-size: 1.1rem;
            }

            .timeline-description {
                font-size: 0.95rem;
            }

            .read-more-section {
                margin-top: 3rem;
                padding-top: 2rem;
            }

            .btn-read-more {
                padding: 1rem 2.5rem;
                font-size: 1rem;
                width: 100%;
                max-width: 350px;
            }
        }

        @media (max-width: 480px) {
            .chronogram-container {
                grid-template-columns: 1fr;
            }

            .chronogram-title {
                font-size: 1.2rem;
            }

            .timeline-item {
                padding: 1.2rem;
            }

            .timeline-title {
                font-size: 1rem;
            }

            .timeline-description {
                font-size: 0.9rem;
            }

            .read-more-section {
                margin-top: 2rem;
                padding-top: 1.5rem;
            }

            .btn-read-more {
                padding: 0.9rem 2rem;
                font-size: 0.95rem;
                max-width: 300px;
            }

            .btn-text {
                font-size: 0.9rem;
            }
        }
    </style>
@endpush

<section id="projets" class="chronogram-section">
    <div class="container">
        <div class="section-subtitle" data-aos="fade-up">Notre processus</div>
        <h2 class="section-title" data-aos="fade-up" data-aos-delay="100">
            Votre projet en étapes détaillées
        </h2>

        <div class="chronogram-container">
            @foreach ($activites as $activite)
                <div class="chronogram-column" data-aos="fade-up" data-aos-delay="100">
                    <h3 class="chronogram-title">{{ $activite->libelle }}</h3>

                    @if ($activite->projets && $activite->projets->count() > 0)
                        <div class="timeline">
                            @foreach ($activite->projets as $projet)
                                <div class="timeline-item" data-aos="fade-up" data-aos-delay="100">
                                    <div class="timeline-step">
                                        @if ($projet->etape)
                                            Étape {{ $projet->etape }}
                                        @else
                                            Étape {{ $loop->iteration }}
                                        @endif
                                    </div>
                                    <h4 class="timeline-title text-uppercase">{{ $projet->libelle }}</h4>
                                    <p class="timeline-description">{{ $projet->description }}</p>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="timeline">
                            <div class="timeline-item">
                                <div class="timeline-step">Information</div>
                                <h4 class="timeline-title">{{ $activite->libelle }}</h4>
                                <p class="timeline-description">
                                    {{ $activite->description ?? 'Plus d\'informations disponibles bientôt.' }}
                                </p>
                            </div>
                        </div>
                    @endif
                </div>
            @endforeach
        </div>

        <!-- Call to Action Section -->
        {{-- <div class="read-more-section" data-aos="fade-up" data-aos-delay="400">
            <a href="#form-projet" class="btn-read-more">
                <i class="fas fa-rocket me-2"></i>
                <span class="btn-text">Démarrer votre projet</span>
                <i class="fas fa-arrow-right ms-2"></i>
            </a>
        </div> --}}
    </div>
</section>
