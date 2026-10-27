@extends('frontend.layouts.app')

@section('title', 'SCI SAGES - Promoteur immobilier & construction en Côte d\'Ivoire')
@section('description', 'SCI SAGES, promoteur immobilier et constructeur en Côte d\'Ivoire. Maisons modernes clé en main, construction sur mesure et suivi de chantier à Abidjan et Bingerville.')
@section('keywords', 'promoteur immobilier Côte d\'Ivoire, construction maison Abidjan, BTP, villa moderne, construction sur mesure, SCI SAGES, maison clé en main')
@section('og_title', 'SCI SAGES - Nous bâtissons votre rêve')
@section('og_description', 'Maisons modernes clé en main et construction sur mesure en Côte d\'Ivoire.')

@section('content')
    @include('frontend.sections.banniere')
    @include('frontend.sections.statistique')
    @include('frontend.sections.presentation')
    @include('frontend.sections.projets')
    @include('frontend.sections.realisations')
    @include('frontend.components.boutton_form_projet')
    @include('frontend.sections.faq')
    @include('frontend.sections.form_projet')
    @include('frontend.sections.contact')
@endsection
