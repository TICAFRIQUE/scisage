@extends('frontend.layouts.app')

@section('title', 'Portfolio - Nos réalisations et projets immobiliers | SCI SAGES')
@section('description', 'Découvrez les réalisations de SCI SAGES : villas, duplex et appartements construits en Côte d\'Ivoire, conceptions architecturales et projets en cours.')
@section('keywords', 'portfolio immobilier, réalisations maisons, villas construites, projets immobiliers Abidjan, références SCI SAGES')
@section('og_title', 'Portfolio - Les réalisations SCI SAGES')
@section('og_description', 'Villas, duplex et projets immobiliers réalisés par SCI SAGES en Côte d\'Ivoire.')

@php
    $labels = ['tous' => 'Tous', 'realisations' => 'Réalisations', 'conceptions' => 'Conceptions', 'projets' => 'Projets en cours'];
    $label = fn($c) => $labels[$c] ?? ucfirst($c);
    $leads = [
        'realisations' => 'Maisons livrées à nos clients : la preuve concrète de notre savoir-faire.',
        'conceptions' => 'Études et plans architecturaux conçus par nos équipes.',
        'projets' => 'Chantiers en cours de construction et programmes à venir.',
    ];
@endphp

@section('content')
    @include('frontend.components.page_hero', [
        'eyebrow' => 'Portfolio',
        'title' => $categorie && $categorie !== 'tous' ? $label($categorie) : 'Nos réalisations',
        'lead' => $leads[$categorie] ?? 'Villas, duplex et appartements : découvrez les maisons que nous avons conçues et construites.',
        'crumbs' => $categorie && $categorie !== 'tous'
            ? ['Portfolio' => route('page.portfolios'), $label($categorie) => null]
            : ['Portfolio' => null],
    ])

    <section class="section section--sand">
        <div class="container">
            <nav class="filters" aria-label="Filtrer par catégorie">
                @foreach ($categoriesWithCount as $cat => $count)
                    <a href="{{ route('page.portfolios', ['categorie' => $cat]) }}"
                        class="filters__btn {{ $categorie === $cat ? 'is-active' : '' }}"
                        @if ($categorie === $cat) aria-current="page" @endif>
                        {{ $label($cat) }} <span>{{ $count }}</span>
                    </a>
                @endforeach
            </nav>

            @if ($portfolios->count())
                <p class="results-info">
                    <strong>{{ $portfolios->total() }}</strong> {{ Str::plural('projet', $portfolios->total()) }}
                    @if ($portfolios->lastPage() > 1)
                        · page {{ $portfolios->currentPage() }} sur {{ $portfolios->lastPage() }}
                    @endif
                </p>

                <div class="cards-grid">
                    @foreach ($portfolios as $portfolio)
                        @php
                            $allImages = collect([$portfolio->getFirstMediaUrl('image_principale')])
                                ->merge($portfolio->getMedia('galerie')->map->getUrl())
                                ->filter()->values()->all();
                            $features = \App\Support\Features::split($portfolio->caracteristique);
                        @endphp
                        <article class="house" data-aos="fade-up" data-aos-delay="{{ ($loop->index % 3) * 80 }}">
                            <button type="button" class="house__media img-frame js-gallery" data-title="{{ $portfolio->libelle }}"
                                data-images='@json($allImages)' aria-label="Voir les photos de {{ $portfolio->libelle }}">
                                @if (!empty($allImages))
                                    <img src="{{ $allImages[0] }}" alt="{{ $portfolio->libelle }}" loading="lazy" decoding="async" class="img-fade">
                                    <span class="house__photos"><i class="fas fa-images"></i> {{ count($allImages) }}</span>
                                @endif
                                <span class="house__type">{{ $label($portfolio->categorie) }}</span>
                                <span class="house__zoom"><i class="fas fa-magnifying-glass-plus"></i></span>
                            </button>
                            <div class="house__body">
                                @if ($portfolio->type)
                                    <span class="house__kind">{{ ucfirst($portfolio->type) }}</span>
                                @endif
                                <h2 class="house__title">{{ $portfolio->libelle }}</h2>
                                @if ($portfolio->localisation)
                                    <p class="house__loc"><i class="fas fa-location-dot"></i> {{ $portfolio->localisation }}</p>
                                @endif
                                @if ($features->isNotEmpty())
                                    <ul class="chips">
                                        @foreach ($features->take(4) as $feature)
                                            <li>{{ $feature }}</li>
                                        @endforeach
                                    </ul>
                                @endif
                            </div>
                        </article>
                    @endforeach
                </div>

                @if ($portfolios->hasPages())
                    <nav class="mt-5" aria-label="Pagination du portfolio">
                        <ul class="pagination justify-content-center">
                            <li class="page-item {{ $portfolios->onFirstPage() ? 'disabled' : '' }}">
                                <a class="page-link" href="{{ $portfolios->previousPageUrl() ?? '#' }}" aria-label="Page précédente"><i class="fas fa-chevron-left"></i></a>
                            </li>
                            @if ($portfolios->currentPage() > 3)
                                <li class="page-item"><a class="page-link" href="{{ $portfolios->url(1) }}">1</a></li>
                                @if ($portfolios->currentPage() > 4)
                                    <li class="page-item disabled"><span class="page-link">…</span></li>
                                @endif
                            @endif
                            @foreach (range(max(1, $portfolios->currentPage() - 2), min($portfolios->lastPage(), $portfolios->currentPage() + 2)) as $page)
                                <li class="page-item {{ $page == $portfolios->currentPage() ? 'active' : '' }}">
                                    <a class="page-link" href="{{ $portfolios->url($page) }}" @if ($page == $portfolios->currentPage()) aria-current="page" @endif>{{ $page }}</a>
                                </li>
                            @endforeach
                            @if ($portfolios->currentPage() < $portfolios->lastPage() - 2)
                                @if ($portfolios->currentPage() < $portfolios->lastPage() - 3)
                                    <li class="page-item disabled"><span class="page-link">…</span></li>
                                @endif
                                <li class="page-item"><a class="page-link" href="{{ $portfolios->url($portfolios->lastPage()) }}">{{ $portfolios->lastPage() }}</a></li>
                            @endif
                            <li class="page-item {{ $portfolios->hasMorePages() ? '' : 'disabled' }}">
                                <a class="page-link" href="{{ $portfolios->nextPageUrl() ?? '#' }}" aria-label="Page suivante"><i class="fas fa-chevron-right"></i></a>
                            </li>
                        </ul>
                    </nav>
                @endif
            @else
                <div class="empty-state">
                    <i class="fas fa-building"></i>
                    <h3>Aucun projet pour le moment</h3>
                    <p>
                        @if ($categorie !== 'tous')
                            Aucun projet dans la catégorie « {{ $label($categorie) }} » pour l'instant.
                        @else
                            Nos projets seront bientôt publiés.
                        @endif
                    </p>
                    @if ($categorie !== 'tous')
                        <a href="{{ route('page.portfolios') }}" class="btn-sage">Voir tous les projets</a>
                    @endif
                </div>
            @endif
        </div>
    </section>

    @include('frontend.components.boutton_form_projet')
    @include('frontend.components.lightbox')
@endsection

@push('scripts')
    <script>
        document.querySelectorAll('.js-gallery').forEach(btn => btn.addEventListener('click', () => {
            SageLightbox.open(JSON.parse(btn.dataset.images || '[]'), 0, btn.dataset.title);
        }));
    </script>
@endpush
