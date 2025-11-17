@push('styles')
    <style>
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
            height: 800px;
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
            overflow: hidden;
            position: relative;
        }

        .value-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 50%;
            transition: transform 0.3s ease;
        }

        /* Effet hover pour les images */
        .value-card:hover .value-image {
            transform: scale(1.1);
        }

        /* Style pour les icônes (inchangé) */
        .value-icon i {
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

        /* ================== RESPONSIVE PRESENTATION ================== */
        @media (max-width: 991px) {
            .presentation-section {
                padding: 80px 0;
            }

            .section-title {
                font-size: 2.5rem;
            }

            .presentation-content {
                grid-template-columns: 1fr;
                gap: 3rem;
                margin-bottom: 4rem;
            }

            .presentation-image {
                order: -1;
            }

            .presentation-image img {
                height: 300px;
            }

            .director-section {
                padding: 2rem;
                margin: 2rem 0;
            }

            .director-photo {
                width: 120px;
                height: 120px;
            }

            .director-quote {
                font-size: 1.1rem;
            }

            .values-grid {
                grid-template-columns: 1fr;
                gap: 1.5rem;
            }

            .value-card {
                padding: 2rem 1.5rem;
            }
        }

        @media (max-width: 768px) {
            .presentation-section {
                padding: 60px 0;
            }

            .section-title {
                font-size: 2rem;
                margin-bottom: 2rem;
            }

            .section-subtitle {
                font-size: 0.9rem;
                letter-spacing: 1.5px;
            }

            .presentation-content {
                gap: 2rem;
                margin-bottom: 3rem;
            }

            .presentation-text {
                font-size: 1rem;
                line-height: 1.6;
            }

            .presentation-text p {
                margin-bottom: 1rem;
            }

            .presentation-image img {
                height: 250px;
            }

            .director-section {
                padding: 1.5rem;
                margin: 1.5rem 0;
                border-radius: 15px;
            }

            .director-photo {
                width: 100px;
                height: 100px;
                margin-bottom: 1.5rem;
            }

            .director-quote {
                font-size: 1rem;
                margin-bottom: 1rem;
            }

            .director-name {
                font-size: 1rem;
            }

            .values-section {
                margin-top: 3rem;
            }

            .values-grid {
                margin-top: 2rem;
                gap: 1rem;
            }

            .value-card {
                padding: 1.5rem;
                border-radius: 15px;
            }

            .value-icon {
                width: 60px;
                height: 60px;
                font-size: 1.5rem;
                margin-bottom: 1.5rem;
            }

            .value-title {
                font-size: 1.1rem;
                margin-bottom: 0.8rem;
            }

            .value-description {
                font-size: 0.9rem;
                line-height: 1.5;
            }
        }

        @media (max-width: 480px) {
            .presentation-section {
                padding: 40px 0;
            }

            .container {
                padding: 0 15px;
            }

            .section-title {
                font-size: 1.8rem;
                margin-bottom: 1.5rem;
            }

            .section-subtitle {
                font-size: 0.8rem;
                letter-spacing: 1px;
            }

            .presentation-content {
                gap: 1.5rem;
                margin-bottom: 2rem;
            }

            .presentation-text {
                font-size: 0.95rem;
            }

            .presentation-image {
                border-radius: 15px;
            }

            .presentation-image img {
                height: 200px;
            }

            .director-section {
                padding: 1rem;
                margin: 1rem 0;
            }

            .director-photo {
                width: 80px;
                height: 80px;
                margin-bottom: 1rem;
                border-width: 3px;
            }

            .director-quote {
                font-size: 0.9rem;
                margin-bottom: 0.8rem;
            }

            .director-name {
                font-size: 0.9rem;
            }

            .values-section {
                margin-top: 2rem;
            }

            .values-grid {
                margin-top: 1.5rem;
                gap: 0.8rem;
            }

            .value-card {
                padding: 1rem;
            }

            .value-icon {
                width: 50px;
                height: 50px;
                font-size: 1.2rem;
                margin-bottom: 1rem;
            }

            .value-title {
                font-size: 1rem;
                margin-bottom: 0.6rem;
            }

            .value-description {
                font-size: 0.85rem;
                line-height: 1.4;
            }
        }

        /* Ajustements pour les très petits écrans */
        @media (max-width: 360px) {
            .section-title {
                font-size: 1.6rem;
            }

            .presentation-text {
                font-size: 0.9rem;
            }

            .presentation-image img {
                height: 180px;
            }

            .director-quote {
                font-size: 0.85rem;
            }

            .value-card {
                padding: 0.8rem;
            }

            .value-description {
                font-size: 0.8rem;
            }
        }

        /* ================== BOUTON LIRE LA SUITE ================== */
        .read-more-section {
            margin-top: 1rem;
        }

        .btn-read-more {
            background: linear-gradient(135deg, var(--primary-gold), var(--secondary-gold));
            color: var(--dark-brown);
            text-decoration: none;
            padding: rem 2.5rem;
            border-radius: 30px;
            font-weight: 600;
            font-size: 0.95rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            transition: all 0.3s ease;
            box-shadow: 0 5px 20px rgba(212, 175, 55, 0.3);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
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
            box-shadow: 0 8px 25px rgba(212, 175, 55, 0.4);
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

        /* ================== RESPONSIVE POUR BOUTON ================== */
        @media (max-width: 768px) {
            .btn-read-more {
                padding: 0.8rem 2rem;
                font-size: 0.9rem;
                width: 100%;
                max-width: 300px;
            }

            .read-more-section {
                margin-top: 1.5rem;
                text-align: center;
            }
        }

        @media (max-width: 480px) {
            .btn-read-more {
                padding: 0.7rem 1.5rem;
                font-size: 0.85rem;
                max-width: 280px;
            }

            .btn-read-more .btn-text {
                font-size: 0.8rem;
            }
        }
    </style>
@endpush


<section id="presentation" class="presentation-section">
    <div class="container">
        <div class="section-subtitle" data-aos="fade-up">À propos de nous</div>
        <h2 class="section-title" data-aos="fade-up" data-aos-delay="100">Qui sommes-nous ?</h2>

        <div class="presentation-content" data-aos="fade-up" data-aos-delay="200">
            <div class="presentation-text">
                <div class="text-content">
                    {!! Str::limit($apropos?->description, 1082) !!}
                </div>

                @if (strlen($apropos?->description ?? '') > 1083)
                    <div class="read-more-section">
                        <a href="{{ route('page.apropos') }}" class="btn-read-more">
                            <i class="fas fa-book-open me-2"></i>
                            <span class="btn-text">Lire la présentation complète</span>
                            <i class="fas fa-arrow-right ms-2"></i>
                        </a>
                    </div>
                @endif
            </div>

            <div class="presentation-image">
                <img src="{{ $apropos?->getFirstMediaUrl('image') ?? 'https://images.unsplash.com/photo-1541888946425-d81bb19240f5?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80' }}"
                    alt="Chantier SCI SAGES" />
            </div>
        </div>

        -- <!-- Nos valeurs -->
       @include('frontend.sections.engagement')
    </div>
</section>
