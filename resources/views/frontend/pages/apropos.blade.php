@extends('frontend.layouts.app')

@section('title', 'À propos - SCI SAGES, promoteur immobilier et constructeur en Côte d\'Ivoire')
@section('description', 'Découvrez SCI SAGES : notre vision, nos valeurs et notre engagement pour construire des maisons de qualité en Côte d\'Ivoire. Le mot de la Direction Générale.')
@section('keywords', 'à propos SCI SAGES, promoteur immobilier Côte d\'Ivoire, valeurs, construction maison, mot de la directrice')
@section('og_title', 'À propos de SCI SAGES')
@section('og_description', 'Notre vision, nos valeurs et notre engagement au service de vos projets immobiliers.')

@section('content')
    @include('frontend.components.page_hero', [
        'eyebrow' => 'Qui sommes-nous ?',
        'title' => 'À propos de SCI SAGES',
        'lead' => 'Promoteur immobilier et constructeur ivoirien, nous bâtissons des maisons solides, modernes et accessibles.',
        'crumbs' => ['À propos' => null],
    ])

    @if ($apropos)
        <section class="section">
            <div class="container">
                <div class="letter">
                    <aside class="letter__aside" data-aos="fade-right">
                        @if ($apropos->getFirstMediaUrl('image'))
                            <div class="letter__img img-frame">
                                <img src="{{ $apropos->getFirstMediaUrl('image') }}" alt="SCI SAGES - Nous bâtissons votre rêve"
                                    loading="lazy" decoding="async" class="img-fade">
                            </div>
                        @endif
                        <div class="letter__quote">
                            <i class="fas fa-quote-left"></i>
                            Se loger décemment demeure l'un des défis cruciaux en Côte d'Ivoire.
                        </div>
                    </aside>

                    <article class="letter__body" data-aos="fade-up">
                        <div class="section-head section-head--left mb-4">
                            <span class="eyebrow">Le mot de la Direction</span>
                            <h2 class="section-title">Construire avec vous, pour vous</h2>
                        </div>
                        {!! $apropos->description !!}
                    </article>
                </div>
            </div>
        </section>
    @endif

    @if ($engagements && $engagements->count())
        <section class="section section--sand">
            <div class="container">
                <div class="section-head">
                    <span class="eyebrow">Nos piliers</span>
                    <h2 class="section-title">Nos valeurs</h2>
                    <p class="section-lead">Trois engagements qui guident chacun de nos chantiers.</p>
                </div>
                <div class="values__grid">
                    @foreach ($engagements as $item)
                        <article class="card-btp value" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                            <div class="value__head">
                                <span class="icon-box"><i class="{{ $item->icone ?: 'fas fa-star' }}"></i></span>
                                <span class="value__num">0{{ $loop->iteration }}</span>
                            </div>
                            <h3 class="value__title">{{ $item->libelle }}</h3>
                            <p class="value__text">{{ $item->description }}</p>
                        </article>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    @if ($statistiques && $statistiques->count())
        <section class="section section--dark">
            <div class="container">
                <div class="section-head">
                    <span class="eyebrow">En chiffres</span>
                    <h2 class="section-title">SCI SAGES sur le terrain</h2>
                </div>
                <div class="stats-row">
                    @foreach ($statistiques as $item)
                        <div class="stat" data-aos="fade-up" data-aos-delay="{{ $loop->index * 90 }}">
                            <span class="stat__icon"><i class="{{ $item->icone ?: 'fas fa-chart-line' }}"></i></span>
                            <div>
                                <div class="stat__number js-counter" data-target="{{ $item->chiffre }}">{{ $item->chiffre }}</div>
                                <div class="stat__label">{{ $item->libelle }}</div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    @include('frontend.components.boutton_form_projet')
@endsection
