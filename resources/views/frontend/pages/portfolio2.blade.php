@extends('frontend.layouts.app')

@section('title', 'Portfolio - SCI SAGES')

@push('styles')
<style>
    .portfolio-hero {
        background: linear-gradient(135deg, rgba(60, 36, 21, 0.85), rgba(139, 69, 19, 0.7)),
            url('{{ asset('images/portfolio-hero-bg.jpg') }}');
        background-size: cover;
        background-position: center;
        height: 50vh;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        color: var(--white);
    }

    .portfolio-hero h1 {
        font-size: 2.5rem;
        font-weight: 800;
        margin-bottom: 1rem;
    }

    .portfolio-section {
        padding: 60px 0;
    }

    .portfolio-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 1.5rem;
    }

    .portfolio-card {
        background: var(--white);
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease;
    }

    .portfolio-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
    }

    .portfolio-image img {
        width: 100%;
        height: 200px;
        object-fit: cover;
    }

    .portfolio-content {
        padding: 1rem;
        text-align: center;
    }

    .portfolio-title {
        font-size: 1.2rem;
        font-weight: 700;
        color: var(--dark-brown);
        margin-bottom: 0.5rem;
    }

    .portfolio-category {
        font-size: 0.9rem;
        color: var(--primary-gold);
        font-weight: 600;
        text-transform: uppercase;
    }
</style>
@endpush

@section('content')

<!-- Hero Section -->
<section class="portfolio-hero">
    <h1>Notre Portfolio</h1>
</section>

<!-- Portfolio Section -->
<section class="portfolio-section">
    <div class="container">
        <div class="portfolio-grid">
            @forelse($portfolios as $portfolio)
                <div class="portfolio-card">
                    <div class="portfolio-image">
                        <img src="{{ $portfolio->getFirstMediaUrl('image_principale') ?? 'https://via.placeholder.com/300x200' }}" alt="{{ $portfolio->libelle }}">
                    </div>
                    <div class="portfolio-content">
                        <h3 class="portfolio-title">{{ $portfolio->libelle }}</h3>
                        <p class="portfolio-category">{{ ucfirst($portfolio->categorie) }}</p>
                    </div>
                </div>
            @empty
                <p>Aucun projet disponible pour le moment.</p>
            @endforelse
        </div>
    </div>
</section>

@endsection