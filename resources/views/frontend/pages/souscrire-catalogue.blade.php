@extends('frontend.layouts.app')
@section('title', 'Catalogue Maisons de RÃªves - Souscription')

@section('content')
<style>
    :root {
        --primary-gold: #d4af37;
        --secondary-gold: #f4d03f;
        --dark-brown: #3c2415;
        --white: #ffffff;
        --light-gray: #f8f9fa;
        --dark-gray: #6c757d;
        --gradient-gold: linear-gradient(135deg, #d4af37 0%, #f4d03f 100%);
    }

    /* Hero Section */
    .hero-section {
        background: var(--gradient-gold);
        padding: 60px 0;
        padding-top: 120px;
        text-align: center;
    }

    .hero-section h1 {
        font-size: 3rem;
        font-weight: 800;
        color: var(--white);
        text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
        margin-bottom: 1rem;
    }

    .hero-section p {
        font-size: 1.2rem;
        color: var(--white);
        max-width: 600px;
        margin: 0 auto;
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
    }

    /* Houses Grid */
    .houses-section {
        padding: 80px 0;
        background: var(--white);
    }

    .houses-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
        gap: 2rem;
        margin-top: 3rem;
    }

    .house-card {
        background: var(--white);
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 5px 20px rgba(0,0,0,0.1);
        transition: all 0.3s ease;
    }

    .house-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 40px rgba(0,0,0,0.2);
    }

    .house-image {
        position: relative;
        height: 250px;
        overflow: hidden;
    }

    .house-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.3s ease;
    }

    .house-card:hover .house-image img {
        transform: scale(1.05);
    }

    .house-overlay {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(45deg, rgba(212, 175, 55, 0.8), rgba(244, 208, 63, 0.8));
        display: flex;
        align-items: center;
        justify-content: center;
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .house-card:hover .house-overlay {
        opacity: 1;
    }

    .view-gallery-btn {
        background: var(--white);
        border: none;
        color: var(--dark-brown);
        padding: 12px 25px;
        border-radius: 25px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .view-gallery-btn:hover {
        transform: scale(1.05);
        box-shadow: 0 5px 15px rgba(0,0,0,0.3);
    }

    .house-content {
        padding: 1.5rem;
    }

    .house-title {
        font-size: 1.4rem;
        font-weight: 700;
        color: var(--dark-brown);
        margin-bottom: 0.5rem;
    }

    .house-type {
        color: var(--primary-gold);
        font-size: 0.9rem;
        font-weight: 600;
        text-transform: uppercase;
        margin-bottom: 1rem;
    }

    .house-details {
        color: var(--dark-gray);
        margin-bottom: 1rem;
        line-height: 1.6;
    }

    .house-location {
        color: var(--dark-gray);
        margin-bottom: 1rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .house-price {
        font-size: 1.3rem;
        font-weight: 700;
        color: var(--primary-gold);
        margin-bottom: 1.5rem;
    }

    .choose-house-btn {
        background: var(--gradient-gold);
        border: none;
        color: var(--white);
        padding: 12px 30px;
        border-radius: 25px;
        font-weight: 600;
        width: 100%;
        cursor: pointer;
        transition: all 0.3s ease;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .choose-house-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(212, 175, 55, 0.4);
    }

    /* Lightbox */
    .lightbox {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.95);
        z-index: 10000;
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
        text-align: center;
    }

    .lightbox-image {
        max-width: 100%;
        max-height: 80vh;
        object-fit: contain;
        border-radius: 10px;
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.5);
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .lightbox-image.loaded {
        opacity: 1;
    }

    .lightbox-loading {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        color: var(--primary-gold);
        font-size: 3rem;
    }

    .lightbox-loading i {
        animation: spin 1s linear infinite;
    }

    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }

    .lightbox-close {
        position: absolute;
        top: 20px;
        right: 20px;
        background: var(--primary-gold);
        color: var(--white);
        border: none;
        width: 45px;
        height: 45px;
        border-radius: 50%;
        cursor: pointer;
        font-size: 1.5rem;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s ease;
    }

    .lightbox-close:hover {
        background: var(--secondary-gold);
        transform: scale(1.1);
    }

    .lightbox-nav {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        background: rgba(212, 175, 55, 0.9);
        color: var(--white);
        border: none;
        padding: 15px 20px;
        cursor: pointer;
        font-size: 1.5rem;
        border-radius: 10px;
        transition: all 0.3s ease;
    }

    .lightbox-nav:hover:not(:disabled) {
        background: var(--primary-gold);
        transform: translateY(-50%) scale(1.1);
    }

    .lightbox-nav:disabled {
        opacity: 0.3;
        cursor: not-allowed;
    }

    .lightbox-prev {
        left: 30px;
    }

    .lightbox-next {
        right: 30px;
    }

    .lightbox-counter {
        position: absolute;
        bottom: 30px;
        left: 50%;
        transform: translateX(-50%);
        background: rgba(0, 0, 0, 0.7);
        color: var(--white);
        padding: 10px 20px;
        border-radius: 20px;
        font-weight: 600;
    }

    .lightbox-title {
        position: absolute;
        top: 20px;
        left: 50%;
        transform: translateX(-50%);
        background: rgba(0, 0, 0, 0.7);
        color: var(--white);
        padding: 10px 20px;
        border-radius: 20px;
        font-weight: 600;
        max-width: 400px;
        text-align: center;
    }

    /* Modal Formulaire */
    .modal-header {
        background: var(--gradient-gold);
        color: var(--white);
        border-bottom: none;
    }

    .selected-house-info {
        background: var(--light-gray);
        padding: 20px;
        border-radius: 10px;
        margin-bottom: 20px;
    }

    .form-control, .form-select {
        border: 2px solid #e9ecef;
        border-radius: 8px;
        padding: 12px 15px;
        transition: all 0.3s ease;
    }

    .form-control:focus, .form-select:focus {
        border-color: var(--primary-gold);
        box-shadow: 0 0 0 0.2rem rgba(212, 175, 55, 0.25);
    }

    .btn-submit {
        background: var(--gradient-gold);
        border: none;
        color: var(--white);
        padding: 12px 30px;
        border-radius: 25px;
        font-weight: 600;
        width: 100%;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .hero-section h1 {
            font-size: 2rem;
        }

        .houses-grid {
            grid-template-columns: 1fr;
            gap: 1.5rem;
        }

        .lightbox-nav {
            padding: 10px 15px;
            font-size: 1.2rem;
        }

        .lightbox-prev {
            left: 15px;
        }

        .lightbox-next {
            right: 15px;
        }
    }
</style>

<!-- Hero Section -->
<section class="hero-section">
    <div class="container">
        <h1><i class="fas fa-home me-3"></i>Catalogue Maisons de Rêves</h1>
        <p>Découvrez notre sélection exclusive de maisons et choisissez votre futur chez-vous</p>
    </div>
</section>

<!-- Houses Section -->
<section class="houses-section">
    <div class="container">
        <div class="text-center mb-5">
            <h2>Nos Maisons Disponibles</h2>
            <p class="text-muted">{{ $portfolios->count() }} maison(s) dans notre catalogue</p>
        </div>

        @if($portfolios->count() > 0)
            <div class="houses-grid">
                @foreach($portfolios as $portfolio)
                    <div class="house-card">
                        <div class="house-image">
                            @if ($portfolio->getFirstMediaUrl('image_principale'))
                                <img src="{{ $portfolio->getFirstMediaUrl('image_principale') }}" alt="{{ $portfolio->libelle }}">
                            @else
                                <img src="https://via.placeholder.com/350x250/cccccc/666?text=Image+Non+Disponible" alt="{{ $portfolio->libelle }}">
                            @endif

                            <div class="house-overlay">
                                @php
                                    $allImages = [];
                                    if($portfolio->getFirstMediaUrl('image_principale')) {
                                        $allImages[] = $portfolio->getFirstMediaUrl('image_principale');
                                    }
                                    foreach($portfolio->getMedia('galerie') as $media) {
                                        $allImages[] = $media->getUrl();
                                    }
                                @endphp
                                
                                @if(count($allImages) > 0)
                                    <button class="view-gallery-btn" onclick="openLightbox('{{ $portfolio->id }}')">
                                        <i class="fas fa-images me-2"></i>
                                        Voir les photos ({{ count($allImages) }})
                                    </button>
                                @endif
                            </div>
                        </div>

                        <div class="house-content">
                            <div class="house-type">{{ $portfolio->type ?: 'Maison' }}</div>
                            <h3 class="house-title">{{ $portfolio->libelle }}</h3>
                            
                            @if($portfolio->localisation)
                                <div class="house-location">
                                    <i class="fas fa-map-marker-alt text-warning"></i>
                                    {{ $portfolio->localisation }}
                                </div>
                            @endif

                            @if($portfolio->caracteristique)
                              
                                <div class="house-details">{!! $portfolio->caracteristique !!}</div>
                            @endif

                            @if($portfolio->prix)
                                <div class="house-price">{{ number_format($portfolio->prix, 0, ',', ' ') }} FCFA</div>
                            @else
                                <div class="house-price">Prix sur demande</div>
                            @endif

                            <button class="choose-house-btn" onclick="chooseHouse('{{ $portfolio->id }}', '{{ $portfolio->libelle }}', '{{ $portfolio->prix ? number_format($portfolio->prix, 0, ',', ' ') . ' FCFA' : 'Prix sur demande' }}')">
                                <i class="fas fa-check-circle me-2"></i>
                                Choisir cette maison
                            </button>
                        </div>

                        <!-- Data JSON pour lightbox -->
                        <script type="application/json" id="house-data-{{ $portfolio->id }}">
                        @php
                            echo json_encode([
                                'id' => $portfolio->id,
                                'title' => $portfolio->libelle,
                                'images' => $allImages
                            ], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
                        @endphp
                        </script>
                    </div>
                @endforeach
            </div>
        @else
            <div class="text-center py-5">
                <i class="fas fa-home fa-5x text-muted mb-4"></i>
                <h3 class="text-muted">Aucune maison disponible</h3>
                <p class="text-muted">Notre catalogue sera bientôt mis à jour.</p>
            </div>
        @endif
    </div>
</section>

<!-- Lightbox -->
<div class="lightbox" id="lightbox">
    <div class="lightbox-content">
        <button class="lightbox-close" onclick="closeLightbox()" title="Fermer (Échap)">×</button>
        <div class="lightbox-title" id="lightboxTitle"></div>
        <div class="lightbox-loading" id="lightboxLoading" style="display: none;">
            <i class="fas fa-spinner"></i>
        </div>
        <img class="lightbox-image" id="lightboxImage" src="" alt="">
        <button class="lightbox-nav lightbox-prev" id="lightboxPrev" onclick="prevImage()" title="Image précédente (←)">‹</button>
        <button class="lightbox-nav lightbox-next" id="lightboxNext" onclick="nextImage()" title="Image suivante (→)">›</button>
        <div class="lightbox-counter" id="lightboxCounter">1 / 1</div>
    </div>
</div>

<!-- Modal Formulaire -->
<div class="modal fade" id="subscriptionModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="fas fa-file-contract me-2"></i>
                    Formulaire de Souscription
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <!-- Maison sÃ©lectionnÃ©e -->
                <div class="selected-house-info">
                    <h6 class="fw-bold text-primary mb-2">
                        <i class="fas fa-home me-2"></i>Maison sélectionnée :
                    </h6>
                    <div class="d-flex justify-content-between align-items-center">
                        <span id="selectedHouseName" class="fw-bold"></span>
                        <span id="selectedHousePrice" class="text-warning fw-bold"></span>
                    </div>
                </div>

                <!-- Formulaire -->
                <form id="subscriptionForm">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Nom complet *</label>
                                <input type="text" class="form-control" name="nom" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Email *</label>
                                <input type="email" class="form-control" name="email" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Téléphone *</label>
                                <input type="tel" class="form-control" name="telephone" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Profession</label>
                                <input type="text" class="form-control" name="profession">
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Adresse actuelle</label>
                        <input type="text" class="form-control" name="adresse">
                    </div>

                    {{-- <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Budget prévu</label>
                                <select class="form-select" name="budget">
                                    <option value="">Sélectionner votre budget</option>
                                    <option value="5-10M">5 à 10 millions FCFA</option>
                                    <option value="10-20M">10 à 20 millions FCFA</option>
                                    <option value="20-50M">20 à 50 millions FCFA</option>
                                    <option value="50M+">Plus de 50 millions FCFA</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Délai souhaité</label>
                                <select class="form-select" name="delai">
                                    <option value="">Sélectionner le délai</option>
                                    <option value="6mois">Dans les 6 mois</option>
                                    <option value="1an">Dans l'année</option>
                                    <option value="2ans">Dans les 2 ans</option>
                                    <option value="plus">Plus de 2 ans</option>
                                </select>
                            </div>
                        </div>
                    </div> --}}

                    <div class="mb-3">
                        <label class="form-label">Message complémentaire</label>
                        <textarea class="form-control" rows="4" name="message" placeholder="Dites-nous vos besoins spécifiques, questions ou préférences..."></textarea>
                    </div>

                    <input type="hidden" name="portfolio_id" id="portfolioId">
                    <input type="hidden" name="titre_maison" id="titreMaison">

                    <button type="submit" class="btn-submit">
                        <i class="fas fa-paper-plane me-2"></i>
                        Envoyer ma demande
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
// Variables globales lightbox
let currentImages = [];
let currentImageIndex = 0;
let currentTitle = '';

// Ouvrir lightbox
function openLightbox(houseId) {
    const dataScript = document.getElementById('house-data-' + houseId);
    if (!dataScript) return;

    const data = JSON.parse(dataScript.textContent);
    currentImages = data.images;
    currentTitle = data.title;
    currentImageIndex = 0;

    if (currentImages.length === 0) return;

    const lightbox = document.getElementById('lightbox');
    lightbox.style.display = 'flex';
    setTimeout(() => {
        lightbox.classList.add('active');
    }, 10);

    updateLightboxImage();
    document.body.style.overflow = 'hidden';
}

// Fermer lightbox
function closeLightbox() {
    const lightbox = document.getElementById('lightbox');
    lightbox.classList.remove('active');
    setTimeout(() => {
        lightbox.style.display = 'none';
        document.body.style.overflow = 'auto';
    }, 300);
}

// Navigation lightbox
function nextImage() {
    if (currentImageIndex < currentImages.length - 1) {
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

// Mettre à jour l'image lightbox
function updateLightboxImage() {
    const image = document.getElementById('lightboxImage');
    const title = document.getElementById('lightboxTitle');
    const counter = document.getElementById('lightboxCounter');
    const prevBtn = document.getElementById('lightboxPrev');
    const nextBtn = document.getElementById('lightboxNext');
    const loading = document.getElementById('lightboxLoading');

    // Afficher le chargement
    loading.style.display = 'block';
    image.classList.remove('loaded');

    // Précharger l'image
    const tempImg = new Image();
    tempImg.onload = function() {
        image.src = currentImages[currentImageIndex];
        loading.style.display = 'none';
        image.classList.add('loaded');
    };
    tempImg.onerror = function() {
        loading.style.display = 'none';
        console.error('Erreur de chargement de l\'image');
        // Afficher une image par défaut ou un message
        image.src = 'https://via.placeholder.com/800x600/cccccc/666?text=Erreur+de+chargement';
        image.classList.add('loaded');
    };
    tempImg.src = currentImages[currentImageIndex];

    title.textContent = currentTitle;
    counter.textContent = `${currentImageIndex + 1} / ${currentImages.length}`;

    prevBtn.disabled = currentImageIndex === 0;
    nextBtn.disabled = currentImageIndex === currentImages.length - 1;
}

// Choisir une maison
function chooseHouse(id, name, price) {
    document.getElementById('selectedHouseName').textContent = name;
    document.getElementById('selectedHousePrice').textContent = price;
    document.getElementById('portfolioId').value = id;
    document.getElementById('titreMaison').value = name;

    const modal = new bootstrap.Modal(document.getElementById('subscriptionModal'));
    modal.show();
}

// Gestion du formulaire
document.getElementById('subscriptionForm').addEventListener('submit', function(e) {
    e.preventDefault();
    
    const formData = new FormData(this);
    const submitBtn = this.querySelector('button[type="submit"]');
    
    submitBtn.disabled = true;
    submitBtn.innerHTML = '<span class="spinner-border spinner-border-sm me-2"></span>Envoi en cours...';

    fetch('{{ route("page.envoyer-souscription-catalogue") }}', {
        method: 'POST',
        body: formData,
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            Swal.fire({
                title: 'Demande envoyÃ©e !',
                text: 'Nous vous recontacterons trÃ¨s prochainement.',
                icon: 'success',
                confirmButtonColor: '#d4af37'
            });

            // Fermer modal et reset form
            const modal = bootstrap.Modal.getInstance(document.getElementById('subscriptionModal'));
            modal.hide();
            this.reset();
        } else {
            throw new Error(data.message || 'Erreur lors de l\'envoi');
        }
    })
    .catch(error => {
        Swal.fire({
            title: 'Erreur',
            text: 'Une erreur est survenue lors de l\'envoi.',
            icon: 'error',
            confirmButtonColor: '#d4af37'
        });
    })
    .finally(() => {
        submitBtn.disabled = false;
        submitBtn.innerHTML = '<i class="fas fa-paper-plane me-2"></i>Envoyer ma demande';
    });
});

// Events clavier lightbox
document.addEventListener('keydown', function(e) {
    if (document.getElementById('lightbox').classList.contains('active')) {
        switch(e.key) {
            case 'Escape':
                closeLightbox();
                break;
            case 'ArrowLeft':
                prevImage();
                break;
            case 'ArrowRight':
                nextImage();
                break;
        }
    }
});

// Fermer lightbox par clic extÃ©rieur
document.getElementById('lightbox').addEventListener('click', function(e) {
    if (e.target === this) {
        closeLightbox();
    }
});
</script>

@endsection
