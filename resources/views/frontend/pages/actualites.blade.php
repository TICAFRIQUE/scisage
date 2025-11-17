@extends('frontend.layouts.app')

@section('title', 'Actualités - SCI SAGES')

@push('styles')
<style>
    /* ================== HERO BANNER ACTUALITES ================== */
    .actualites-hero {
        background: linear-gradient(135deg, rgba(60, 36, 21, 0.85), rgba(139, 69, 19, 0.7)),
            url('{{ asset('images/actualites-hero-bg.jpg') }}');
        background-size: cover;
        background-position: center;
        height: 50vh;
        display: flex;
        align-items: center;
        position: relative;
        overflow: hidden;
    }

    .actualites-hero::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 20"><defs><pattern id="grain" width="100" height="20" patternUnits="userSpaceOnUse"><circle cx="25" cy="5" r="1" fill="%23d4af37" opacity="0.1"/></pattern></defs><rect width="100" height="20" fill="url(%23grain)"/></svg>');
        pointer-events: none;
    }

    .actualites-hero-content {
        position: relative;
        z-index: 2;
        text-align: center;
        color: var(--white);
    }

    .actualites-hero h1 {
        font-size: 3rem;
        font-weight: 800;
        margin-bottom: 1rem;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        color: var(--white);
    }

    .actualites-hero .hero-icon {
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

    .actualites-description {
        font-size: 1.1rem;
        line-height: 1.6;
        max-width: 700px;
        margin: 0 auto;
        color: rgba(255, 255, 255, 0.95);
        text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.3);
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

    .breadcrumb-custom .breadcrumb-item {
        color: var(--dark-gray);
        font-weight: 500;
    }

    .breadcrumb-custom .breadcrumb-item + .breadcrumb-item::before {
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

    .breadcrumb-custom .breadcrumb-item.active {
        color: var(--primary-gold);
        font-weight: 600;
    }

    /* ================== SECTION BLOG ================== */
    .blog-section {
        padding: 80px 0;
        background: linear-gradient(135deg, #f8f9fa 0%, #ffffff 50%, #f8f9fa 100%);
        position: relative;
    }

    .blog-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 20"><defs><pattern id="dots" width="100" height="20" patternUnits="userSpaceOnUse"><circle cx="10" cy="10" r="0.5" fill="%23d4af37" opacity="0.05"/></pattern></defs><rect width="100" height="20" fill="url(%23dots)"/></svg>');
        pointer-events: none;
    }

    .section-header {
        text-align: center;
        margin-bottom: 3rem;
        position: relative;
        z-index: 2;
    }

    .section-subtitle {
        color: var(--primary-gold);
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 2px;
        font-size: 1rem;
        margin-bottom: 1rem;
    }

    .section-title {
        font-size: 2.5rem;
        font-weight: 800;
        color: var(--dark-brown);
        margin-bottom: 1rem;
    }

    .section-description {
        color: var(--dark-gray);
        font-size: 1.1rem;
        max-width: 600px;
        margin: 0 auto;
        line-height: 1.6;
    }

    .blog-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(340px, 1fr));
        gap: 2.5rem;
        margin-top: 3rem;
        position: relative;
        z-index: 2;
    }

    .blog-card {
        background: #fff;
        border-radius: 25px;
        overflow: hidden;
        box-shadow: 0 15px 40px rgba(0, 0, 0, 0.08);
        transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
        position: relative;
        display: flex;
        flex-direction: column;
        min-height: 450px;
    }

    .blog-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 5px;
        background: linear-gradient(135deg, var(--primary-gold), var(--secondary-gold));
        transform: scaleX(0);
        transition: transform 0.3s ease;
    }

    .blog-card:hover::before {
        transform: scaleX(1);
    }

    .blog-card:hover {
        transform: translateY(-15px);
        box-shadow: 0 25px 60px rgba(0, 0, 0, 0.15);
    }

    .blog-image {
        position: relative;
        height: 240px;
        overflow: hidden;
    }

    .blog-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.4s ease;
        display: block;
    }

    .blog-card:hover .blog-image img {
        transform: scale(1.1);
    }

    .blog-overlay {
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
    }

    .blog-card:hover .blog-overlay {
        opacity: 1;
    }

    .blog-btn {
        background: linear-gradient(135deg, var(--primary-gold), var(--secondary-gold));
        color: var(--dark-brown);
        border: none;
        border-radius: 30px;
        padding: 0.8rem 2.5rem;
        font-weight: 600;
        font-size: 1rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        box-shadow: 0 8px 25px rgba(212, 175, 55, 0.3);
        transition: all 0.3s ease;
        cursor: pointer;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
    }

    .blog-btn:hover {
        background: var(--secondary-gold);
        color: var(--dark-brown);
        transform: translateY(-2px);
        box-shadow: 0 12px 30px rgba(212, 175, 55, 0.4);
        text-decoration: none;
    }

    .blog-content {
        padding: 2.5rem 2rem 2rem;
        flex: 1;
        display: flex;
        flex-direction: column;
    }

    .blog-meta {
        display: flex;
        align-items: center;
        gap: 1rem;
        font-size: 0.9rem;
        color: var(--primary-gold);
        margin-bottom: 1rem;
        font-weight: 600;
    }

    .blog-meta i {
        color: var(--primary-gold);
    }

    .blog-title {
        font-size: 1.3rem;
        font-weight: 700;
        color: var(--dark-brown);
        margin-bottom: 1rem;
        line-height: 1.4;
        min-height: 60px;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .blog-title a {
        color: inherit;
        text-decoration: none;
        transition: color 0.3s ease;
    }

    .blog-title a:hover {
        color: var(--primary-gold);
    }

    .blog-excerpt {
        color: var(--dark-gray);
        flex: 1;
        margin-bottom: 1.5rem;
        line-height: 1.7;
        font-size: 1rem;
    }

    .blog-read {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding-top: 1rem;
        border-top: 1px solid rgba(212, 175, 55, 0.2);
    }

    .read-time {
        font-size: 0.85rem;
        color: var(--dark-gray);
    }

    /* ================== PAGINATION ================== */
    .blog-pagination {
        margin-top: 4rem;
        position: relative;
        z-index: 2;
    }

    .blog-pagination .pagination {
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

    .blog-pagination .page-link {
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

    .blog-pagination .page-link:hover,
    .blog-pagination .page-item.active .page-link {
        background: var(--primary-gold);
        color: var(--dark-brown);
        border-color: var(--primary-gold);
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(212, 175, 55, 0.3);
    }

    .blog-pagination .page-item.disabled .page-link {
        color: #ccc;
        background: #f8f9fa;
        border-color: #e9ecef;
        pointer-events: none;
        box-shadow: none;
    }

    /* ================== SECTION VIDE ================== */
    .no-news {
        text-align: center;
        color: var(--dark-gray);
        padding: 60px 0;
        position: relative;
        z-index: 2;
    }

    .no-news h2 {
        color: var(--dark-brown);
        font-weight: 700;
        margin-bottom: 1rem;
    }

    .no-news p {
        font-size: 1.1rem;
        margin-bottom: 2rem;
    }

    /* ================== RESPONSIVE ================== */
    @media (max-width: 1200px) {
        .blog-grid {
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
        }
    }

    @media (max-width: 991px) {
        .actualites-hero {
            height: 40vh;
        }

        .actualites-hero h1 {
            font-size: 2.5rem;
        }

        .blog-section {
            padding: 60px 0;
        }

        .section-title {
            font-size: 2rem;
        }

        .blog-grid {
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 1.5rem;
        }

        .blog-content {
            padding: 2rem 1.5rem 1.5rem;
        }

        .blog-title {
            font-size: 1.2rem;
            min-height: 50px;
        }
    }

    @media (max-width: 768px) {
        .actualites-hero {
            height: 35vh;
        }

        .actualites-hero h1 {
            font-size: 2rem;
        }

        .actualites-hero .hero-icon {
            font-size: 2.5rem;
        }

        .blog-section {
            padding: 40px 0;
        }

        .section-title {
            font-size: 1.8rem;
        }

        .blog-image {
            height: 180px;
        }

        .blog-grid {
            grid-template-columns: 1fr;
            gap: 1.5rem;
        }

        .blog-content {
            padding: 1.5rem 1rem 1rem;
        }

        .blog-pagination .page-link {
            padding: 0.6rem 1rem;
            min-width: 40px;
        }
    }

    @media (max-width: 480px) {
        .actualites-hero h1 {
            font-size: 1.7rem;
        }

        .section-title {
            font-size: 1.5rem;
        }

        .blog-card {
            min-height: 400px;
        }

        .blog-image {
            height: 160px;
        }

        .blog-pagination .pagination {
            gap: 0.2rem;
        }

        .blog-pagination .page-link {
            padding: 0.5rem 0.8rem;
            font-size: 0.9rem;
        }
    }
</style>
@endpush

@section('content')

<!-- Hero Banner -->
<section class="actualites-hero">
    <div class="container">
        <div class="actualites-hero-content">
            <div class="hero-icon">
                <i class="fas fa-newspaper"></i>
            </div>
            <h1>Nos Actualités</h1>
            {{-- <div class="actualites-description">
                Restez informés de nos dernières réalisations, projets en cours et actualités du secteur immobilier.
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
                    Actualités
                </li>
            </ol>
        </nav>
    </div>
</section>

<!-- Section Blog/Actualités -->
<section class="blog-section">
    <div class="container">
        @if ($actualites && $actualites->count())
            <div class="section-header" data-aos="fade-up">
                <div class="section-subtitle">Blog & Actualités</div>
                <h2 class="section-title">Découvrez nos dernières nouvelles</h2>
                {{-- <p class="section-description">
                    Suivez l'évolution de nos projets et découvrez nos conseils d'experts en immobilier.
                </p> --}}
            </div>

            <div class="blog-grid">
                @foreach ($actualites as $item)
                    <article class="blog-card" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                        <div class="blog-image">
                            <a href="{{ route('page.actualites.details', ['slug' => $item->slug]) }}" title="{{ $item->libelle }}">
                                <img src="{{ $item->getFirstMediaUrl('image_principale') ?: 'https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=crop&w=800&q=80' }}"
                                     alt="{{ $item->libelle }}" loading="lazy">
                            </a>
                            <div class="blog-overlay">
                                <a href="{{ route('page.actualites.details', ['slug' => $item->slug]) }}" class="blog-btn">
                                    <i class="fas fa-book-open"></i>
                                    Lire l'article
                                </a>
                            </div>
                        </div>
                        <div class="blog-content">
                            <div class="blog-meta">
                                <i class="fas fa-calendar-alt"></i>
                                <span>{{ $item->created_at ? $item->created_at->format('d M Y') : 'Non daté' }}</span>
                            </div>
                            <h3 class="blog-title">
                                <a href="{{ route('page.actualites.details', ['slug' => $item->slug]) }}">{{ $item->libelle }}</a>
                            </h3>
                            <div class="blog-excerpt">
                                {!! \Illuminate\Support\Str::limit(strip_tags($item->description ?? ''), 160) !!}
                            </div>
                            <div class="blog-read">
                                <span class="read-time">
                                    <i class="fas fa-clock"></i>
                                    {{ ceil(str_word_count(strip_tags($item->description ?? '')) / 200) }} min de lecture
                                </span>
                                <a href="{{ route('page.actualites.details', ['slug' => $item->slug]) }}" class="blog-btn">
                                    Lire plus
                                    <i class="fas fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>

            <!-- Pagination améliorée -->
            @if ($actualites->hasPages())
                <nav class="blog-pagination" aria-label="Pagination des actualités">
                    <ul class="pagination justify-content-center">
                        <!-- Page précédente -->
                        <li class="page-item {{ $actualites->onFirstPage() ? 'disabled' : '' }}">
                            <a class="page-link" href="{{ $actualites->previousPageUrl() ?? '#' }}" 
                               aria-label="Page précédente">
                                <i class="fas fa-chevron-left"></i>
                            </a>
                        </li>
                        
                        <!-- Liens de pages -->
                        @foreach ($actualites->getUrlRange(1, $actualites->lastPage()) as $page => $url)
                            <li class="page-item {{ $page == $actualites->currentPage() ? 'active' : '' }}">
                                <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                            </li>
                        @endforeach
                        
                        <!-- Page suivante -->
                        <li class="page-item {{ !$actualites->hasMorePages() ? 'disabled' : '' }}">
                            <a class="page-link" href="{{ $actualites->nextPageUrl() ?? '#' }}" 
                               aria-label="Page suivante">
                                <i class="fas fa-chevron-right"></i>
                            </a>
                        </li>
                    </ul>
                </nav>
            @endif
        @else
            <div class="no-news">
                <h2 class="mb-4">Bienvenue sur notre blog</h2>
                <p>Découvrez nos conseils, inspirations et actualités du secteur immobilier.</p>
                <div class="blog-grid" style="margin-top:3rem;">
                    <article class="blog-card" data-aos="fade-up" data-aos-delay="100">
                        <div class="blog-image">
                            <img src="https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=crop&w=800&q=80"
                                 alt="Conseils immobiliers" loading="lazy">
                            <div class="blog-overlay">
                                <a href="#" class="blog-btn">
                                    <i class="fas fa-book-open"></i>
                                    Lire l'article
                                </a>
                            </div>
                        </div>
                        <div class="blog-content">
                            <div class="blog-meta">
                                <i class="fas fa-calendar-alt"></i>
                                <span>15 Nov 2025</span>
                            </div>
                            <h3 class="blog-title">
                                <a href="#">Conseils pour réussir votre premier achat immobilier</a>
                            </h3>
                            <div class="blog-excerpt">
                                Découvrez les étapes clés pour acheter sereinement et éviter les pièges courants lors de votre premier investissement immobilier.
                            </div>
                            <div class="blog-read">
                                <span class="read-time">
                                    <i class="fas fa-clock"></i>
                                    5 min de lecture
                                </span>
                                <a href="#" class="blog-btn">
                                    Lire plus
                                    <i class="fas fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </article>
                    
                    <article class="blog-card" data-aos="fade-up" data-aos-delay="200">
                        <div class="blog-image">
                            <img src="https://images.unsplash.com/photo-1464983953574-0892a716854b?auto=format&fit=crop&w=800&q=80"
                                 alt="Tendances architecture" loading="lazy">
                            <div class="blog-overlay">
                                <a href="#" class="blog-btn">
                                    <i class="fas fa-book-open"></i>
                                    Lire l'article
                                </a>
                            </div>
                        </div>
                        <div class="blog-content">
                            <div class="blog-meta">
                                <i class="fas fa-calendar-alt"></i>
                                <span>10 Nov 2025</span>
                            </div>
                            <h3 class="blog-title">
                                <a href="#">Tendances architecturales 2025</a>
                            </h3>
                            <div class="blog-excerpt">
                                Zoom sur les styles et innovations qui marqueront l'immobilier cette année, entre modernité et durabilité environnementale.
                            </div>
                            <div class="blog-read">
                                <span class="read-time">
                                    <i class="fas fa-clock"></i>
                                    7 min de lecture
                                </span>
                                <a href="#" class="blog-btn">
                                    Lire plus
                                    <i class="fas fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </article>

                    <article class="blog-card" data-aos="fade-up" data-aos-delay="300">
                        <div class="blog-image">
                            <img src="https://images.unsplash.com/photo-1503389152951-9c3d8b6e9c94?auto=format&fit=crop&w=800&q=80"
                                 alt="Vie de SCI SAGES" loading="lazy">
                            <div class="blog-overlay">
                                <a href="#" class="blog-btn">
                                    <i class="fas fa-book-open"></i>
                                    Lire l'article
                                </a>
                            </div>
                        </div>
                        <div class="blog-content">
                            <div class="blog-meta">
                                <i class="fas fa-calendar-alt"></i>
                                <span>1 Nov 2025</span>
                            </div>
                            <h3 class="blog-title">
                                <a href="#">La vie chez SCI SAGES : nos valeurs au quotidien</a>
                            </h3>
                            <div class="blog-excerpt">
                                Plongez dans les coulisses de notre équipe et découvrez ce qui fait notre différence au service de nos clients.
                            </div>
                            <div class="blog-read">
                                <span class="read-time">
                                    <i class="fas fa-clock"></i>
                                    4 min de lecture
                                </span>
                                <a href="#" class="blog-btn">
                                    Lire plus
                                    <i class="fas fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </article>
                </div>
            </div>
        @endif
    </div>
</section>

@endsection