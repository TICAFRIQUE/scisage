@push('styles')
    <style>
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
    </style>
@endpush


<section class="statistics-section">
    <div class="container">
        <div class="statistics-container" data-aos="fade-up">


            @foreach ($statistiques as $item)
                <div class="stat-item" data-aos="zoom-in" data-aos-delay="300">
                    <div class="stat-icon">
                        <i class="{{ $item->icone }}"></i>
                    </div>
                    <div class="stat-number" data-target="{{ $item->chiffre }}">0</div>
                    <div class="stat-label">{{ $item->libelle }} </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
