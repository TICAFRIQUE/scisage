@extends('frontend.layouts.app')

@section('title', 'Accueil')

@section('content')
    <!-- Section Bannière Principale -->
    @include('frontend.sections.banniere')

    <!-- Section Statistiques -->
    @include('frontend.sections.statistique')

    <!-- Section Présentation -->
    @include('frontend.sections.presentation')

    <!-- Section Chronogramme -->
    @include('frontend.sections.projets')

    <!-- Section FAQ -->
    @include('frontend.sections.faq')

    @include('frontend.sections.form_projet2')
@endsection
