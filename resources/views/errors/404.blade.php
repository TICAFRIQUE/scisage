@extends('frontend.layouts.app')

@section('title', 'Page introuvable | SCI SAGES')
@section('description', 'Cette page n\'existe pas ou a été déplacée. Retrouvez nos maisons, nos réalisations et nos actualités sur le site SCI SAGES.')
@section('robots', 'noindex, follow')

@section('content')
    <section class="section section--dark error-page">
        <div class="container">
            <div class="error-page__inner" data-aos="fade-up">
                <div class="error-page__code" aria-hidden="true">404</div>
                <span class="eyebrow">Chantier introuvable</span>
                <h1 class="error-page__title">Cette page n'existe pas</h1>
                <p class="section-lead">
                    Le lien est peut-être erroné ou la page a été déplacée. Voici quelques pistes pour retrouver votre chemin.
                </p>

                <div class="d-flex flex-wrap justify-content-center gap-3 mt-4">
                    <a href="{{ route('page.accueil') }}" class="btn-sage btn-sage--lg"><i class="fas fa-house"></i> Retour à l'accueil</a>
                    <a href="{{ route('page.accueil') }}#contact" class="btn-sage btn-sage--outline btn-sage--lg">Nous contacter</a>
                </div>

                <ul class="error-page__links">
                    <li><a href="{{ route('page.souscrire.catalogue') }}"><i class="fas fa-house-chimney"></i> Catalogue de maisons</a></li>
                    <li><a href="{{ route('page.construction.personnalisee') }}"><i class="fas fa-trowel-bricks"></i> Construction sur mesure</a></li>
                    <li><a href="{{ route('page.portfolios') }}"><i class="fas fa-building"></i> Nos réalisations</a></li>
                    <li><a href="{{ route('page.actualites') }}"><i class="fas fa-newspaper"></i> Actualités</a></li>
                </ul>
            </div>
        </div>
    </section>
@endsection
