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

        /* ================== FILTRES PORTFOLIO ================== */
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
        }

        .filter-btn.active,
        .filter-btn:hover {
            background: var(--gradient-gold);
            color: var(--dark-brown);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(212, 175, 55, 0.3);
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

        /* ================== LIGHTBOX ================== */
        .lightbox {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.9);
            z-index: 9999;
        }

        .lightbox.active {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .lightbox-content {
            position: relative;
            max-width: 90%;
            max-height: 90%;
        }

        .lightbox-image {
            width: 100%;
            height: 100%;
            object-fit: contain;
            border-radius: 10px;
        }

        .lightbox-close {
            position: absolute;
            top: -50px;
            right: 0;
            color: white;
            font-size: 2rem;
            cursor: pointer;
            background: none;
            border: none;
            padding: 10px;
        }

        .lightbox-nav {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background: rgba(255, 255, 255, 0.2);
            border: none;
            color: white;
            font-size: 2rem;
            padding: 1rem;
            border-radius: 50%;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        .lightbox-nav:hover {
            background: rgba(255, 255, 255, 0.3);
        }

        .lightbox-prev {
            left: -80px;
        }

        .lightbox-next {
            right: -80px;
        }

        .lightbox-counter {
            position: absolute;
            bottom: -50px;
            left: 50%;
            transform: translateX(-50%);
            color: white;
            font-size: 1.1rem;
            background: rgba(0, 0, 0, 0.5);
            padding: 0.5rem 1rem;
            border-radius: 20px;
        }

        /* ================== PAGINATION ================== */
        .portfolio-pagination {
            display: flex;
            justify-content: center;
            margin-top: 3rem;
        }

        .pagination-custom {
            display: flex;
            gap: 0.5rem;
        }

        .page-link-custom {
            padding: 0.8rem 1.2rem;
            border: 2px solid var(--primary-gold);
            background: transparent;
            color: var(--dark-brown);
            text-decoration: none;
            border-radius: 10px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .page-link-custom:hover,
        .page-link-custom.active {
            background: var(--gradient-gold);
            color: var(--dark-brown);
            text-decoration: none;
            transform: translateY(-2px);
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

            .lightbox-nav {
                display: none;
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

            .lightbox-content {
                max-width: 95%;
                max-height: 80%;
            }

            .lightbox-close {
                top: -40px;
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
                        Découvrez nos {{ $categorie }} exceptionnelles qui témoignent de notre savoir-faire et de notre engagement envers l'excellence.
                    @else
                        Découvrez nos réalisations exceptionnelles : villas de luxe, duplex modernes et appartements haut de gamme. 
                        Chaque projet reflète notre engagement envers l'excellence et l'innovation architecturale.
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
                        @if($categorie && $categorie !== 'tous')
                            Portfolio - {{ ucfirst($categorie) }}
                        @else
                            Portfolio
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

            <!-- Filtres -->
            <div class="portfolio-filters">
                <button class="filter-btn {{ !$categorie || $categorie === 'tous' ? 'active' : '' }}" data-filter="*">
                    Tous
                </button>
                @foreach($categories as $cat)
                    <button class="filter-btn {{ $categorie === $cat ? 'active' : '' }}" data-filter="{{ $cat }}">
                        {{ ucfirst($cat) }}
                    </button>
                @endforeach
            </div>

            <!-- Grid Portfolio -->
            <div class="portfolio-grid" id="portfolioGrid">
                @forelse($portfolios as $portfolio)
                    <div class="portfolio-card" data-category="{{ $portfolio->categorie }}">
                        <div class="portfolio-image">
                            @if ($portfolio->getFirstMediaUrl('image_principale'))
                                <img src="{{ $portfolio->getFirstMediaUrl('image_principale') }}"
                                    alt="{{ $portfolio->libelle }}">
                            @else
                                <img src="https://via.placeholder.com/350x250/cccccc/000000?text=Image+Non+Disponible"
                                    alt="{{ $portfolio->libelle }}">
                            @endif
                            <div class="portfolio-overlay">
                                <div class="portfolio-actions">
                                    <button class="action-btn" onclick="openLightbox({{ $portfolio->id }})"
                                        title="Voir la galerie">
                                        <i class="fas fa-images"></i>
                                    </button>
                                    <button class="action-btn" onclick="viewDetails({{ $portfolio->id }})"
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
                            <div class="portfolio-price">{{ number_format($portfolio->prix, 0, ',', ' ') }} FCFA</div>
                        </div>

                        <!-- Data pour lightbox -->
                        <script type="application/json" class="gallery-data">
                        {
                            "id": {{ $portfolio->id }},
                            "title": "{{ $portfolio->libelle }}",
                            "images": [
                                @if($portfolio->getFirstMediaUrl('image_principale'))
                                    "{{ $portfolio->getFirstMediaUrl('image_principale') }}",
                                @endif
                                @foreach($portfolio->getMedia('galerie') as $media)
                                    "{{ $media->getUrl() }}"{{ !$loop->last ? ',' : '' }}
                                @endforeach
                            ]
                        }
                    </script>
                    </div>
                @empty
                    <div class="col-12 text-center py-5">
                        <i class="fas fa-info-circle fa-3x text-muted mb-3"></i>
                        <h4>Aucun portfolio disponible</h4>
                        <p class="text-muted">Nos projets seront bientôt disponibles.</p>
                    </div>
                @endforelse
            </div>

            <!-- Pagination -->
            @if ($portfolios->hasPages())
                <div class="portfolio-pagination">
                    <div class="pagination-custom">
                        @if ($portfolios->onFirstPage())
                            <span class="page-link-custom disabled">Précédent</span>
                        @else
                            <a href="{{ $portfolios->previousPageUrl() }}" class="page-link-custom">Précédent</a>
                        @endif

                        @for ($i = 1; $i <= $portfolios->lastPage(); $i++)
                            @if ($i == $portfolios->currentPage())
                                <span class="page-link-custom active">{{ $i }}</span>
                            @else
                                <a href="{{ $portfolios->url($i) }}" class="page-link-custom">{{ $i }}</a>
                            @endif
                        @endfor

                        @if ($portfolios->hasMorePages())
                            <a href="{{ $portfolios->nextPageUrl() }}" class="page-link-custom">Suivant</a>
                        @else
                            <span class="page-link-custom disabled">Suivant</span>
                        @endif
                    </div>
                </div>
            @endif
        </div>
    </section>

    <!-- Lightbox -->
    <div class="lightbox" id="lightbox">
        <div class="lightbox-content">
            <button class="lightbox-close" onclick="closeLightbox()">×</button>
            <button class="lightbox-nav lightbox-prev" onclick="prevImage()">‹</button>
            <img class="lightbox-image" id="lightboxImage" src="" alt="">
            <button class="lightbox-nav lightbox-next" onclick="nextImage()">›</button>
            <div class="lightbox-counter">
                <span id="currentImageIndex">1</span> / <span id="totalImages">1</span>
            </div>
        </div>
    </div>

    <script>
        // Variables globales pour le lightbox
        let currentGallery = [];
        let currentImageIndex = 0;

        // Filtrage des portfolios
        document.addEventListener('DOMContentLoaded', function() {
            const filterBtns = document.querySelectorAll('.filter-btn');
            const portfolioCards = document.querySelectorAll('.portfolio-card');

            filterBtns.forEach(btn => {
                btn.addEventListener('click', () => {
                    // Retirer la classe active de tous les boutons
                    filterBtns.forEach(b => b.classList.remove('active'));
                    // Ajouter la classe active au bouton cliqué
                    btn.classList.add('active');

                    const filter = btn.getAttribute('data-filter');

                    portfolioCards.forEach(card => {
                        if (filter === '*' || card.getAttribute('data-category') ===
                            filter) {
                            card.style.display = 'block';
                            card.style.animation = 'fadeInUp 0.6s ease-out forwards';
                        } else {
                            card.style.display = 'none';
                        }
                    });
                });
            });
        });

        // Fonction pour ouvrir le lightbox
        function openLightbox(portfolioId) {
            const portfolioCard = document.querySelector(`[data-category] .gallery-data`);
            const allCards = document.querySelectorAll('.portfolio-card');

            let targetCard = null;
            allCards.forEach(card => {
                const scriptTag = card.querySelector('.gallery-data');
                if (scriptTag) {
                    const data = JSON.parse(scriptTag.textContent);
                    if (data.id === portfolioId) {
                        targetCard = card;
                        currentGallery = data.images;
                    }
                }
            });

            if (currentGallery.length > 0) {
                currentImageIndex = 0;
                updateLightboxImage();
                document.getElementById('lightbox').classList.add('active');
                document.body.style.overflow = 'hidden';
            }
        }

        // Fonction pour fermer le lightbox
        function closeLightbox() {
            document.getElementById('lightbox').classList.remove('active');
            document.body.style.overflow = 'auto';
        }

        // Navigation dans la galerie
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

        // Mettre à jour l'image du lightbox
        function updateLightboxImage() {
            const lightboxImage = document.getElementById('lightboxImage');
            const currentIndexSpan = document.getElementById('currentImageIndex');
            const totalImagesSpan = document.getElementById('totalImages');

            lightboxImage.src = currentGallery[currentImageIndex];
            currentIndexSpan.textContent = currentImageIndex + 1;
            totalImagesSpan.textContent = currentGallery.length;
        }

        // Navigation au clavier
        document.addEventListener('keydown', function(e) {
            if (document.getElementById('lightbox').classList.contains('active')) {
                if (e.key === 'Escape') {
                    closeLightbox();
                } else if (e.key === 'ArrowRight') {
                    nextImage();
                } else if (e.key === 'ArrowLeft') {
                    prevImage();
                }
            }
        });

        // Fermer le lightbox en cliquant à l'extérieur
        document.getElementById('lightbox').addEventListener('click', function(e) {
            if (e.target === this) {
                closeLightbox();
            }
        });

        // Fonction pour voir les détails (à implémenter selon vos besoins)
        function viewDetails(portfolioId) {
            // Rediriger vers la page de détails ou ouvrir un modal
            console.log('Voir détails du portfolio:', portfolioId);
            // window.location.href = `/portfolio/${portfolioId}`;
        }
    </script>

@endsection
