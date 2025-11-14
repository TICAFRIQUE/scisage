
@extends('frontend.layouts.app')

@section('title', 'Portfolio - SCI SAGES')

@section('content')

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
        margin-bottom: 1rem;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
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

    .breadcrumb-custom .breadcrumb-item + .breadcrumb-item::before {
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
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
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
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .lightbox.active {
        display: flex;
        align-items: center;
        justify-content: center;
        opacity: 1;
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
        border-radius: 10px;
        opacity: 0;
        transform: scale(0.8);
        transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
    }

    .lightbox-image.loaded {
        opacity: 1;
        transform: scale(1);
    }

    .lightbox-close {
        position: absolute;
        top: -50px;
        right: -50px;
        color: white;
        font-size: 2rem;
        cursor: pointer;
        background: rgba(0, 0, 0, 0.5);
        border: none;
        padding: 15px;
        border-radius: 50%;
        width: 50px;
        height: 50px;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s ease;
    }

    .lightbox-close:hover {
        background: rgba(255, 255, 255, 0.2);
        transform: scale(1.1);
    }

    .lightbox-nav {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        background: rgba(0, 0, 0, 0.5);
        border: none;
        color: white;
        font-size: 2rem;
        padding: 20px 15px;
        border-radius: 8px;
        cursor: pointer;
        transition: all 0.3s ease;
        backdrop-filter: blur(10px);
    }

    .lightbox-nav:hover {
        background: rgba(255, 255, 255, 0.2);
        transform: translateY(-50%) scale(1.1);
    }

    .lightbox-nav:disabled {
        opacity: 0.3;
        cursor: not-allowed;
    }

    .lightbox-prev {
        left: -80px;
    }

    .lightbox-next {
        right: -80px;
    }

    .lightbox-counter {
        position: absolute;
        bottom: -60px;
        left: 50%;
        transform: translateX(-50%);
        color: white;
        font-size: 1.1rem;
        background: rgba(0, 0, 0, 0.7);
        padding: 8px 20px;
        border-radius: 20px;
        backdrop-filter: blur(10px);
    }

    .lightbox-title {
        position: absolute;
        top: -60px;
        left: 50%;
        transform: translateX(-50%);
        color: white;
        font-size: 1.2rem;
        font-weight: 600;
        background: rgba(0, 0, 0, 0.7);
        padding: 10px 20px;
        border-radius: 20px;
        backdrop-filter: blur(10px);
        text-align: center;
        white-space: nowrap;
        max-width: 400px;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    /* ================== RESPONSIVE ================== */
    @media (max-width: 991px) {
        .portfolio-hero {
            height: 45vh;
        }

        .portfolio-hero h1 {
            font-size: 2.5rem;
        }

        .portfolio-grid {
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 1.5rem;
        }

        .section-title {
            font-size: 2rem;
        }

        .modal-content {
            width: 95vw;
            max-height: 85vh;
        }

        .modal-details {
            grid-template-columns: 1fr;
        }
    }

    @media (max-width: 768px) {
        .portfolio-hero {
            height: 40vh;
        }

        .portfolio-hero h1 {
            font-size: 2rem;
        }

        .portfolio-hero .hero-icon {
            font-size: 2.5rem;
        }

        .portfolio-description {
            font-size: 1rem;
            padding: 0 1rem;
        }

        .portfolio-section {
            padding: 60px 0;
        }

        .section-header {
            margin-bottom: 3rem;
        }

        .section-title {
            font-size: 1.8rem;
        }

        .portfolio-filters {
            gap: 0.5rem;
        }

        .filter-btn {
            padding: 0.6rem 1.5rem;
            font-size: 0.9rem;
        }

        .portfolio-grid {
            grid-template-columns: 1fr;
            gap: 1rem;
        }

        .portfolio-content {
            padding: 1.5rem;
        }

        .portfolio-title {
            font-size: 1.1rem;
        }

        .portfolio-price {
            font-size: 1.2rem;
        }

        .category-badge {
            font-size: 0.7rem;
            padding: 0.4rem 0.8rem;
        }

        /* Mobile lightbox */
        .lightbox-nav {
            position: fixed;
            bottom: 20px;
        }

        .lightbox-prev {
            left: 20px;
            bottom: 80px;
        }

        .lightbox-next {
            right: 20px;
            bottom: 80px;
        }

        .lightbox-close {
            top: 20px;
            right: 20px;
        }

        .lightbox-title {
            top: 20px;
            left: 20px;
            transform: none;
            max-width: calc(100% - 100px);
        }

        .lightbox-counter {
            bottom: 20px;
            left: 50%;
            transform: translateX(-50%);
        }

        .lightbox-content {
            max-width: 95%;
            max-height: 80%;
        }
    }

    @media (max-width: 480px) {
        .portfolio-hero h1 {
            font-size: 1.7rem;
        }

        .filter-btn {
            padding: 0.5rem 1rem;
            font-size: 0.8rem;
        }

        .portfolio-content {
            padding: 1.2rem;
        }

        .modal-content {
            width: 98vw;
            max-height: 90vh;
        }

        .modal-body {
            padding: 1.5rem;
        }

        .modal-title {
            font-size: 1.5rem;
        }
    }
</style>

<!-- Hero Banner -->
<section class="portfolio-hero">
    <div class="container">
        <div class="portfolio-hero-content">
            <div class="hero-icon">
                <i class="fas fa-building"></i>
            </div>
            <h1>
                @if($categorie && $categorie !== 'tous')
                    Portfolio - {{ ucfirst($categorie) }}
                @else
                    Notre Portfolio
                @endif
            </h1>
            <div class="portfolio-description">
                @if($categorie && $categorie !== 'tous')
                    Découvrez nos {{ $categorie }} exceptionnelles qui témoignent de notre savoir-faire.
                @else
                    Découvrez l'ensemble de nos réalisations : villas de luxe, duplex modernes et appartements haut de gamme.
                @endif
            </div>
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
                    @if($categorie && $categorie !== 'tous')
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
        <div class="section-header">
            <div class="section-subtitle">Nos Réalisations</div>
            <h2 class="section-title">Projets d'Exception</h2>
        </div>

        <!-- Filtres avec compteurs optimisés -->
        <div class="portfolio-filters">
            <a href="{{ route('page.portfolios') }}" 
               class="filter-btn {{ $categorie === 'tous' ? 'active' : '' }}"
               data-filter="tous">
                Tous
                <span class="filter-count">{{ $categoriesWithCount['tous'] ?? 0 }}</span>
            </a>
            
            @foreach($categoriesWithCount as $cat => $count)
                @if($cat !== 'tous')
                    <a href="{{ route('page.portfolios', ['categorie' => $cat]) }}" 
                       class="filter-btn {{ $categorie === $cat ? 'active' : '' }}"
                       data-filter="{{ $cat }}">
                        {{ ucfirst($cat) }}
                        <span class="filter-count">{{ $count }}</span>
                    </a>
                @endif
            @endforeach
        </div>

        <!-- Container pour scroll infini -->
        <div class="scroll-container">
            <!-- Grid Portfolio -->
            <div class="portfolio-grid" id="portfolioGrid">
                @forelse($portfolios as $index => $portfolio)
                    <div class="portfolio-card" data-category="{{ $portfolio->categorie }}" style="animation-delay: {{ $index * 0.1 }}s">
                        <div class="portfolio-image">
                            <!-- Étiquette de catégorie sur l'image -->
                            <div class="category-badge">{{ ucfirst($portfolio->categorie) }}</div>
                            
                            @if($portfolio->getFirstMediaUrl('image_principale'))
                                <img src="{{ $portfolio->getFirstMediaUrl('image_principale') }}" alt="{{ $portfolio->libelle }}" loading="lazy">
                            @else
                                <img src="https://via.placeholder.com/350x250/cccccc/000000?text=Image+Non+Disponible" alt="{{ $portfolio->libelle }}" loading="lazy">
                            @endif
                            
                            <div class="portfolio-overlay">
                                <div class="portfolio-actions">
                                    <button class="action-btn" onclick="openLightbox({{ $portfolio->id }})" title="Voir la galerie">
                                        <i class="fas fa-images"></i>
                                    </button>
                                    <button class="action-btn" onclick="openPortfolioModal({{ $portfolio->id }})" title="Voir les détails">
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
                            {{-- <div class="portfolio-price">{{ number_format($portfolio->prix, 0, ',', ' ') }} FCFA</div> --}}
                        </div>

                        <!-- Data optimisée pour lightbox et modal -->
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
                @empty
                    <div class="col-12 text-center py-5">
                        <i class="fas fa-info-circle fa-3x text-muted mb-3"></i>
                        <h4>Aucun portfolio disponible</h4>
                        <p class="text-muted">
                            @if($categorie !== 'tous')
                                Aucun projet trouvé dans la catégorie "{{ ucfirst($categorie) }}".
                            @else
                                Nos projets seront bientôt disponibles.
                            @endif
                        </p>
                    </div>
                @endforelse
            </div>

            <!-- Loading spinner pour scroll infini -->
            <div class="loading-spinner" id="loadingSpinner">
                <div class="spinner"></div>
                <p>Chargement de plus de projets...</p>
            </div>
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
                {{-- <div class="modal-detail-item">
                    <i class="fas fa-euro-sign"></i>
                    <span id="modalPrice"></span>
                </div> --}}
            </div>
            <div class="modal-description" id="modalDescription"></div>
            <button class="modal-gallery-btn" onclick="openLightboxFromModal()">
                <i class="fas fa-images me-2"></i>Voir la galerie complète
            </button>
        </div>
    </div>
</div>

<!-- Lightbox galerie -->
<div class="lightbox" id="lightbox">
    <div class="lightbox-content">
        <div class="lightbox-title" id="lightboxTitle"></div>
        <button class="lightbox-close" onclick="closeLightbox()" aria-label="Fermer">×</button>
        <button class="lightbox-nav lightbox-prev" id="lightboxPrev" onclick="prevImage()" aria-label="Image précédente">‹</button>
        <img class="lightbox-image" id="lightboxImage" src="" alt="">
        <button class="lightbox-nav lightbox-next" id="lightboxNext" onclick="nextImage()" aria-label="Image suivante">›</button>
        <div class="lightbox-counter">
            <span id="currentImageIndex">1</span> / <span id="totalImages">1</span>
        </div>
    </div>
</div>

<script>
// Variables globales
let currentGallery = [];
let currentImageIndex = 0;
let currentTitle = '';
let currentPortfolioData = null;
let infiniteScrollEnabled = true;
let loadingMore = false;
let currentPage = {{ $portfolios->currentPage() }};
let lastPage = {{ $portfolios->lastPage() }};
let currentFilter = '{{ $categorie }}';

// ================== SCROLL INFINI ==================
function initInfiniteScroll() {
    if (!infiniteScrollEnabled || currentPage >= lastPage) return;

    window.addEventListener('scroll', throttle(() => {
        if (loadingMore) return;
        
        const scrollPosition = window.innerHeight + window.scrollY;
        const documentHeight = document.documentElement.offsetHeight;
        
        // Charger plus quand on arrive à 200px du bas
        if (scrollPosition >= documentHeight - 200) {
            loadMorePortfolios();
        }
    }, 200));
}

// Throttle function pour optimiser les performances
function throttle(func, delay) {
    let timeoutId;
    let lastExecTime = 0;
    return function (...args) {
        const currentTime = Date.now();
        
        if (currentTime - lastExecTime > delay) {
            func.apply(this, args);
            lastExecTime = currentTime;
        } else {
            clearTimeout(timeoutId);
            timeoutId = setTimeout(() => {
                func.apply(this, args);
                lastExecTime = Date.now();
            }, delay - (currentTime - lastExecTime));
        }
    };
}

// Charger plus de portfolios
async function loadMorePortfolios() {
    if (loadingMore || currentPage >= lastPage) return;
    
    loadingMore = true;
    const spinner = document.getElementById('loadingSpinner');
    spinner.classList.add('active');
    
    try {
        const nextPage = currentPage + 1;
        const url = new URL(window.location.href);
        url.searchParams.set('page', nextPage);
        
        const response = await fetch(url.toString(), {
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        });
        
        if (!response.ok) throw new Error('Erreur de réseau');
        
        const html = await response.text();
        const parser = new DOMParser();
        const doc = parser.parseFromString(html, 'text/html');
        
        // Extraire les nouvelles cartes
        const newCards = doc.querySelectorAll('.portfolio-card');
        const grid = document.getElementById('portfolioGrid');
        
        // Ajouter les nouvelles cartes avec animation
        newCards.forEach((card, index) => {
            card.style.animationDelay = `${index * 0.1}s`;
            grid.appendChild(card);
        });
        
        currentPage = nextPage;
        
        // Vérifier s'il y a encore des pages
        if (currentPage >= lastPage) {
            infiniteScrollEnabled = false;
        }
        
    } catch (error) {
        console.error('Erreur lors du chargement:', error);
    } finally {
        loadingMore = false;
        spinner.classList.remove('active');
    }
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
        
        // Remplir les données du modal
        document.getElementById('modalImage').src = currentPortfolioData.images[0] || 'https://via.placeholder.com/800x300/cccccc/000000?text=Image+Non+Disponible';
        document.getElementById('modalTitle').textContent = currentPortfolioData.title;
        document.getElementById('modalType').textContent = currentPortfolioData.type;
        document.getElementById('modalCategorie').textContent = currentPortfolioData.categorie;
        document.getElementById('modalLocation').textContent = currentPortfolioData.localisation;
        // document.getElementById('modalPrice').textContent = currentPortfolioData.prix;
        document.getElementById('modalDescription').textContent = currentPortfolioData.caracteristique;
        
        // Afficher le modal
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

// ================== LIGHTBOX GALERIE ==================
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
    lightbox.style.display = 'flex';
    document.body.style.overflow = 'hidden';
    
    setTimeout(() => {
        lightbox.classList.add('active');
    }, 10);
    
    updateLightboxImage();
}

function closeLightbox() {
    const lightbox = document.getElementById('lightbox');
    const lightboxImage = document.getElementById('lightboxImage');
    
    lightbox.classList.remove('active');
    
    setTimeout(() => {
        lightbox.style.display = 'none';
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
    
    // Animation de transition
    lightboxImage.classList.remove('loaded');
    
    setTimeout(() => {
        lightboxImage.src = currentGallery[currentImageIndex];
        lightboxImage.classList.add('loaded');
        
        // Mettre à jour les infos
        lightboxTitle.textContent = currentTitle;
        currentIndexSpan.textContent = currentImageIndex + 1;
        totalImagesSpan.textContent = currentGallery.length;
        
        // Gérer les boutons de navigation
        prevBtn.disabled = currentImageIndex === 0;
        nextBtn.disabled = currentImageIndex === currentGallery.length - 1;
    }, 150);
}

// ================== GESTION DES ÉVÉNEMENTS ==================
document.addEventListener('keydown', function(e) {
    if (document.getElementById('lightbox').classList.contains('active')) {
        e.preventDefault();
        
        switch(e.key) {
            case 'Escape':
                closeLightbox();
                break;
            case 'ArrowRight':
                nextImage();
                break;
            case 'ArrowLeft':
                prevImage();
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
    if (e.target === this) {
        closeLightbox();
    }
});

document.getElementById('portfolioModal').addEventListener('click', function(e) {
    if (e.target === this) {
        closePortfolioModal();
    }
});

// ================== INITIALISATION ==================
document.addEventListener('DOMContentLoaded', function() {
    // Initialiser le scroll infini
    initInfiniteScroll();
    
    // Si on vient d'un changement de page, scroller vers les résultats
    const urlParams = new URLSearchParams(window.location.search);
    if (urlParams.has('page') || urlParams.has('categorie')) {
        setTimeout(() => {
            document.querySelector('.portfolio-section').scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
        }, 100);
    }
    
    // Optimisation des filtres pour le scroll infini
    document.querySelectorAll('.filter-btn').forEach(btn => {
        btn.addEventListener('click', function(e) {
            // Réinitialiser les variables de pagination pour le nouveau filtre
            currentPage = 1;
            lastPage = 1; // Sera mis à jour lors du chargement
            infiniteScrollEnabled = true;
            loadingMore = false;
        });
    });
});

// Gestion du scroll avec touch sur mobile
let touchStartY = 0;
let touchEndY = 0;

document.addEventListener('touchstart', function(e) {
    touchStartY = e.changedTouches[0].screenY;
});

document.addEventListener('touchend', function(e) {
    touchEndY = e.changedTouches[0].screenY;
    
    if (document.getElementById('lightbox').classList.contains('active')) {
        const swipeDistance = touchStartY - touchEndY;
        
        // Swipe vers le haut pour image suivante
        if (swipeDistance > 50) {
            nextImage();
        }
        // Swipe vers le bas pour image précédente  
        else if (swipeDistance < -50) {
            prevImage();
        }
    }
});
</script>

@endsection