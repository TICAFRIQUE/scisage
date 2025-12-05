@push('styles')
    <style>
        .form-projet-section {
            background: linear-gradient(135deg,
                    rgba(60, 36, 21, 0.425),
                    rgba(139, 69, 19, 0.692)),
                url('{{ $banniere && $banniere->count() > 0 ? ($banniere->first()->media && $banniere->first()->media->count() > 0 ? ($banniere->first()->media->where('collection_name', 'banniere')->first() ?? $banniere->first()->media->first())->getFullUrl() : asset('images/default-banner.jpg')) : asset('images/default-banner.jpg') }}');

            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            padding: 120px 0;
            position: relative;
        }

        .form-projet-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(60, 36, 21, 0.1);
            backdrop-filter: blur(2px);
        }

        .form-projet-section .container {
            position: relative;
            z-index: 2;
        }

        .form-projet-section .section-subtitle {
            color: var(--secondary-gold);
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 2px;
            font-size: 1rem;
            margin-bottom: 1rem;
            text-align: center;
        }

        .form-projet-section .section-title {
            font-size: 3rem;
            font-weight: 800;
            text-align: center;
            margin-bottom: 3rem;
            color: var(--white);
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
        }

        .form-container {
            background: rgba(255, 255, 255, 0.98);
            backdrop-filter: blur(20px);
            border-radius: 25px;
            padding: 3rem;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            max-width: 800px;
            margin: 0 auto;
        }

        .step-title {
            text-align: center;
            color: var(--dark-brown);
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 2rem;
        }

        .step-title i {
            color: var(--primary-gold);
            margin-right: 0.5rem;
        }

        /* Project Options */
        .project-options {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        .project-option {
            border: 2px solid #ddd;
            border-radius: 15px;
            padding: 1.5rem;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s ease;
            background: var(--white);
            text-decoration: none;
            display: block;
        }

        .project-option:hover {
            border-color: var(--primary-gold);
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(212, 175, 55, 0.3);
        }

        .option-icon {
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, #d4af37 0%, #f4d03f 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1rem;
            font-size: 1.5rem;
            color: var(--dark-brown);
        }

        .project-option h4 {
            font-size: 1.1rem;
            font-weight: 600;
            color: var(--dark-brown);
            margin-bottom: 0.5rem;
        }

        .project-option p {
            font-size: 0.9rem;
            color: var(--dark-gray);
            margin: 0;
        }

        /* ================== RESPONSIVE ================== */
        @media (max-width: 991px) {
            .form-projet-section {
                padding: 80px 0;
            }

            .form-projet-section .section-title {
                font-size: 2.5rem;
            }

            .form-container {
                padding: 2rem;
            }
        }

        @media (max-width: 768px) {
            .form-projet-section {
                padding: 60px 0;
            }

            .form-projet-section .section-title {
                font-size: 2rem;
            }

            .form-container {
                padding: 1.5rem;
                margin: 0 15px;
            }

            .project-options {
                grid-template-columns: 1fr;
            }

            .step-title {
                font-size: 1.3rem;
            }
        }

        @media (max-width: 480px) {
            .form-container {
                padding: 1rem;
            }

            .step-title {
                font-size: 1.2rem;
            }

            .option-icon {
                width: 50px;
                height: 50px;
                font-size: 1.2rem;
            }

            .project-option h4 {
                font-size: 1rem;
            }

            .project-option p {
                font-size: 0.85rem;
            }
        }
    </style>
@endpush

<section id="form-projet" class="form-projet-section">
    <div class="container">
        <div class="section-subtitle" data-aos="fade-up">Démarrez votre projet</div>
        <h2 class="section-title" data-aos="fade-up" data-aos-delay="100">
            Concrétisons ensemble votre rêve immobilier
        </h2>

        <div class="form-container" data-aos="fade-up" data-aos-delay="200">
            <h3 class="step-title">
                <i class="fas fa-home"></i> Quel est votre projet ?
            </h3>
            <div class="project-options">
                <a href="{{ route('page.souscrire.catalogue') }}" class="project-option">
                    <div class="option-icon">
                        <i class="fas fa-home"></i>
                    </div>
                    <h4>Souscrire à nos maisons de rêves</h4>
                    <p>Découvrez notre sélection de maisons modernes prêtes à vous accueillir</p>
                </a>
                
                <a href="{{ route('page.construction.personnalisee') }}" class="project-option">
                    <div class="option-icon">
                        <i class="fas fa-hammer"></i>
                    </div>
                    <h4>Faire construire votre maison de rêve</h4>
                    <p>Concevons ensemble la maison qui vous ressemble</p>
                </a>
            </div>
        </div>
    </div>
</section>
