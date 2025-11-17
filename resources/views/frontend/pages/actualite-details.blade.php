@extends('frontend.layouts.app')

@section('title', ($actualite->libelle ?? 'Activité') . ' - SCI SAGES')

@push('styles')
    <style>
        /* ================== HERO DETAIL ================== */
        .activite-hero {
            background: linear-gradient(135deg, rgba(60, 36, 21, 0.85), rgba(139, 69, 19, 0.7)),
                url('{{ $actualite->getFirstMediaUrl('image_principale') ?: 'https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=crop&w=1200&q=80' }}');
            background-size: cover;
            background-position: center;
            height: 60vh;
            display: flex;
            align-items: center;
            position: relative;
            overflow: hidden;
        }

        .activite-hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 20"><defs><pattern id="grain" width="100" height="20" patternUnits="userSpaceOnUse"><circle cx="25" cy="5" r="1" fill="%23d4af37" opacity="0.1"/></pattern></defs><rect width="100" height="20" fill="url(%23grain)"/></svg>');
            pointer-events: none;
        }

        .hero-content {
            position: relative;
            z-index: 2;
            text-align: center;
            color: var(--white);
        }

        .hero-icon {
            font-size: 4rem;
            color: var(--primary-gold);
            margin-bottom: 1.5rem;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0% {
                transform: scale(1);
            }

            50% {
                transform: scale(1.05);
            }

            100% {
                transform: scale(1);
            }
        }

        .hero-title {
            font-size: 3.5rem;
            font-weight: 800;
            margin-bottom: 1rem;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
            line-height: 1.2;
        }

        .hero-subtitle {
            font-size: 1.2rem;
            color: rgba(255, 255, 255, 0.9);
            max-width: 600px;
            margin: 0 auto;
            line-height: 1.6;
        }

        /* ================== BREADCRUMB ================== */
        .breadcrumb-section {
            background: linear-gradient(135deg, #f8f9fa 0%, #ffffff 100%);
            padding: 1.5rem 0;
            border-bottom: 2px solid var(--primary-gold);
        }

        .breadcrumb-custom {
            background: transparent;
            padding: 0;
            margin: 0;
            font-size: 0.9rem;
        }

        .breadcrumb-custom .breadcrumb-item+.breadcrumb-item::before {
            content: '›';
            color: var(--primary-gold);
            font-weight: 700;
            margin: 0 0.5rem;
        }

        .breadcrumb-custom .breadcrumb-item a {
            color: var(--dark-brown);
            text-decoration: none;
            transition: color 0.2s ease;
        }

        .breadcrumb-custom .breadcrumb-item a:hover {
            color: var(--primary-gold);
        }

        /* ================== CONTENT DETAIL ================== */
        .activite-detail {
            padding: 80px 0;
            background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 50%, #ffffff 100%);
        }

        .detail-content {
            background: #fff;
            border-radius: 25px;
            padding: 3rem;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.1);
            position: relative;
            overflow: hidden;
        }

        .detail-content::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 5px;
            background: linear-gradient(135deg, var(--primary-gold), var(--secondary-gold));
        }

        .content-header {
            text-align: center;
            margin-bottom: 3rem;
            padding-bottom: 2rem;
            border-bottom: 2px solid rgba(212, 175, 55, 0.2);
        }

        .content-title {
            font-size: 2.5rem;
            font-weight: 800;
            color: var(--dark-brown);
            margin-bottom: 1rem;
            line-height: 1.3;
        }

        .content-subtitle {
            font-size: 1.1rem;
            color: var(--dark-gray);
            max-width: 600px;
            margin: 0 auto;
            line-height: 1.6;
        }

        .content-body {
            font-size: 1.1rem;
            line-height: 1.8;
            color: var(--dark-gray);
            text-align: justify;
        }

        .content-body h2 {
            color: var(--dark-brown);
            font-weight: 700;
            margin: 2.5rem 0 1.5rem;
            font-size: 1.8rem;
        }

        .content-body h3 {
            color: var(--primary-gold);
            font-weight: 600;
            margin: 2rem 0 1rem;
            font-size: 1.4rem;
        }

        .content-body p {
            margin-bottom: 1.5rem;
        }

        .content-body ul,
        .content-body ol {
            margin: 1.5rem 0;
            padding-left: 2rem;
        }

        .content-body li {
            margin-bottom: 0.5rem;
        }

        .content-body blockquote {
            background: linear-gradient(135deg, rgba(212, 175, 55, 0.1), rgba(139, 69, 19, 0.05));
            border-left: 5px solid var(--primary-gold);
            padding: 1.5rem 2rem;
            margin: 2rem 0;
            border-radius: 0 15px 15px 0;
            font-style: italic;
            font-size: 1.15rem;
            color: var(--dark-brown);
        }

        /* ================== GALERIE SECTION ================== */
        .galerie-section {
            padding: 80px 0;
            background: linear-gradient(135deg, #f8f9fa 0%, #ffffff 50%, #f8f9fa 100%);
        }

        .galerie-header {
            text-align: center;
            margin-bottom: 3rem;
        }

        .galerie-title {
            font-size: 2.5rem;
            font-weight: 800;
            color: var(--dark-brown);
            margin-bottom: 1rem;
            position: relative;
        }

        .galerie-title::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 4px;
            background: linear-gradient(135deg, var(--primary-gold), var(--secondary-gold));
            border-radius: 2px;
        }

        .galerie-subtitle {
            font-size: 1.1rem;
            color: var(--dark-gray);
            max-width: 500px;
            margin: 1.5rem auto 0;
        }

        .galerie-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 1.5rem;
            margin-top: 3rem;
        }

        .galerie-item {
            position: relative;
            border-radius: 20px;
            overflow: hidden;
            cursor: pointer;
            transition: all 0.4s ease;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        .galerie-item:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.2);
        }

        .galerie-item img {
            width: 100%;
            height: 250px;
            object-fit: cover;
            transition: transform 0.4s ease;
        }

        .galerie-item:hover img {
            transform: scale(1.1);
        }

        .galerie-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, rgba(60, 36, 21, 0.8), rgba(139, 69, 19, 0.6));
            opacity: 0;
            transition: opacity 0.4s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
        }

        .galerie-item:hover .galerie-overlay {
            opacity: 1;
        }

        .galerie-btn {
            background: linear-gradient(135deg, var(--primary-gold), var(--secondary-gold));
            color: var(--dark-brown);
            border: none;
            border-radius: 50px;
            padding: 1rem 2rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            box-shadow: 0 8px 25px rgba(212, 175, 55, 0.3);
            transition: all 0.3s ease;
            cursor: pointer;
            margin-bottom: 1rem;
        }

        .galerie-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 30px rgba(212, 175, 55, 0.4);
        }

        .galerie-caption {
            color: var(--white);
            font-size: 0.9rem;
            text-align: center;
            font-weight: 500;
        }

        .no-galerie {
            text-align: center;
            color: var(--dark-gray);
            padding: 3rem 0;
            background: rgba(212, 175, 55, 0.05);
            border-radius: 20px;
            border: 2px dashed rgba(212, 175, 55, 0.3);
        }

        .no-galerie i {
            font-size: 3rem;
            color: var(--primary-gold);
            margin-bottom: 1rem;
        }

        /* ================== LIGHTBOX MODAL ================== */
        .lightbox-modal {
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
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        @keyframes fadeOut {
            from {
                opacity: 1;
            }

            to {
                opacity: 0;
            }
        }

        .lightbox-modal.closing {
            animation: fadeOut 0.3s ease;
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
            max-width: 95%;
            max-height: 95%;
            margin: 0 auto;
            display: block;
            border-radius: 15px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.5);
            transition: all 0.3s ease;
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

        /* ================== BOUTON CLOSE SUR L'IMAGE - POSITION CORRIGÉE ================== */
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
            /* transform: rotate(90deg) scale(1.1); */
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

        .lightbox-prev {
            left: 2rem;
        }

        .lightbox-next {
            right: 2rem;
        }

        /* ================== COMPTEUR D'IMAGES ================== */
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

        .loading-spinner {
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        /* ================== RESPONSIVE LIGHTBOX - POSITIONS CORRIGÉES ================== */
        @media (max-width: 768px) {
            .lightbox-container {
                padding: 1rem;
            }

            .lightbox-content {
                max-width: 98%;
                max-height: 90%;
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

        /* ================== TRANSITIONS FLUIDES ================== */
        * {
            transition: all 0.3s ease;
        }

        .galerie-item {
            transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
        }

        .content-body {
            animation: slideUp 0.6s ease-out;
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* ================== SMOOTH SCROLLING ================== */
        html {
            scroll-behavior: smooth;
        }

        body {
            overflow-x: hidden;
        }

        /* ================== IMAGE PRINCIPALE SECTION ================== */
        .image-principale-section {
            padding: 60px 0;
            background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%);
        }

        .image-principale-container {
            text-align: center;
        }

        .image-principale {
            max-width: 100%;
            height: auto;
            max-height: 500px;
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.15);
            transition: all 0.4s ease;
            cursor: pointer;
        }

        .image-principale:hover {
            transform: translateY(-5px) scale(1.02);
            box-shadow: 0 30px 80px rgba(0, 0, 0, 0.2);
        }

        .image-caption {
            margin-top: 1.5rem;
            font-size: 1rem;
            color: var(--dark-gray);
            font-style: italic;
        }
    </style>
@endpush

@section('content')

    <!-- Hero Detail -->
    <section class="activite-hero">
        <div class="container">
            <div class="hero-content">
                <div class="hero-icon">
                    <i class="fas fa-building"></i>
                </div>
                <h1 class="hero-title">{{ $actualite->libelle ?? 'Activité' }}</h1>
                {{-- <div class="hero-subtitle">
                {{ $actualite->description ?? 'Découvrez notre expertise dans ce domaine' }}
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
                    <li class="breadcrumb-item">
                        <a href="{{ route('page.actualites') }}">Actualités</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        {{ $actualite->libelle ?? 'Actualité' }}
                    </li>
                </ol>
            </nav>
        </div>
    </section>

    <!-- Contenu Détail -->
    <section class="activite-detail">
        <div class="container">
            <div class="detail-content" data-aos="fade-up">
                <div class="content-header">
                    <h2 class="content-title">{{ $actualite->libelle ?? 'Actualité' }}</h2>
                    @if ($actualite->created_at)
                        <div class="content-meta" style="margin-top: 1rem;">
                            <span style="color: var(--primary-gold); font-weight: 600;">
                                <i class="fas fa-calendar-alt me-2"></i>
                                Publié le {{ $actualite->created_at->format('d/m/Y') }}
                            </span>
                        </div>
                    @endif
                </div>

                <div class="content-body">
                    @if ($actualite->description)
                        {!! $actualite->description !!}
                    @else
                        <p>
                            Chez <strong>SCI SAGES</strong>, nous mettons notre expertise au service de vos projets avec
                            professionnalisme et engagement.
                            Notre équipe qualifiée vous accompagne à chaque étape pour garantir la réussite de vos
                            ambitions.
                        </p>

                        <h2>Notre Approche</h2>
                        <p>
                            Nous privilégions une approche personnalisée, adaptée à vos besoins spécifiques et à votre
                            budget.
                            Chaque projet est unique et mérite une attention particulière.
                        </p>

                        <h3>Nos Engagements</h3>
                        <ul>
                            <li><strong>Qualité :</strong> Respect des normes les plus exigeantes</li>
                            <li><strong>Délais :</strong> Livraison dans les temps convenus</li>
                            <li><strong>Transparence :</strong> Communication claire et régulière</li>
                            <li><strong>Innovation :</strong> Solutions modernes et durables</li>
                        </ul>

                        <blockquote>
                            "L'excellence n'est pas un acte, mais une habitude." - Cette philosophie guide chacune de nos
                            réalisations.
                        </blockquote>
                    @endif
                </div>
            </div>
        </div>
    </section>

    <!-- Image Principale -->
    @if ($actualite->getFirstMediaUrl('image_principale'))
        <section class="image-principale-section">
            <div class="container">
                <div class="image-principale-container" data-aos="zoom-in">
                    <img src="{{ $actualite->getFirstMediaUrl('image_principale') }}" alt="{{ $actualite->libelle }}"
                        class="image-principale" onclick="openLightboxPrincipale()" loading="lazy">
                    <div class="image-caption">
                        {{ $actualite->libelle }} - Image principale
                    </div>
                </div>
            </div>
        </section>
    @endif

    <!-- Galerie -->
    <section class="galerie-section">
        <div class="container">
            <div class="galerie-header" data-aos="fade-up">
                <h2 class="galerie-title">Galerie Photos</h2>
                <p class="galerie-subtitle">
                    Découvrez plus d'images en détail
                </p>
            </div>

            @if ($actualite->getMedia('galerie')->count() > 0)
                <div class="galerie-grid" data-aos="fade-up" data-aos-delay="200">
                    @foreach ($actualite->getMedia('galerie') as $index => $media)
                        <div class="galerie-item" data-index="{{ $index }}">
                            <img src="{{ $media->getUrl() }}"
                                alt="Galerie {{ $actualite->libelle }} - Image {{ $index + 1 }}" loading="lazy">
                            <div class="galerie-overlay">
                                <button class="galerie-btn" onclick="openLightbox({{ $index }})">
                                    <i class="fas fa-search-plus me-1"></i>
                                    Voir en grand
                                </button>
                                <div class="galerie-caption">
                                    Image {{ $index + 1 }} / {{ $actualite->getMedia('galerie')->count() }}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="no-galerie" data-aos="fade-up" data-aos-delay="200">
                    <i class="fas fa-images"></i>
                    <h3>Galerie bientôt disponible</h3>
                    <p>Les images de cette actualité seront ajoutées prochainement.</p>
                </div>
            @endif
        </div>
    </section>

    <!-- Lightbox Modal Amélioré -->
    <div class="lightbox-modal" id="lightbox">
        <div class="lightbox-container">
            <div class="lightbox-loading" id="lightbox-loading">
                <i class="fas fa-spinner loading-spinner"></i>
            </div>

            <div class="lightbox-close" onclick="closeLightbox()" title="Fermer">
                <i class="fas fa-times"></i>
            </div>

            <button class="lightbox-nav lightbox-prev" onclick="changeImage(-1)" title="Image précédente">
                <i class="fas fa-chevron-left"></i>
            </button>

            <img class="lightbox-content" id="lightbox-image" src="" alt="" style="display: none;">

            <button class="lightbox-nav lightbox-next" onclick="changeImage(1)" title="Image suivante">
                <i class="fas fa-chevron-right"></i>
            </button>

            <div class="lightbox-counter" id="lightbox-counter">
                1 / 1
            </div>
        </div>
    </div>

@endsection

@push('scripts')
    <script>
        // Lightbox functionality amélioré
        let currentImageIndex = 0;
        let isImagePrincipale = false;

        // Images de la galerie
        const images = [
            @if ($actualite->getFirstMediaUrl('image_principale'))
                {
                    src: '{{ $actualite->getFirstMediaUrl('image_principale') }}',
                    alt: '{{ $actualite->libelle }} - Image principale'
                }
                {{ $actualite->getMedia('galerie')->count() > 0 ? ',' : '' }}
            @endif
            @foreach ($actualite->getMedia('galerie') as $index => $media)
                {
                    src: '{{ $media->getUrl() }}',
                    alt: 'Galerie {{ $actualite->libelle }} - Image {{ $index + 1 }}'
                }
                {{ !$loop->last ? ',' : '' }}
            @endforeach
        ];

        function openLightboxPrincipale() {
            if (images.length > 0) {
                currentImageIndex = 0;
                isImagePrincipale = true;
                openLightboxWithIndex(0);
            }
        }

        function openLightbox(index) {
            // Si on a une image principale, l'index de la galerie commence à 1
            const adjustedIndex = {{ $actualite->getFirstMediaUrl('image_principale') ? 1 : 0 }} + index;
            isImagePrincipale = false;
            openLightboxWithIndex(adjustedIndex);
        }

        function openLightboxWithIndex(index) {
            currentImageIndex = index;
            const lightbox = document.getElementById('lightbox');
            const lightboxImage = document.getElementById('lightbox-image');
            const lightboxLoading = document.getElementById('lightbox-loading');
            const lightboxCounter = document.getElementById('lightbox-counter');

            if (images[currentImageIndex]) {
                lightbox.style.display = 'block';
                lightboxLoading.style.display = 'block';
                lightboxImage.style.display = 'none';
                document.body.style.overflow = 'hidden';

                // Mise à jour du compteur
                lightboxCounter.textContent = `${currentImageIndex + 1} / ${images.length}`;

                // Charger l'image
                const img = new Image();
                img.onload = function() {
                    lightboxImage.src = images[currentImageIndex].src;
                    lightboxImage.alt = images[currentImageIndex].alt;
                    lightboxLoading.style.display = 'none';
                    lightboxImage.style.display = 'block';
                };
                img.src = images[currentImageIndex].src;
            }
        }

        function closeLightbox() {
            const lightbox = document.getElementById('lightbox');
            lightbox.classList.add('closing');

            setTimeout(() => {
                lightbox.style.display = 'none';
                lightbox.classList.remove('closing');
                document.body.style.overflow = 'auto';
            }, 300);
        }

        function changeImage(direction) {
            currentImageIndex += direction;

            if (currentImageIndex >= images.length) {
                currentImageIndex = 0;
            }
            if (currentImageIndex < 0) {
                currentImageIndex = images.length - 1;
            }

            openLightboxWithIndex(currentImageIndex);
        }

        // Navigation clavier améliorée
        document.addEventListener('keydown', function(e) {
            const lightbox = document.getElementById('lightbox');
            if (lightbox.style.display === 'block') {
                switch (e.key) {
                    case 'Escape':
                        closeLightbox();
                        break;
                    case 'ArrowLeft':
                        e.preventDefault();
                        changeImage(-1);
                        break;
                    case 'ArrowRight':
                        e.preventDefault();
                        changeImage(1);
                        break;
                    case ' ': // Espace
                        e.preventDefault();
                        changeImage(1);
                        break;
                }
            }
        });

        // Fermer en cliquant en dehors de l'image
        document.getElementById('lightbox').addEventListener('click', function(e) {
            if (e.target === this || e.target.classList.contains('lightbox-container')) {
                closeLightbox();
            }
        });

        // Navigation tactile pour mobile
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
                    changeImage(1); // Swipe left, next image
                } else {
                    changeImage(-1); // Swipe right, previous image
                }
            }
        }

        // Smooth scroll pour tous les liens d'ancre
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Animation au scroll
        window.addEventListener('scroll', function() {
            const scrolled = window.pageYOffset;
            const parallax = document.querySelector('.activite-hero');
            if (parallax) {
                const speed = scrolled * 0.5;
                parallax.style.transform = `translateY(${speed}px)`;
            }
        });
    </script>
@endpush
