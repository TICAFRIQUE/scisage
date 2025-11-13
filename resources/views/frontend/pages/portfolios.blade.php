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

    /* ================== OPTIMISATIONS LIGHTBOX ================== */
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

    /* Loading spinner pour les images */
    .lightbox-loading {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 50px;
        height: 50px;
        border: 3px solid rgba(255, 255, 255, 0.3);
        border-top: 3px solid white;
        border-radius: 50%;
        animation: spin 1s linear infinite;
    }

    @keyframes spin {
        0% { transform: translate(-50%, -50%) rotate(0deg); }
        100% { transform: translate(-50%, -50%) rotate(360deg); }
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
            padding: 15px 10px;
            font-size: 1.5rem;
        }

        .lightbox-prev {
            left: -60px;
        }

        .lightbox-next {
            right: -60px;
        }

        .lightbox-close {
            top: -40px;
            right: -40px;
            font-size: 1.5rem;
            width: 40px;
            height: 40px;
            padding: 10px;
        }

        .lightbox-title {
            top: -50px;
            font-size: 1rem;
            max-width: 300px;
        }

        .lightbox-counter {
            bottom: -50px;
            font-size: 1rem;
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

        .lightbox-close {
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
               class="filter-btn {{ $categorie === 'tous' ? 'active' : '' }}">
                Tous
                <span class="filter-count">{{ $categoriesWithCount['tous'] ?? 0 }}</span>
            </a>
            
            @foreach($categoriesWithCount as $cat => $count)
                @if($cat !== 'tous')
                    <a href="{{ route('page.portfolios', ['categorie' => $cat]) }}" 
                       class="filter-btn {{ $categorie === $cat ? 'active' : '' }}">
                        {{ ucfirst($cat) }}
                        <span class="filter-count">{{ $count }}</span>
                    </a>
                @endif
            @endforeach
        </div>

        <!-- Grid Portfolio -->
        <div class="portfolio-grid" id="portfolioGrid">
            @forelse($portfolios as $index => $portfolio)
                <div class="portfolio-card" data-category="{{ $portfolio->categorie }}" style="animation-delay: {{ $index * 0.1 }}s">
                    <div class="portfolio-image">
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
                                <button class="action-btn" onclick="viewDetails({{ $portfolio->id }})" title="Voir les détails">
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

                    <!-- Data optimisée pour lightbox -->
                    <script type="application/json" class="gallery-data" data-portfolio-id="{{ $portfolio->id }}">
                        {
                            "id": {{ $portfolio->id }},
                            "title": "{{ addslashes($portfolio->libelle) }}",
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

        <!-- Pagination -->
        @if($portfolios->hasPages())
            <div class="portfolio-pagination">
                <div class="pagination-custom">
                    {{ $portfolios->onEachSide(2)->links('pagination::bootstrap-4') }}
                </div>
            </div>
        @endif
    </div>
</section>

<!-- Lightbox Optimisé -->
<div class="lightbox" id="lightbox">
    <div class="lightbox-content">
        <div class="lightbox-loading" id="lightboxLoading"></div>
        <div class="lightbox-title" id="lightboxTitle"></div>
        <button class="lightbox-close" onclick="closeLightbox()" aria-label="Fermer">×</button>
        <button class="lightbox-nav lightbox-prev" id="lightboxPrev" onclick="prevImage()" aria-label="Image précédente">‹</button>
        <img class="lightbox-image" id="lightboxImage" src="" alt="" style="display: none;">
        <button class="lightbox-nav lightbox-next" id="lightboxNext" onclick="nextImage()" aria-label="Image suivante">›</button>
        <div class="lightbox-counter">
            <span id="currentImageIndex">1</span> / <span id="totalImages">1</span>
        </div>
    </div>
</div>

<script>
// Variables globales optimisées
let currentGallery = [];
let currentImageIndex = 0;
let currentTitle = '';
let imagePreloads = [];

// Préchargement des images
function preloadImage(src) {
    return new Promise((resolve, reject) => {
        const img = new Image();
        img.onload = () => resolve(img);
        img.onerror = reject;
        img.src = src;
    });
}

// Fonction optimisée pour ouvrir le lightbox
async function openLightbox(portfolioId) {
    const scriptTag = document.querySelector(`[data-portfolio-id="${portfolioId}"]`);
    
    if (!scriptTag) {
        console.error('Portfolio non trouvé');
        return;
    }

    try {
        const data = JSON.parse(scriptTag.textContent);
        currentGallery = data.images;
        currentTitle = data.title;
        currentImageIndex = 0;

        if (currentGallery.length === 0) {
            console.error('Aucune image disponible');
            return;
        }

        // Afficher le lightbox
        const lightbox = document.getElementById('lightbox');
        lightbox.style.display = 'flex';
        document.body.style.overflow = 'hidden';
        
        // Animation d'entrée
        setTimeout(() => {
            lightbox.classList.add('active');
        }, 10);

        // Charger la première image
        await updateLightboxImage();
        
        // Précharger les images suivantes en arrière-plan
        preloadNextImages();

    } catch (error) {
        console.error('Erreur lors de l\'ouverture du lightbox:', error);
    }
}

// Fonction optimisée pour fermer le lightbox
function closeLightbox() {
    const lightbox = document.getElementById('lightbox');
    const lightboxImage = document.getElementById('lightboxImage');
    
    lightbox.classList.remove('active');
    
    setTimeout(() => {
        lightbox.style.display = 'none';
        document.body.style.overflow = 'auto';
        lightboxImage.style.display = 'none';
        lightboxImage.classList.remove('loaded');
        
        // Nettoyer les préchargements
        imagePreloads = [];
    }, 300);
}

// Navigation optimisée
async function nextImage() {
    if (currentImageIndex < currentGallery.length - 1) {
        currentImageIndex++;
        await updateLightboxImage();
        preloadNextImages();
    }
}

async function prevImage() {
    if (currentImageIndex > 0) {
        currentImageIndex--;
        await updateLightboxImage();
        preloadNextImages();
    }
}

// Mise à jour optimisée de l'image
async function updateLightboxImage() {
    const lightboxImage = document.getElementById('lightboxImage');
    const lightboxLoading = document.getElementById('lightboxLoading');
    const lightboxTitle = document.getElementById('lightboxTitle');
    const currentIndexSpan = document.getElementById('currentImageIndex');
    const totalImagesSpan = document.getElementById('totalImages');
    const prevBtn = document.getElementById('lightboxPrev');
    const nextBtn = document.getElementById('lightboxNext');

    // Afficher le loading
    lightboxLoading.style.display = 'block';
    lightboxImage.classList.remove('loaded');

    try {
        // Charger l'image
        await preloadImage(currentGallery[currentImageIndex]);
        
        // Masquer le loading
        lightboxLoading.style.display = 'none';
        
        // Afficher l'image avec animation
        lightboxImage.src = currentGallery[currentImageIndex];
        lightboxImage.style.display = 'block';
        
        setTimeout(() => {
            lightboxImage.classList.add('loaded');
        }, 10);

        // Mettre à jour les infos
        lightboxTitle.textContent = currentTitle;
        currentIndexSpan.textContent = currentImageIndex + 1;
        totalImagesSpan.textContent = currentGallery.length;

        // Gérer les boutons de navigation
        prevBtn.disabled = currentImageIndex === 0;
        nextBtn.disabled = currentImageIndex === currentGallery.length - 1;

    } catch (error) {
        console.error('Erreur lors du chargement de l\'image:', error);
        lightboxLoading.style.display = 'none';
        // Afficher une image d'erreur ou un message
        lightboxImage.src = 'data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjAwIiBoZWlnaHQ9IjIwMCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48cmVjdCB3aWR0aD0iMTAwJSIgaGVpZ2h0PSIxMDAlIiBmaWxsPSIjY2NjIi8+PHRleHQgeD0iNTAlIiB5PSI1MCUiIGZvbnQtZmFtaWx5PSJBcmlhbCIgZm9udC1zaXplPSIxNCIgZmlsbD0iIzk5OSIgdGV4dC1hbmNob3I9Im1pZGRsZSIgZHk9Ii4zZW0iPkVycmV1ciBkZSBjaGFyZ2VtZW50PC90ZXh0Pjwvc3ZnPg==';
        lightboxImage.style.display = 'block';
        lightboxImage.classList.add('loaded');
    }
}

// Préchargement intelligent
function preloadNextImages() {
    const indicesToPreload = [];
    
    // Précharger l'image suivante et précédente
    if (currentImageIndex > 0) indicesToPreload.push(currentImageIndex - 1);
    if (currentImageIndex < currentGallery.length - 1) indicesToPreload.push(currentImageIndex + 1);
    
    indicesToPreload.forEach(index => {
        if (index >= 0 && index < currentGallery.length && !imagePreloads[index]) {
            imagePreloads[index] = true;
            preloadImage(currentGallery[index]).catch(() => {
                console.warn(`Impossible de précharger l'image ${index}`);
            });
        }
    });
}

// Gestion des événements clavier optimisée
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
});

// Fermeture par clic extérieur optimisée
document.getElementById('lightbox').addEventListener('click', function(e) {
    if (e.target === this) {
        closeLightbox();
    }
});

// Fonction pour voir les détails
function viewDetails(portfolioId) {
    console.log('Voir détails du portfolio:', portfolioId);
    // Implémenter selon vos besoins
}

// Optimisation du scroll de la pagination
document.addEventListener('DOMContentLoaded', function() {
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
});
</script>

@endsection