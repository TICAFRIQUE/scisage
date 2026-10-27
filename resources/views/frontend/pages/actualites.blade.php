@extends('frontend.layouts.app')

@section('title', 'Actualités - Chantiers, livraisons et nouveautés | SCI SAGES')
@section('description', 'Suivez l\'actualité de SCI SAGES : avancement des chantiers, livraisons de maisons, nouveaux programmes immobiliers et conseils en Côte d\'Ivoire.')
@section('og_title', 'Actualités SCI SAGES')

@section('content')
    @include('frontend.components.page_hero', [
        'eyebrow' => 'Le journal du chantier',
        'title' => 'Actualités',
        'lead' => 'Avancement de nos chantiers, livraisons, nouveaux programmes : suivez la vie de SCI SAGES.',
        'crumbs' => ['Actualités' => null],
    ])

    <section class="section section--sand">
        <div class="container">
            @if ($actualites && $actualites->count())
                <div class="cards-grid">
                    @foreach ($actualites as $item)
                        @php
                            $url = route('page.actualites.details', ['slug' => $item->slug]);
                            $plain = trim(html_entity_decode(strip_tags($item->description ?? ''), ENT_QUOTES, 'UTF-8'));
                            $minutes = max(1, (int) ceil(str_word_count($plain) / 200));
                            $img = $item->getFirstMediaUrl('image_principale');
                        @endphp
                        <article class="post" data-aos="fade-up" data-aos-delay="{{ ($loop->index % 3) * 80 }}">
                            <a href="{{ $url }}" class="post__media img-frame" tabindex="-1" aria-hidden="true">
                                @if ($img)
                                    <img src="{{ $img }}" alt="" loading="lazy" decoding="async" class="img-fade">
                                @else
                                    <span class="post__placeholder"><i class="fas fa-helmet-safety"></i></span>
                                @endif
                                @if ($item->created_at)
                                    <time class="post__date" datetime="{{ $item->created_at->toDateString() }}">
                                        <strong>{{ $item->created_at->format('d') }}</strong>
                                        {{ $item->created_at->copy()->locale('fr')->translatedFormat('M Y') }}
                                    </time>
                                @endif
                            </a>
                            <div class="post__body">
                                <span class="post__meta"><i class="fas fa-clock"></i> {{ $minutes }} min de lecture</span>
                                <h2 class="post__title"><a href="{{ $url }}">{{ $item->libelle }}</a></h2>
                                <p class="post__excerpt">{{ Str::limit($plain, 140) }}</p>
                                <a href="{{ $url }}" class="link-arrow">Lire l'article <i class="fas fa-arrow-right"></i></a>
                            </div>
                        </article>
                    @endforeach
                </div>

                @if ($actualites->hasPages())
                    <nav class="mt-5" aria-label="Pagination des actualités">
                        <ul class="pagination justify-content-center">
                            <li class="page-item {{ $actualites->onFirstPage() ? 'disabled' : '' }}">
                                <a class="page-link" href="{{ $actualites->previousPageUrl() ?? '#' }}" aria-label="Page précédente"><i class="fas fa-chevron-left"></i></a>
                            </li>
                            @foreach ($actualites->getUrlRange(max(1, $actualites->currentPage() - 2), min($actualites->lastPage(), $actualites->currentPage() + 2)) as $page => $pageUrl)
                                <li class="page-item {{ $page == $actualites->currentPage() ? 'active' : '' }}">
                                    <a class="page-link" href="{{ $pageUrl }}" @if ($page == $actualites->currentPage()) aria-current="page" @endif>{{ $page }}</a>
                                </li>
                            @endforeach
                            <li class="page-item {{ $actualites->hasMorePages() ? '' : 'disabled' }}">
                                <a class="page-link" href="{{ $actualites->nextPageUrl() ?? '#' }}" aria-label="Page suivante"><i class="fas fa-chevron-right"></i></a>
                            </li>
                        </ul>
                    </nav>
                @endif
            @else
                <div class="empty-state">
                    <i class="fas fa-newspaper"></i>
                    <h3>Aucune actualité pour le moment</h3>
                    <p>Nos prochaines nouvelles de chantier arrivent bientôt. En attendant, découvrez nos réalisations.</p>
                    <a href="{{ route('page.portfolios') }}" class="btn-sage">Voir le portfolio</a>
                </div>
            @endif
        </div>
    </section>

    @include('frontend.components.boutton_form_projet')
@endsection
