@extends('frontend.layouts.app')

@section('title', 'SCI SAGE - Promoteur Immobilier en Côte d\'Ivoire | Maisons de Rêve')
@section('description', 'SCI SAGE, votre promoteur immobilier de confiance en Côte d\'Ivoire. Découvrez nos maisons modernes de rêve, nos projets sur mesure et notre catalogue de villas luxueuses à Abidjan.')
@section('keywords', 'promoteur immobilier Côte d\'Ivoire, maison moderne Abidjan, construction villa, vente maison luxueuse, immobilier CI, SCI SAGE, projet immobilier Abidjan')
@section('og_title', 'SCI SAGE - Votre Promoteur Immobilier en Côte d\'Ivoire')
@section('og_description', 'Découvrez nos maisons modernes de rêve et nos projets immobiliers clé en main en Côte d\'Ivoire.')

@section('content')
    <!-- Section Bannière Principale -->
    @include('frontend.sections.banniere')

    <!-- Section Statistiques -->
    @include('frontend.sections.statistique')

    <!-- Section Présentation -->
    @include('frontend.sections.presentation')

    <!-- Section engagements -->
    {{-- @include('frontend.sections.engagement') --}}

    <!-- Section Chronogramme -->
    @include('frontend.sections.projets')

    <!-- Section button demarrer votre projet -->
    @include('frontend.components.boutton_form_projet')

    <!-- Section FAQ -->
    @include('frontend.sections.faq')

    @include('frontend.sections.form_projet')

    @include('frontend.sections.contact')
@endsection
