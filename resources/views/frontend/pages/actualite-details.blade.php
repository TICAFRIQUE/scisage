@extends('frontend.layouts.app')

@php
    $mainImage = $actualite->getFirstMediaUrl('image_principale');
    $gallery = $actualite->getMedia('galerie')->map->getUrl()->values();
    $allImages = collect([$mainImage])->merge($gallery)->filter()->values();
    $plain = trim(html_entity_decode(strip_tags($actualite->description ?? ''), ENT_QUOTES, 'UTF-8'));
    $minutes = max(1, (int) ceil(str_word_count($plain) / 200));
    $date = $actualite->created_at?->copy()->locale('fr');
@endphp

@section('title', ($actualite->libelle ?? 'Actualité') . ' | SCI SAGES')
@section('description', Str::limit($plain ?: 'Actualité SCI SAGES', 160))
@section('og_title', $actualite->libelle)
@section('og_description', Str::limit($plain, 150))
@section('og_image', $mainImage ?: asset('images/logo.png'))

@section('content')
    @include('frontend.components.page_hero', [
        'eyebrow' => $date ? 'Publié le ' . $date->translatedFormat('d F Y') : 'Actualité',
        'title' => $actualite->libelle ?? 'Actualité',
        'image' => $mainImage ?: null,
        'crumbs' => ['Actualités' => route('page.actualites'), Str::limit($actualite->libelle, 40) => null],
    ])

    <section class="section">
        <div class="container">
            <article class="article" data-aos="fade-up">
                <div class="article__meta">
                    @if ($date)
                        <span><i class="fas fa-calendar"></i> {{ $date->translatedFormat('d F Y') }}</span>
                    @endif
                    <span><i class="fas fa-clock"></i> {{ $minutes }} min de lecture</span>
                    @if ($allImages->count())
                        <span><i class="fas fa-images"></i> {{ $allImages->count() }} photos</span>
                    @endif
                </div>

                @if ($mainImage)
                    <button type="button" class="article__cover img-frame js-open" data-index="0" aria-label="Agrandir l'image">
                        <img src="{{ $mainImage }}" alt="{{ $actualite->libelle }}" decoding="async" class="img-fade">
                    </button>
                @endif

                <div class="article__content">
                    @if ($actualite->description)
                        {!! $actualite->description !!}
                    @else
                        <p>Le contenu de cette actualité sera bientôt disponible.</p>
                    @endif
                </div>

                <div class="article__share">
                    <span>Partager :</span>
                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}" target="_blank" rel="noopener" aria-label="Partager sur Facebook"><i class="fab fa-facebook-f"></i></a>
                    <a href="https://wa.me/?text={{ urlencode($actualite->libelle . ' ' . url()->current()) }}" target="_blank" rel="noopener" aria-label="Partager sur WhatsApp"><i class="fab fa-whatsapp"></i></a>
                    <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode(url()->current()) }}" target="_blank" rel="noopener" aria-label="Partager sur LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </article>
        </div>
    </section>

    @if ($gallery->count())
        <section class="section section--sand">
            <div class="container">
                <div class="section-head">
                    <span class="eyebrow">En images</span>
                    <h2 class="section-title">Galerie photos</h2>
                </div>
                <div class="gallery">
                    @foreach ($gallery as $i => $src)
                        <button type="button" class="gallery__item img-frame js-open" data-index="{{ $i + ($mainImage ? 1 : 0) }}"
                            aria-label="Agrandir la photo {{ $i + 1 }}" data-aos="fade-up" data-aos-delay="{{ ($i % 4) * 60 }}">
                            <img src="{{ $src }}" alt="{{ $actualite->libelle }} - photo {{ $i + 1 }}" loading="lazy" decoding="async" class="img-fade">
                            <span class="house__zoom"><i class="fas fa-magnifying-glass-plus"></i></span>
                        </button>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    <section class="section pt-4 pb-5">
        <div class="container text-center">
            <a href="{{ route('page.actualites') }}" class="btn-sage btn-sage--ghost"><i class="fas fa-arrow-left"></i> Toutes les actualités</a>
        </div>
    </section>

    @include('frontend.components.boutton_form_projet')
    @include('frontend.components.lightbox')
@endsection

@push('scripts')
    <script>
        (function() {
            const images = @json($allImages);
            const title = @json($actualite->libelle);
            document.querySelectorAll('.js-open').forEach(btn => btn.addEventListener('click', () => {
                SageLightbox.open(images, Number(btn.dataset.index), title);
            }));
        })();
    </script>
@endpush
