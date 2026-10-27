@extends('frontend.layouts.app')

@section('title', $activite->libelle . ' | SCI SAGES')
@section('description', Str::limit(strip_tags($activite->description ?: 'Découvrez le parcours ' . $activite->libelle . ' avec SCI SAGES, promoteur immobilier et constructeur en Côte d\'Ivoire.'), 160))
@section('keywords', strtolower($activite->libelle) . ', promoteur immobilier, construction maison, SCI SAGES, Côte d\'Ivoire')
@section('og_title', $activite->libelle . ' - SCI SAGES')
@section('og_description', Str::limit(strip_tags($activite->description ?? ''), 150))
@section('og_image', $activite->getFirstMediaUrl('image') ?: asset('images/logo.png'))

@php
    $isCatalogue = $activite->slug === 'souscrire-a-nos-maisons-de-reves';
    $isConstruction = $activite->slug === 'faire-construire-votre-maison-de-reve';
    $steps = $activite->projets ?? collect();
@endphp

@section('content')
    @include('frontend.components.page_hero', [
        'eyebrow' => 'Nos activités',
        'title' => $activite->libelle,
        'lead' => $activite->description ? Str::limit(strip_tags($activite->description), 180) : 'Un parcours clair et accompagné, étape par étape, jusqu\'à la remise des clés.',
        'image' => $activite->getFirstMediaUrl('image') ?: null,
        'crumbs' => ['Activités' => route('page.accueil') . '#projets', $activite->libelle => null],
    ])

    <section class="section section--sand">
        <div class="container">
            <div class="section-head">
                <span class="eyebrow">Le parcours</span>
                <h2 class="section-title">Les étapes de votre projet</h2>
                <p class="section-lead">{{ $steps->count() ? $steps->count() . ' étapes balisées, un interlocuteur unique du début à la fin.' : 'Notre approche méthodique pour mener votre projet à bien.' }}</p>
            </div>

            @if ($steps->count())
                <ol class="timeline-btp">
                    @foreach ($steps as $projet)
                        <li class="timeline-btp__item" data-aos="fade-up">
                            <span class="timeline-btp__num">{{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}</span>
                            <div class="timeline-btp__card card-btp">
                                <span class="timeline-btp__tag">
                                    @if ($loop->first)
                                        <i class="fas fa-flag me-1"></i> Démarrage
                                    @elseif ($loop->last)
                                        <i class="fas fa-key me-1"></i> Finalisation
                                    @else
                                        Étape {{ $loop->iteration }}
                                    @endif
                                </span>
                                <h3>{{ $projet->libelle }}</h3>
                                <p>{{ $projet->description }}</p>
                            </div>
                        </li>
                    @endforeach
                </ol>
            @else
                <div class="empty-state">
                    <i class="fas fa-person-digging"></i>
                    <h3>Informations en cours de mise à jour</h3>
                    <p>Les étapes de ce parcours seront bientôt détaillées. Contactez-nous pour en savoir plus dès maintenant.</p>
                    <a href="{{ route('page.accueil') }}#contact" class="btn-sage">Nous contacter</a>
                </div>
            @endif
        </div>
    </section>

    <section class="section pt-0 section--sand">
        <div class="container">
            <div class="action-box" data-aos="fade-up">
                <span class="icon-box"><i class="{{ $isCatalogue ? 'fas fa-house-chimney' : ($isConstruction ? 'fas fa-trowel-bricks' : 'fas fa-comments') }}"></i></span>
                <div>
                    @if ($isCatalogue)
                        <h2>Découvrez nos maisons</h2>
                        <p>Parcourez le catalogue et réservez la maison qui vous correspond.</p>
                    @elseif ($isConstruction)
                        <h2>Construisons votre maison</h2>
                        <p>Décrivez votre projet : nous revenons vers vous avec une première étude.</p>
                    @else
                        <h2>Intéressé par cette activité ?</h2>
                        <p>Un conseiller vous accompagne et répond à toutes vos questions.</p>
                    @endif
                </div>
                @if ($isCatalogue)
                    <a href="{{ route('page.souscrire.catalogue') }}" class="btn-sage btn-sage--lg">Voir le catalogue <i class="fas fa-arrow-right"></i></a>
                @elseif ($isConstruction)
                    <a href="{{ route('page.construction.personnalisee') }}" class="btn-sage btn-sage--lg">Démarrer mon projet <i class="fas fa-arrow-right"></i></a>
                @else
                    <a href="{{ route('page.accueil') }}#contact" class="btn-sage btn-sage--lg">Nous contacter <i class="fas fa-arrow-right"></i></a>
                @endif
            </div>
        </div>
    </section>

    @unless ($isCatalogue || $isConstruction)
        @include('frontend.components.boutton_form_projet')
    @endunless
@endsection
