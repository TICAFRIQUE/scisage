@extends('backend.layouts.master')
@section('title')
    Tableau de bord
@endsection

@section('content')
    @php
        $now = now()->locale('fr');
        $hour = (int) $now->format('H');
        $greeting = $hour < 12 ? 'Bonjour' : ($hour < 18 ? 'Bon après-midi' : 'Bonsoir');
    @endphp

    <!-- Bandeau d'accueil -->
    <div class="sage-welcome">
        <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
            <div>
                <div class="sage-welcome__date">{{ ucfirst($now->translatedFormat('l d F Y')) }}</div>
                <h2>{{ $greeting }}, <span>{{ Auth::user()->username ?? 'Admin' }}</span></h2>
                <p class="mb-0">Gérez le contenu du site SCI SAGES : chantiers, catalogue, actualités et informations de contact.</p>
            </div>
            <div class="d-flex flex-wrap gap-2">
                <a href="{{ route('portfolios.create') }}" class="btn btn-primary"><i class="ri-add-line me-1"></i> Nouveau projet</a>
                <a href="{{ route('page.accueil') }}" target="_blank" rel="noopener" class="btn btn-outline-light">
                    <i class="ri-external-link-line me-1"></i> Voir le site
                </a>
            </div>
        </div>
    </div>

    @include('backend.components.alertMessage')

    <!-- Indicateurs -->
    <div class="row g-3 mb-4">
        @foreach ($kpis as $kpi)
            <div class="col-xl-3 col-sm-6">
                <a href="{{ route($kpi['route']) }}" class="card sage-kpi mb-0">
                    <span class="sage-kpi__icon"><i class="{{ $kpi['icon'] }}"></i></span>
                    <span>
                        <span class="sage-kpi__label d-block">{{ $kpi['label'] }}</span>
                        <span class="sage-kpi__value d-block my-1">{{ $kpi['value'] }}</span>
                        <span class="sage-kpi__sub">{{ $kpi['sub'] }}</span>
                    </span>
                </a>
            </div>
        @endforeach
    </div>

    <div class="row g-4">
        <div class="col-xl-8">
            <!-- Accès rapides -->
            <div class="card">
                <div class="card-header d-flex">
                    <h5 class="card-title flex-grow-1"><i class="ri-flashlight-line me-1"></i> Accès rapides</h5>
                </div>
                <div class="card-body">
                    <div class="sage-quick">
                        <a href="{{ route('portfolios.create') }}"><i class="ri-building-2-line"></i> Ajouter un projet</a>
                        <a href="{{ route('actualites.create') }}"><i class="ri-newspaper-line"></i> Publier une actualité</a>
                        <a href="{{ route('bannieres.create') }}"><i class="ri-image-add-line"></i> Ajouter une bannière</a>
                        <a href="{{ route('faqs.create') }}"><i class="ri-question-answer-line"></i> Ajouter une question</a>
                        <a href="{{ route('projets.index') }}"><i class="ri-list-ordered"></i> Gérer les étapes</a>
                        <a href="{{ route('parametre.index') }}"><i class="ri-settings-3-line"></i> Coordonnées du site</a>
                    </div>
                </div>
            </div>

            <div class="row g-4">
                <!-- Derniers projets -->
                <div class="col-lg-6">
                    <div class="card h-100 mb-0">
                        <div class="card-header d-flex">
                            <h5 class="card-title flex-grow-1"><i class="ri-building-2-line me-1"></i> Derniers projets</h5>
                            <a href="{{ route('portfolios.index') }}" class="btn btn-sm btn-soft-primary">Tout voir</a>
                        </div>
                        <div class="card-body py-2">
                            <ul class="sage-list">
                                @forelse ($derniersPortfolios as $item)
                                    <li>
                                        @if ($item->hasMedia('image_principale'))
                                            <img src="{{ $item->getFirstMediaUrl('image_principale') }}" alt="" loading="lazy">
                                        @else
                                            <span class="sage-list__ph"><i class="ri-image-line"></i></span>
                                        @endif
                                        <div class="flex-grow-1 overflow-hidden">
                                            <a href="{{ route('portfolios.edit', $item->id) }}" class="sage-list__title">{{ $item->libelle ?: 'Sans titre' }}</a>
                                            <span class="sage-list__meta">{{ ucfirst($item->categorie) }} · {{ $item->created_at?->locale('fr')->diffForHumans() }}</span>
                                        </div>
                                        <span class="badge {{ $item->is_active ? 'bg-success-subtle text-success' : 'bg-danger-subtle text-danger' }}">
                                            {{ $item->is_active ? 'En ligne' : 'Masqué' }}
                                        </span>
                                    </li>
                                @empty
                                    <li class="text-muted">Aucun projet pour le moment.</li>
                                @endforelse
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Dernières actualités -->
                <div class="col-lg-6">
                    <div class="card h-100 mb-0">
                        <div class="card-header d-flex">
                            <h5 class="card-title flex-grow-1"><i class="ri-newspaper-line me-1"></i> Dernières actualités</h5>
                            <a href="{{ route('actualites.index') }}" class="btn btn-sm btn-soft-primary">Tout voir</a>
                        </div>
                        <div class="card-body py-2">
                            <ul class="sage-list">
                                @forelse ($dernieresActualites as $item)
                                    <li>
                                        @if ($item->hasMedia('image_principale'))
                                            <img src="{{ $item->getFirstMediaUrl('image_principale') }}" alt="" loading="lazy">
                                        @else
                                            <span class="sage-list__ph"><i class="ri-article-line"></i></span>
                                        @endif
                                        <div class="flex-grow-1 overflow-hidden">
                                            <a href="{{ route('actualites.edit', $item->id) }}" class="sage-list__title">{{ $item->libelle }}</a>
                                            <span class="sage-list__meta">{{ $item->created_at?->locale('fr')->translatedFormat('d M Y') }}</span>
                                        </div>
                                        <span class="badge {{ $item->is_active ? 'bg-success-subtle text-success' : 'bg-danger-subtle text-danger' }}">
                                            {{ $item->is_active ? 'Publiée' : 'Brouillon' }}
                                        </span>
                                    </li>
                                @empty
                                    <li class="text-muted">Aucune actualité pour le moment.</li>
                                @endforelse
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Complétude du site -->
        <div class="col-xl-4">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title"><i class="ri-checkbox-multiple-line me-1"></i> Complétude du site</h5>
                </div>
                <div class="card-body">
                    <div class="d-flex align-items-end justify-content-between mb-2">
                        <span class="sage-kpi__value">{{ $score }}%</span>
                        <span class="text-muted small">{{ collect($checklist)->filter(fn($c) => $c[1])->count() }} / {{ count($checklist) }} éléments</span>
                    </div>
                    <div class="sage-progress mb-3"><span style="width: {{ $score }}%"></span></div>

                    @foreach ($checklist as [$label, $ok, $route])
                        <div class="sage-check">
                            <i class="{{ $ok ? 'ri-checkbox-circle-fill text-success' : 'ri-error-warning-line text-warning' }}"></i>
                            <span class="flex-grow-1 {{ $ok ? 'text-muted' : 'fw-semibold' }}">{{ $label }}</span>
                            @unless ($ok)
                                <a href="{{ route($route) }}" class="btn btn-sm btn-soft-primary">Compléter</a>
                            @endunless
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
