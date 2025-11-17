@extends('frontend.layouts.app')

@section('title', 'Portfolio - SCI SAGES')

@push('styles')
    <style>
        /* ================== HERO BANNER PORTFOLIO ================== */
        .portfolio-hero {
            background: linear-gradient(135deg, rgba(60, 36, 21, 0.85), rgba(139, 69, 19, 0.7)),
                url('{{ asset('images/portfolio-hero-bg.jpg') }}');
            background-size: cover;
            background-position: center;
            height: 50vh;
            display: flex;
            align-items: center;
            position: relative;
        }

        .portfolio-hero-content {
            position: relative;
            z-index: 2;
            text-align: center;
            color: var(--white);
        }

        .portfolio-hero h1 {
            font-size: 3rem;
            font-weight: 800;
            margin-bottom: 1rem;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
            color: var(--white);
        }

        .portfolio-hero .hero-icon {
            font-size: 3.5rem;
            color: var(--primary-gold);
            margin: 3rem 0 1rem 0; /* Ajouter une marge en haut */
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.05); }
            100% { transform: scale(1); }
        }

        .portfolio-description {
            font-size: 1.1rem;
            line-height: 1.6;
            max-width: 700px;
            margin: 0 auto;
            color: rgba(255, 255, 255, 0.95);
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.3);
        }

        /* ================== BREADCRUMB ================== */
        .breadcrumb-section {
            background: var(--light-gray);
            padding: 1rem 0;
            border-bottom: 2px solid var(--primary-gold);
        }

        .breadcrumb-custom {
            background: transparent;
            padding: 0;
            margin: 0;
            font-size: 0.9rem;
        }

        .breadcrumb-custom .breadcrumb-item {
            color: var(--dark-gray);
            font-weight: 500;
        }

        .breadcrumb-custom .breadcrumb-item+.breadcrumb-item::before {
            content: '›';
            color: var(--primary-gold);
            font-weight: 700;
        }

        .breadcrumb-custom .breadcrumb-item a {
            color: var(--dark-brown);
            text-decoration: none;
            transition: color 0.2s ease;
        }

        .breadcrumb-custom .breadcrumb-item a:hover {
            color: var(--primary-gold);
        }

        .breadcrumb-custom .breadcrumb-item.active {
            color: var(--primary-gold);
            font-weight: 600;
        }

        /* ================== SECTION PORTFOLIO ================== */
        .portfolio-section {
            padding: 80px 0;
            background: var(--white);
        }

        .section-header {
            text-align: center;
            margin-bottom: 4rem;
        }

        .section-subtitle {
            color: var(--primary-gold);
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            font-size: 0.9rem;
            margin-bottom: 0.5rem;
        }

        .section-title {
            font-size: 2.5rem;
            font-weight: 800;
            color: var(--dark-brown);
            margin: 0;
        }

        /* ================== PAGINATION PORTFOLIO ================== */
        .portfolio-pagination .pagination {
            --bs-pagination-bg: #fff;
            --bs-pagination-border-color: rgba(212, 175, 55, 0.3);
            --bs-pagination-hover-bg: var(--primary-gold);
            --bs-pagination-hover-color: var(--dark-brown);
            --bs-pagination-active-bg: var(--primary-gold);
            --bs-pagination-active-color: var(--dark-brown);
            --bs-pagination-border-radius: 50px;
            --bs-pagination-padding-x: 1.5rem;
            --bs-pagination-padding-y: 0.8rem;
            --bs-pagination-font-size: 1rem;
            gap: 0.5rem;
        }

        .portfolio-pagination .page-link {
            border-radius: 50px !important;
            border: 2px solid var(--bs-pagination-border-color);
            color: var(--dark-brown);
            background: #fff;
            font-weight: 600;
            transition: all 0.3s ease;
            margin: 0 0.2rem;
            min-width: 50px;
            text-align: center;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.1);
        }

        .portfolio-pagination .page-link:hover,
        .portfolio-pagination .page-item.active .page-link {
            background: var(--primary-gold);
            color: var(--dark-brown);
            border-color: var(--primary-gold);
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(212, 175, 55, 0.3);
            text-decoration: none;
        }

        .portfolio-pagination .page-item.disabled .page-link {
            color: #ccc;
            background: #f8f9fa;
            border-color: #e9ecef;
            pointer-events: none;
            box-shadow: none;
        }

        .results-info {
            text-align: center;
            padding: 1rem;
            background: linear-gradient(135deg, rgba(212, 175, 55, 0.1), rgba(139, 69, 19, 0.05));
            border-radius: 15px;
            border: 1px solid rgba(212, 175, 55, 0.2);
        }

        .no-results {
            background: linear-gradient(135deg, rgba(212, 175, 55, 0.1), rgba(139, 69, 19, 0.05));
            border-radius: 20px;
            border: 2px dashed rgba(212, 175, 55, 0.3);
            margin: 2rem 0;
        }

        /* ================== SCROLL INFINI ================== */
        .scroll-container {
            position: relative;
            min-height: 60vh;
        }

        .loading-spinner {
            display: none;
            text-align: center;
            padding: 2rem;
        }

        .loading-spinner.active {
            display: block;
        }

        .spinner {
            width: 50px;
            height: 50px;
            border: 4px solid rgba(212, 175, 55, 0.2);
            border-top: 4px solid var(--primary-gold);
            border-radius: 50%;
            animation: spin 1s linear infinite;
            margin: 0 auto 1rem;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        /* ================== GRID PORTFOLIO ================== */
        .portfolio-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 2rem;
            margin-top: 2rem;
        }

        .portfolio-card {
            background: var(--white);
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            opacity: 0;
            animation: fadeInUp 0.6s ease-out forwards;
        }

        .portfolio-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
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

        .portfolio-image {
            position: relative;
            height: 250px;
            overflow: hidden;
        }

        .portfolio-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .portfolio-card:hover .portfolio-image img {
            transform: scale(1.1);
        }

        /* ================== ÉTIQUETTE CATÉGORIE ================== */
        .category-badge {
            position: absolute;
            top: 15px;
            left: 15px;
            background: var(--gradient-gold);
            color: var(--dark-brown);
            padding: 0.5rem 1rem;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            z-index: 3;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            backdrop-filter: blur(10px);
        }

        .portfolio-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(60, 36, 21, 0.8);
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .portfolio-card:hover .portfolio-overlay {
            opacity: 1;
        }

        .portfolio-actions {
            display: flex;
            gap: 1rem;
        }

        .action-btn {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background: var(--gradient-gold);
            border: none;
            color: var(--dark-brown);
            font-size: 1.2rem;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .action-btn:hover {
            transform: scale(1.1);
            box-shadow: 0 5px 15px rgba(212, 175, 55, 0.4);
        }

        .portfolio-content {
            padding: 2rem;
        }

        .portfolio-type {
            background: var(--gradient-gold);
            color: var(--dark-brown);
            padding: 0.3rem 1rem;
            border-radius: 15px;
            font-size: 0.8rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            display: inline-block;
            margin-bottom: 1rem;
        }

        .portfolio-title {
            font-size: 1.3rem;
            font-weight: 700;
            color: var(--dark-brown);
            margin-bottom: 0.8rem;
            line-height: 1.3;
        }

        .portfolio-location {
            color: var(--primary-gold);
            font-weight: 600;
            margin-bottom: 0.5rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .portfolio-features {
            color: var(--dark-gray);
            font-size: 0.9rem;
            margin-bottom: 1rem;
            line-height: 1.5;
        }

        .portfolio-price {
            font-size: 1.4rem;
            font-weight: 700;
            color: var(--primary-gold);
            text-align: right;
        }

        /* ================== FILTRES PORTFOLIO ================== */
        .portfolio-filters {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 1rem;
            margin-bottom: 3rem;
        }

        .filter-btn {
            background: transparent;
            border: 2px solid var(--primary-gold);
            color: var(--dark-brown);
            padding: 0.8rem 2rem;
            border-radius: 25px;
            font-weight: 600;
            font-size: 0.95rem;
            cursor: pointer;
            transition: all 0.3s ease;
            text-transform: capitalize;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .filter-btn.active,
        .filter-btn:hover {
            background: var(--gradient-gold);
            color: var(--dark-brown);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(212, 175, 55, 0.3);
            text-decoration: none;
        }

        .filter-count {
            background: rgba(255, 255, 255, 0.2);
            padding: 2px 8px;
            border-radius: 10px;
            font-size: 0.8rem;
        }

        .filter-btn.active .filter-count {
            background: rgba(0, 0, 0, 0.1);
        }

        /* ================== MODAL DÉTAILS ================== */
        .portfolio-modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.9);
            z-index: 10000;
            overflow-y: auto;
        }

        .portfolio-modal.active {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .modal-content {
            background: var(--white);
            border-radius: 20px;
            max-width: 90vw;
            max-height: 90vh;
            width: 800px;
            overflow: hidden;
            position: relative;
            animation: modalSlideIn 0.4s ease-out;
        }

        @keyframes modalSlideIn {
            from {
                opacity: 0;
                transform: scale(0.8) translateY(-50px);
            }

            to {
                opacity: 1;
                transform: scale(1) translateY(0);
            }
        }

        .modal-close {
            position: absolute;
            top: 20px;
            right: 20px;
            background: rgba(0, 0, 0, 0.7);
            border: none;
            color: white;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            cursor: pointer;
            z-index: 1001;
            font-size: 1.5rem;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .modal-header {
            position: relative;
            height: 300px;
            overflow: hidden;
        }

        .modal-header img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .modal-body {
            padding: 2rem;
            max-height: 50vh;
            overflow-y: auto;
        }

        .modal-title {
            font-size: 2rem;
            font-weight: 700;
            color: var(--dark-brown);
            margin-bottom: 1rem;
        }

        .modal-details {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1rem;
            margin-bottom: 1.5rem;
        }

        .modal-detail-item {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            color: var(--dark-gray);
        }

        .modal-detail-item i {
            color: var(--primary-gold);
            width: 20px;
        }

        .modal-description {
            color: var(--dark-gray);
            line-height: 1.6;
            margin-bottom: 1.5rem;
        }

        .modal-gallery-btn {
            background: var(--gradient-gold);
            color: var(--dark-brown);
            border: none;
            padding: 1rem 2rem;
            border-radius: 10px;
            font-weight: 600;
            cursor: pointer;
            width: 100%;
            transition: all 0.3s ease;
        }

        .modal-gallery-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(212, 175, 55, 0.3);
        }

        /* ================== LIGHTBOX GALERIE AVEC SCROLL INFINI ================== */
        .lightbox {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.95);
            z-index: 9999;
            overflow: auto;
            backdrop-filter: blur(5px);
            animation: fadeIn 0.3s ease;
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        @keyframes fadeOut {
            from { opacity: 1; }
            to { opacity: 0; }
        }

        .lightbox.closing {
            animation: fadeOut 0.3s ease;
        }

        .lightbox.active {
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 1;
        }

        .lightbox-container {
            position: relative;
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem;
        }

        .lightbox-content {
            position: relative;
            max-width: 90%;
            max-height: 90%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .lightbox-image {
            max-width: 100%;
            max-height: 100%;
            object-fit: contain;
            border-radius: 15px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.5);
            opacity: 0;
            transform: scale(0.8);
            transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
            animation: zoomIn 0.3s ease;
        }

        @keyframes zoomIn {
            from { 
                transform: scale(0.8);
                opacity: 0;
            }
            to { 
                transform: scale(1);
                opacity: 1;
            }
        }

        .lightbox-image.loaded {
            opacity: 1;
            transform: scale(1);
        }

        /* ================== BOUTON CLOSE AMÉLIORÉ ================== */
        .lightbox-close {
            position: absolute;
            top: 10px;
            right: 10px;
            color: var(--white);
            font-size: 1.5rem;
            font-weight: bold;
            cursor: pointer;
            background: linear-gradient(135deg, var(--primary-gold), var(--secondary-gold));
            color: var(--dark-brown);
            width: 45px;
            height: 45px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
            border: 3px solid rgba(255, 255, 255, 0.2);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
            z-index: 10001;
        }

        .lightbox-close:hover {
            background: linear-gradient(135deg, var(--secondary-gold), var(--primary-gold));
            box-shadow: 0 8px 25px rgba(212, 175, 55, 0.4);
        }

        .lightbox-close i {
            font-size: 1.2rem;
        }

        /* ================== NAVIGATION AMÉLIORÉE ================== */
        .lightbox-nav {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background: linear-gradient(135deg, rgba(60, 36, 21, 0.8), rgba(139, 69, 19, 0.6));
            color: var(--white);
            border: none;
            padding: 1.2rem 1.5rem;
            cursor: pointer;
            font-size: 1.5rem;
            border-radius: 15px;
            transition: all 0.3s ease;
            backdrop-filter: blur(10px);
            border: 2px solid rgba(255, 255, 255, 0.1);
            z-index: 10000;
        }

        .lightbox-nav:hover {
            background: linear-gradient(135deg, var(--primary-gold), var(--secondary-gold));
            color: var(--dark-brown);
            transform: translateY(-50%) scale(1.1);
            box-shadow: 0 10px 30px rgba(212, 175, 55, 0.3);
        }

        .lightbox-nav:disabled {
            opacity: 0.3;
            cursor: not-allowed;
            transform: translateY(-50%);
        }

        .lightbox-prev {
            left: 2rem;
        }

        .lightbox-next {
            right: 2rem;
        }

        /* ================== COMPTEUR ET TITRE ================== */
        .lightbox-counter {
            position: absolute;
            bottom: 2rem;
            left: 50%;
            transform: translateX(-50%);
            background: linear-gradient(135deg, rgba(60, 36, 21, 0.9), rgba(139, 69, 19, 0.7));
            color: var(--white);
            padding: 0.8rem 1.5rem;
            border-radius: 25px;
            font-size: 1rem;
            font-weight: 600;
            backdrop-filter: blur(10px);
            border: 2px solid rgba(255, 255, 255, 0.1);
            z-index: 10000;
        }

        .lightbox-title {
            position: absolute;
            top: -60px;
            left: 50%;
            transform: translateX(-50%);
            background: linear-gradient(135deg, rgba(60, 36, 21, 0.9), rgba(139, 69, 19, 0.7));
            color: var(--white);
            padding: 0.8rem 1.5rem;
            border-radius: 25px;
            font-size: 1rem;
            font-weight: 600;
            backdrop-filter: blur(10px);
            border: 2px solid rgba(255, 255, 255, 0.1);
            z-index: 10000;
            text-align: center;
            white-space: nowrap;
            max-width: 400px;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        /* ================== LOADING ANIMATION ================== */
        .lightbox-loading {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: var(--primary-gold);
            font-size: 2rem;
            z-index: 10000;
        }

        .loading-spinner-lightbox {
            animation: spin 1s linear infinite;
        }

        /* ================== RESPONSIVE LIGHTBOX ================== */
        @media (max-width: 768px) {
            .lightbox-container {
                padding: 1rem;
            }

            .lightbox-content {
                max-width: 95%;
                max-height: 80%;
            }

            .lightbox-close {
                top: 5px;
                right: 5px;
                width: 35px;
                height: 35px;
                font-size: 1.2rem;
            }

            .lightbox-nav {
                padding: 0.8rem 1rem;
                font-size: 1.2rem;
                border-radius: 10px;
            }

            .lightbox-prev {
                left: 1rem;
            }

            .lightbox-next {
                right: 1rem;
            }

            .lightbox-counter {
                bottom: 1rem;
                padding: 0.6rem 1rem;
                font-size: 0.9rem;
            }

            .lightbox-title {
                top: 1rem;
                left: 50%;
                transform: translateX(-50%);
                max-width: calc(100% - 100px);
                font-size: 0.9rem;
                padding: 0.6rem 1rem;
            }
        }

        @media (max-width: 576px) {
            .lightbox-nav {
                padding: 0.6rem 0.8rem;
                font-size: 1rem;
            }

            .lightbox-prev {
                left: 0.5rem;
            }

            .lightbox-next {
                right: 0.5rem;
            }

            .lightbox-close {
                top: 3px;
                right: 3px;
                width: 30px;
                height: 30px;
                font-size: 1rem;
            }
        }

        /* ================== SCROLL INFINI MOBILE ================== */
        @media (max-width: 768px) {
            .portfolio-pagination {
                display: none; /* Masquer la pagination classique sur mobile */
            }
            
            .scroll-container {
                position: relative;
                min-height: 60vh;
            }

            .loading-spinner {
                display: none;
                text-align: center;
                padding: 2rem;
            }

            .loading-spinner.active {
                display: block;
            }

            .spinner {
                width: 50px;
                height: 50px;
                border: 4px solid rgba(212, 175, 55, 0.2);
                border-top: 4px solid var(--primary-gold);
                border-radius: 50%;
                animation: spin 1s linear infinite;
                margin: 0 auto 1rem;
            }

            .portfolio-grid {
                grid-template-columns: 1fr;
                gap: 1rem;
            }

            .end-message {
                text-align: center;
                padding: 2rem;
                color: var(--dark-gray);
                font-style: italic;
                display: none;
            }

            .end-message.active {
                display: block;
            }
        }
    </style>
@endpush

@section('content')

    <!-- Hero Banner -->
    <section class="portfolio-hero">
        <div class="container">
            <div class="portfolio-hero-content">
                <div class="hero-icon">
                    <i class="fas fa-building"></i>
                </div>
                <h1>
                    @if ($categorie && $categorie !== 'tous')
                        Portfolio - {{ ucfirst($categorie) }}
                    @else
                        Notre Portfolio
                    @endif
                </h1>
                {{-- <div class="portfolio-description">
                    @if ($categorie && $categorie !== 'tous')
                        Découvrez nos {{ $categorie }} exceptionnelles qui témoignent de notre savoir-faire.
                    @else
                        Découvrez l'ensemble de nos réalisations : villas de luxe, duplex modernes et appartements haut de
                        gamme.
                    @endif
                </div> --}}
            </div>
        </div>
    </section>

    <!-- Breadcrumb -->
    <section class="breadcrumb-section">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-custom">
                    <li class="breadcrumb-item">
                        <a href="{{ route('page.accueil') }}">
                            <i class="fas fa-home me-1"></i>Accueil
                        </a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        Portfolio
                        @if ($categorie && $categorie !== 'tous')
                            - {{ ucfirst($categorie) }}
                        @endif
                    </li>
                </ol>
            </nav>
        </div>
    </section>

    <!-- Section Portfolio -->
    <section class="portfolio-section">
        <div class="container">
            <!-- Filtres avec compteurs -->
            <div class="portfolio-filters">
                <a href="{{ route('page.portfolios', ['categorie' => 'tous']) }}" 
                   class="filter-btn {{ $categorie === 'tous' ? 'active' : '' }}">
                    Tous
                    <span class="filter-count">{{ $categoriesWithCount['tous'] ?? 0 }}</span>
                </a>

                @foreach ($categoriesWithCount as $cat => $count)
                    @if ($cat !== 'tous')
                        <a href="{{ route('page.portfolios', ['categorie' => $cat]) }}"
                           class="filter-btn {{ $categorie === $cat ? 'active' : '' }}">
                            {{ ucfirst($cat) }}
                            <span class="filter-count">{{ $count }}</span>
                        </a>
                    @endif
                @endforeach
            </div>

            <!-- Résultats et pagination -->
            <div class="portfolio-results">
                @if($portfolios->count() > 0)
                    <!-- Informations sur les résultats -->
                    <div class="results-info mb-4">
                        <p class="text-muted">
                            <strong><span id="total-count">{{ $portfolios->total() }}</span></strong> projet(s) trouvé(s)
                            @if($categorie !== 'tous')
                                dans la catégorie <strong>{{ ucfirst($categorie) }}</strong>
                            @endif
                            <span class="d-none d-md-inline">(Page {{ $portfolios->currentPage() }} sur {{ $portfolios->lastPage() }})</span>
                        </p>
                    </div>

                    <!-- Container pour scroll infini mobile -->
                    <div class="scroll-container">
                        <!-- Grid Portfolio -->
                        <div class="portfolio-grid" id="portfolio-grid">
                            @foreach($portfolios as $index => $portfolio)
                                <div class="portfolio-card" data-category="{{ $portfolio->categorie }}"
                                     data-aos="fade-up" data-aos-delay="{{ ($index % 9) * 100 }}">
                                    <div class="portfolio-image">
                                        <!-- Étiquette de catégorie sur l'image -->
                                        <div class="category-badge">{{ ucfirst($portfolio->categorie) }}</div>

                                        @if ($portfolio->getFirstMediaUrl('image_principale'))
                                            <img src="{{ $portfolio->getFirstMediaUrl('image_principale') }}"
                                                 alt="{{ $portfolio->libelle }}" loading="lazy">
                                        @else
                                            <img src="https://via.placeholder.com/350x250/cccccc/000000?text=Image+Non+Disponible"
                                                 alt="{{ $portfolio->libelle }}" loading="lazy">
                                        @endif

                                        <div class="portfolio-overlay">
                                            <div class="portfolio-actions">
                                                <button class="action-btn" onclick="openLightbox({{ $portfolio->id }})"
                                                        title="Voir la galerie">
                                                    <i class="fas fa-images"></i>
                                                </button>
                                                <button class="action-btn" onclick="openPortfolioModal({{ $portfolio->id }})"
                                                        title="Voir les détails">
                                                    <i class="fas fa-eye"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="portfolio-content">
                                        <div class="portfolio-type">{{ ucfirst($portfolio->type) }}</div>
                                        <h3 class="portfolio-title">{{ $portfolio->libelle }}</h3>
                                        <div class="portfolio-location">
                                            <i class="fas fa-map-marker-alt"></i>
                                            {{ $portfolio->localisation }}
                                        </div>
                                        <div class="portfolio-features">{{ $portfolio->caracteristique }}</div>
                                    </div>

                                    <!-- Data pour lightbox et modal -->
                                    <script type="application/json" class="portfolio-data" data-portfolio-id="{{ $portfolio->id }}">
                                    {
                                        "id": {{ $portfolio->id }},
                                        "title": "{{ addslashes($portfolio->libelle) }}",
                                        "type": "{{ addslashes($portfolio->type) }}",
                                        "categorie": "{{ addslashes($portfolio->categorie) }}",
                                        "localisation": "{{ addslashes($portfolio->localisation) }}",
                                        "caracteristique": "{{ addslashes($portfolio->caracteristique) }}",
                                        "prix": "{{ number_format($portfolio->prix, 0, ',', ' ') }} FCFA",
                                        "images": [
                                            @php
                                                $images = [];
                                                if($portfolio->getFirstMediaUrl('image_principale')) {
                                                    $images[] = $portfolio->getFirstMediaUrl('image_principale');
                                                }
                                                foreach($portfolio->getMedia('galerie') as $media) {
                                                    $images[] = $media->getUrl();
                                                }
                                            @endphp
                                            @foreach($images as $image)
                                                "{{ addslashes($image) }}"{{ !$loop->last ? ',' : '' }}
                                            @endforeach
                                        ]
                                    }
                                    </script>
                                </div>
                            @endforeach
                        </div>

                        <!-- Loading spinner pour mobile -->
                        <div class="loading-spinner" id="loading-spinner">
                            <div class="spinner"></div>
                            <p>Chargement...</p>
                        </div>

                        <!-- Message de fin -->
                        <div class="end-message" id="end-message">
                            <p>Vous avez vu tous les portfolios disponibles !</p>
                        </div>
                    </div>

                    <!-- Pagination desktop -->
                    @if($portfolios->hasPages())
                        <nav class="portfolio-pagination mt-5 d-none d-md-block" aria-label="Pagination des portfolios">
                            <ul class="pagination justify-content-center">
                                <!-- Page précédente -->
                                <li class="page-item {{ $portfolios->onFirstPage() ? 'disabled' : '' }}">
                                    <a class="page-link" 
                                       href="{{ $portfolios->previousPageUrl() ?? '#' }}" 
                                       aria-label="Page précédente">
                                        <i class="fas fa-chevron-left"></i>
                                    </a>
                                </li>
                                
                                <!-- Première page -->
                                @if($portfolios->currentPage() > 3)
                                    <li class="page-item">
                                        <a class="page-link" href="{{ $portfolios->url(1) }}">1</a>
                                    </li>
                                    @if($portfolios->currentPage() > 4)
                                        <li class="page-item disabled">
                                            <span class="page-link">...</span>
                                        </li>
                                    @endif
                                @endif
                                
                                <!-- Pages autour de la page actuelle -->
                                @foreach(range(max(1, $portfolios->currentPage() - 2), min($portfolios->lastPage(), $portfolios->currentPage() + 2)) as $page)
                                    <li class="page-item {{ $page == $portfolios->currentPage() ? 'active' : '' }}">
                                        <a class="page-link" href="{{ $portfolios->url($page) }}">{{ $page }}</a>
                                    </li>
                                @endforeach
                                
                                <!-- Dernière page -->
                                @if($portfolios->currentPage() < $portfolios->lastPage() - 2)
                                    @if($portfolios->currentPage() < $portfolios->lastPage() - 3)
                                        <li class="page-item disabled">
                                            <span class="page-link">...</span>
                                        </li>
                                    @endif
                                    <li class="page-item">
                                        <a class="page-link" href="{{ $portfolios->url($portfolios->lastPage()) }}">{{ $portfolios->lastPage() }}</a>
                                    </li>
                                @endif
                                
                                <!-- Page suivante -->
                                <li class="page-item {{ !$portfolios->hasMorePages() ? 'disabled' : '' }}">
                                    <a class="page-link" 
                                       href="{{ $portfolios->nextPageUrl() ?? '#' }}" 
                                       aria-label="Page suivante">
                                        <i class="fas fa-chevron-right"></i>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    @endif
                @else
                    <!-- Aucun résultat -->
                    <div class="no-results text-center py-5">
                        <i class="fas fa-search fa-3x text-muted mb-3"></i>
                        <h4>Aucun portfolio trouvé</h4>
                        <p class="text-muted">
                            @if ($categorie !== 'tous')
                                Aucun projet trouvé dans la catégorie "<strong>{{ ucfirst($categorie) }}</strong>".
                                <br>
                                <a href="{{ route('page.portfolios') }}" class="btn btn-outline-primary mt-2">
                                    Voir tous les projets
                                </a>
                            @else
                                Nos projets seront bientôt disponibles.
                            @endif
                        </p>
                    </div>
                @endif
            </div>
        </div>
    </section>

    <!-- Modal détails portfolio -->
    <div class="portfolio-modal" id="portfolioModal">
        <div class="modal-content">
            <button class="modal-close" onclick="closePortfolioModal()">×</button>
            <div class="modal-header">
                <img id="modalImage" src="" alt="">
            </div>
            <div class="modal-body">
                <h2 class="modal-title" id="modalTitle"></h2>
                <div class="modal-details">
                    <div class="modal-detail-item">
                        <i class="fas fa-tag"></i>
                        <span id="modalType"></span>
                    </div>
                    <div class="modal-detail-item">
                        <i class="fas fa-folder"></i>
                        <span id="modalCategorie"></span>
                    </div>
                    <div class="modal-detail-item">
                        <i class="fas fa-map-marker-alt"></i>
                        <span id="modalLocation"></span>
                    </div>
                </div>
                <div class="modal-description" id="modalDescription"></div>
                <button class="modal-gallery-btn" onclick="openLightboxFromModal()">
                    <i class="fas fa-images me-2"></i>Voir la galerie complète
                </button>
            </div>
        </div>
    </div>

    <!-- Lightbox galerie améliorée -->
    <div class="lightbox" id="lightbox">
        <div class="lightbox-container">
            <div class="lightbox-loading" id="lightbox-loading">
                <i class="fas fa-spinner loading-spinner-lightbox"></i>
            </div>
            
            <div class="lightbox-close" onclick="closeLightbox()" title="Fermer">
                <i class="fas fa-times"></i>
            </div>
            
            <div class="lightbox-title" id="lightboxTitle"></div>
            <button class="lightbox-nav lightbox-prev" id="lightboxPrev" onclick="prevImage()"
                title="Image précédente">
                <i class="fas fa-chevron-left"></i>
            </button>
            <img class="lightbox-image" id="lightboxImage" src="" alt="" style="display: none;">
            <button class="lightbox-nav lightbox-next" id="lightboxNext" onclick="nextImage()"
                title="Image suivante">
                <i class="fas fa-chevron-right"></i>
            </button>
            <div class="lightbox-counter">
                <span id="currentImageIndex">1</span> / <span id="totalImages">1</span>
            </div>
        </div>
    </div>

    @include('frontend.components.boutton_form_projet')

    <script>
        // Variables globales
        let currentGallery = [];
        let currentImageIndex = 0;
        let currentTitle = '';
        let currentPortfolioData = null;

        // Variables pour scroll infini mobile
        let currentPage = {{ $portfolios->currentPage() }};
        let lastPage = {{ $portfolios->lastPage() }};
        let isLoading = false;
        let currentCategory = '{{ $categorie }}';

        // ================== SCROLL INFINI MOBILE ==================
        function initInfiniteScroll() {
            if (window.innerWidth <= 768 && currentPage < lastPage) {
                let isNearBottom = false;
                
                window.addEventListener('scroll', function() {
                    const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
                    const windowHeight = window.innerHeight;
                    const docHeight = document.documentElement.scrollHeight;
                    
                    // Calculer si on est proche du bas (80% du scroll)
                    const scrollPercent = (scrollTop + windowHeight) / docHeight;
                    
                    if (scrollPercent >= 0.8 && !isLoading && currentPage < lastPage && !isNearBottom) {
                        isNearBottom = true;
                        loadMorePortfolios();
                    }
                    
                    // Reset du flag quand on remonte
                    if (scrollPercent < 0.7) {
                        isNearBottom = false;
                    }
                });
            }
        }

        function loadMorePortfolios() {
            if (isLoading || currentPage >= lastPage) return;
            
            isLoading = true;
            const loadingSpinner = document.getElementById('loading-spinner');
            loadingSpinner.classList.add('active');
            
            const nextPage = currentPage + 1;
            const url = `{{ route('page.portfolios') }}?categorie=${currentCategory}&page=${nextPage}`;
            
            fetch(url, {
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'Accept': 'application/json'
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.html) {
                    const portfolioGrid = document.getElementById('portfolio-grid');
                    const tempDiv = document.createElement('div');
                    tempDiv.innerHTML = data.html;
                    
                    // Ajouter les nouveaux portfolios avec animation
                    const newCards = tempDiv.querySelectorAll('.portfolio-card');
                    newCards.forEach((card, index) => {
                        card.style.opacity = '0';
                        card.style.transform = 'translateY(30px)';
                        portfolioGrid.appendChild(card);
                        
                        // Animation d'apparition
                        setTimeout(() => {
                            card.style.transition = 'all 0.6s ease-out';
                            card.style.opacity = '1';
                            card.style.transform = 'translateY(0)';
                        }, index * 100);
                    });
                    
                    currentPage = nextPage;
                    
                    // Mettre à jour le compteur
                    const totalCountSpan = document.getElementById('total-count');
                    if (totalCountSpan && data.total) {
                        totalCountSpan.textContent = data.total;
                    }
                }
                
                if (currentPage >= lastPage) {
                    document.getElementById('end-message').classList.add('active');
                }
            })
            .catch(error => {
                console.error('Erreur lors du chargement:', error);
            })
            .finally(() => {
                isLoading = false;
                loadingSpinner.classList.remove('active');
            });
        }

        // ================== MODAL PORTFOLIO ==================
        function openPortfolioModal(portfolioId) {
            const scriptTag = document.querySelector(`[data-portfolio-id="${portfolioId}"]`);
            if (!scriptTag) {
                console.error('Portfolio non trouvé');
                return;
            }

            try {
                currentPortfolioData = JSON.parse(scriptTag.textContent);
                const modal = document.getElementById('portfolioModal');

                document.getElementById('modalImage').src = currentPortfolioData.images[0] ||
                    'https://via.placeholder.com/800x300/cccccc/000000?text=Image+Non+Disponible';
                document.getElementById('modalTitle').textContent = currentPortfolioData.title;
                document.getElementById('modalType').textContent = currentPortfolioData.type;
                document.getElementById('modalCategorie').textContent = currentPortfolioData.categorie;
                document.getElementById('modalLocation').textContent = currentPortfolioData.localisation;
                document.getElementById('modalDescription').textContent = currentPortfolioData.caracteristique;

                modal.classList.add('active');
                document.body.style.overflow = 'hidden';
            } catch (error) {
                console.error('Erreur lors de l\'ouverture du modal:', error);
            }
        }

        function closePortfolioModal() {
            const modal = document.getElementById('portfolioModal');
            modal.classList.remove('active');
            document.body.style.overflow = 'auto';
        }

        function openLightboxFromModal() {
            closePortfolioModal();
            if (currentPortfolioData) {
                openLightboxWithData(currentPortfolioData);
            }
        }

        // ================== LIGHTBOX GALERIE AMÉLIORÉ ==================
        function openLightbox(portfolioId) {
            const scriptTag = document.querySelector(`[data-portfolio-id="${portfolioId}"]`);
            if (!scriptTag) {
                console.error('Portfolio non trouvé');
                return;
            }

            try {
                const data = JSON.parse(scriptTag.textContent);
                openLightboxWithData(data);
            } catch (error) {
                console.error('Erreur lors de l\'ouverture du lightbox:', error);
            }
        }

        function openLightboxWithData(data) {
            currentGallery = data.images;
            currentTitle = data.title;
            currentImageIndex = 0;

            if (currentGallery.length === 0) {
                console.error('Aucune image disponible');
                return;
            }

            const lightbox = document.getElementById('lightbox');
            lightbox.style.display = 'block';
            document.body.style.overflow = 'hidden';

            setTimeout(() => {
                lightbox.classList.add('active');
            }, 10);

            updateLightboxImage();
        }

        function closeLightbox() {
            const lightbox = document.getElementById('lightbox');
            const lightboxImage = document.getElementById('lightboxImage');

            lightbox.classList.add('closing');

            setTimeout(() => {
                lightbox.style.display = 'none';
                lightbox.classList.remove('active', 'closing');
                document.body.style.overflow = 'auto';
                lightboxImage.classList.remove('loaded');
            }, 300);
        }

        function nextImage() {
            if (currentImageIndex < currentGallery.length - 1) {
                currentImageIndex++;
                updateLightboxImage();
            }
        }

        function prevImage() {
            if (currentImageIndex > 0) {
                currentImageIndex--;
                updateLightboxImage();
            }
        }

        function updateLightboxImage() {
            const lightboxImage = document.getElementById('lightboxImage');
            const lightboxTitle = document.getElementById('lightboxTitle');
            const currentIndexSpan = document.getElementById('currentImageIndex');
            const totalImagesSpan = document.getElementById('totalImages');
            const prevBtn = document.getElementById('lightboxPrev');
            const nextBtn = document.getElementById('lightboxNext');
            const lightboxLoading = document.getElementById('lightbox-loading');

            // Afficher le loading
            lightboxLoading.style.display = 'block';
            lightboxImage.style.display = 'none';
            lightboxImage.classList.remove('loaded');

            // Charger l'image
            const img = new Image();
            img.onload = function() {
                lightboxImage.src = currentGallery[currentImageIndex];
                lightboxLoading.style.display = 'none';
                lightboxImage.style.display = 'block';
                lightboxImage.classList.add('loaded');

                // Mettre à jour les infos
                lightboxTitle.textContent = currentTitle;
                currentIndexSpan.textContent = currentImageIndex + 1;
                totalImagesSpan.textContent = currentGallery.length;

                // Gérer les boutons de navigation
                prevBtn.disabled = currentImageIndex === 0;
                nextBtn.disabled = currentImageIndex === currentGallery.length - 1;
            };
            img.src = currentGallery[currentImageIndex];
        }

        // ================== GESTION DES ÉVÉNEMENTS ==================
        document.addEventListener('keydown', function(e) {
            if (document.getElementById('lightbox').classList.contains('active')) {
                e.preventDefault();

                switch (e.key) {
                    case 'Escape':
                        closeLightbox();
                        break;
                    case 'ArrowRight':
                        nextImage();
                        break;
                    case 'ArrowLeft':
                        prevImage();
                        break;
                    case ' ': // Espace
                        nextImage();
                        break;
                }
            }

            if (document.getElementById('portfolioModal').classList.contains('active')) {
                if (e.key === 'Escape') {
                    closePortfolioModal();
                }
            }
        });

        // Fermeture par clic extérieur
        document.getElementById('lightbox').addEventListener('click', function(e) {
            if (e.target === this || e.target.classList.contains('lightbox-container')) {
                closeLightbox();
            }
        });

        document.getElementById('portfolioModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closePortfolioModal();
            }
        });

        // Navigation tactile pour lightbox
        let touchStartX = 0;
        let touchEndX = 0;

        document.getElementById('lightbox').addEventListener('touchstart', e => {
            touchStartX = e.changedTouches[0].screenX;
        });

        document.getElementById('lightbox').addEventListener('touchend', e => {
            touchEndX = e.changedTouches[0].screenX;
            handleSwipe();
        });

        function handleSwipe() {
            const swipeThreshold = 50;
            const diff = touchStartX - touchEndX;
            
            if (Math.abs(diff) > swipeThreshold) {
                if (diff > 0) {
                    nextImage(); // Swipe left, next image
                } else {
                    prevImage(); // Swipe right, previous image
                }
            }
        }

        // ================== INITIALISATION ==================
        document.addEventListener('DOMContentLoaded', function() {
            initInfiniteScroll();
            
            // Réinitialiser lors du redimensionnement
            window.addEventListener('resize', function() {
                if (window.innerWidth > 768) {
                    window.removeEventListener('scroll', loadMorePortfolios);
                } else {
                    initInfiniteScroll();
                }
            });
        });
    </script>

@endsection
