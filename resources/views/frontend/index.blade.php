@extends('frontend.layouts.app')

@section('title', 'Accueil')

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
