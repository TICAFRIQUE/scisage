@extends('frontend.layouts.app')
@section('title', 'Catalogue de maisons - Souscription | SCI SAGES')
@section('description', 'Découvrez le catalogue de maisons SCI SAGES : villas et duplex modernes clé en main en Côte d\'Ivoire. Choisissez votre future maison et réservez en ligne.')
@section('keywords', 'catalogue maison, villa clé en main, souscription immobilière, achat villa Abidjan, maison moderne Côte d\'Ivoire')
@section('og_title', 'Catalogue de maisons - SCI SAGES')
@section('og_description', 'Villas et duplex modernes clé en main. Trouvez la maison de vos rêves.')

@section('content')
    @include('frontend.components.page_hero', [
        'eyebrow' => 'Maisons clé en main',
        'title' => 'Catalogue de maisons',
        'lead' => 'Des modèles conçus et construits par nos équipes, prix connus d\'avance. Choisissez votre future maison, nous nous occupons du reste.',
        'crumbs' => ['Catalogue' => null],
    ])

    <section class="section section--sand">
        <div class="container">
            <div class="works__head">
                <div class="section-head section-head--left mb-0">
                    <span class="eyebrow">Nos modèles</span>
                    <h2 class="section-title">Maisons disponibles</h2>
                    <p class="section-lead">{{ $portfolios->count() }} {{ Str::plural('maison', $portfolios->count()) }} au catalogue</p>
                </div>
            </div>

            @if ($portfolios->count())
                <div class="cards-grid">
                    @foreach ($portfolios as $portfolio)
                        @php
                            $allImages = collect([$portfolio->getFirstMediaUrl('image_principale')])
                                ->merge($portfolio->getMedia('galerie')->map->getUrl())
                                ->filter()->values()->all();
                            $price = $portfolio->prix ? number_format($portfolio->prix, 0, ',', ' ') . ' FCFA' : 'Prix sur demande';
                        @endphp
                        <article class="house" data-aos="fade-up" data-aos-delay="{{ ($loop->index % 3) * 80 }}">
                            <div class="house__media img-frame">
                                @if (!empty($allImages))
                                    <img src="{{ $allImages[0] }}" alt="{{ $portfolio->libelle }}" loading="lazy" decoding="async" class="img-fade">
                                    <button type="button" class="house__photos js-gallery" data-title="{{ $portfolio->libelle }}"
                                        data-images='@json($allImages)'>
                                        <i class="fas fa-images"></i> {{ count($allImages) }} photos
                                    </button>
                                @endif
                                <span class="house__type">{{ ucfirst($portfolio->type ?: 'Maison') }}</span>
                            </div>
                            <div class="house__body">
                                <h3 class="house__title">{{ $portfolio->libelle }}</h3>
                                @if ($portfolio->localisation)
                                    <p class="house__loc"><i class="fas fa-location-dot"></i> {{ $portfolio->localisation }}</p>
                                @endif
                                @php $features = \App\Support\Features::split($portfolio->caracteristique); @endphp
                                @if ($features->isNotEmpty())
                                    <ul class="chips mb-3">
                                        @foreach ($features->take(5) as $feature)
                                            <li>{{ $feature }}</li>
                                        @endforeach
                                    </ul>
                                @endif
                                <div class="house__foot">
                                    <div class="house__price">
                                        <small>{{ $portfolio->prix ? 'Prix' : 'Tarif' }}</small>
                                        {{ $price }}
                                    </div>
                                    <button type="button" class="btn-sage btn-sage--sm js-choose" data-id="{{ $portfolio->id }}"
                                        data-title="{{ $portfolio->libelle }}" data-price="{{ $price }}">
                                        Choisir <i class="fas fa-arrow-right"></i>
                                    </button>
                                </div>
                            </div>
                        </article>
                    @endforeach
                </div>
            @else
                <div class="empty-state">
                    <i class="fas fa-house-chimney"></i>
                    <h3>Catalogue en préparation</h3>
                    <p>De nouveaux modèles arrivent bientôt. Vous avez déjà un projet ? Parlons-en.</p>
                    <a href="{{ route('page.construction.personnalisee') }}" class="btn-sage">Faire construire sur mesure</a>
                </div>
            @endif
        </div>
    </section>

    <!-- Formulaire de souscription -->
    <div class="modal fade sage-modal" id="subscriptionModal" tabindex="-1" aria-labelledby="subscriptionTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title" id="subscriptionTitle"><i class="fas fa-file-signature me-2"></i>Demande de souscription</h2>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Fermer"></button>
                </div>
                <div class="modal-body">
                    <div class="selected-house">
                        <span class="icon-box icon-box--dark"><i class="fas fa-house"></i></span>
                        <div>
                            <small>Maison sélectionnée</small>
                            <strong id="selectedHouseName"></strong>
                        </div>
                        <span class="selected-house__price" id="selectedHousePrice"></span>
                    </div>

                    <form id="subscriptionForm" novalidate>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label" for="s-nom">Nom complet *</label>
                                <input type="text" class="form-control" id="s-nom" name="nom" autocomplete="name" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="s-tel">Téléphone *</label>
                                <input type="tel" class="form-control" id="s-tel" name="telephone" autocomplete="tel" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="s-email">Email</label>
                                <input type="email" class="form-control" id="s-email" name="email" autocomplete="email">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="s-adresse">Lieu de résidence</label>
                                <input type="text" class="form-control" id="s-adresse" name="adresse">
                            </div>
                            <div class="col-12">
                                <label class="form-label" for="s-message">Message</label>
                                <textarea class="form-control" id="s-message" rows="4" name="message" maxlength="1000"
                                    placeholder="Questions, préférences, mode de financement envisagé…"></textarea>
                            </div>
                        </div>
                        <input type="hidden" name="portfolio_id" id="portfolioId">
                        <input type="hidden" name="titre_maison" id="titreMaison">
                        <button type="submit" class="btn-sage btn-sage--lg btn-sage--block mt-4">
                            <i class="fas fa-paper-plane"></i> <span>Envoyer ma demande</span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @include('frontend.components.lightbox')
@endsection

@push('scripts')
    <script>
        (function() {
            document.querySelectorAll('.js-gallery').forEach(btn => btn.addEventListener('click', () => {
                SageLightbox.open(JSON.parse(btn.dataset.images || '[]'), 0, btn.dataset.title);
            }));

            const modalEl = document.getElementById('subscriptionModal');
            const form = document.getElementById('subscriptionForm');
            if (!modalEl || !form) return;

            document.querySelectorAll('.js-choose').forEach(btn => btn.addEventListener('click', () => {
                document.getElementById('selectedHouseName').textContent = btn.dataset.title;
                document.getElementById('selectedHousePrice').textContent = btn.dataset.price;
                document.getElementById('portfolioId').value = btn.dataset.id;
                document.getElementById('titreMaison').value = btn.dataset.title;
                bootstrap.Modal.getOrCreateInstance(modalEl).show();
            }));

            form.addEventListener('submit', function(e) {
                e.preventDefault();
                if (!form.checkValidity()) {
                    form.classList.add('was-validated');
                    form.querySelector(':invalid')?.focus();
                    return;
                }
                const btn = form.querySelector('button[type="submit"]');
                const label = btn.querySelector('span');
                btn.disabled = true;
                label.textContent = 'Envoi en cours…';

                fetch('{{ route('page.envoyer-souscription-catalogue') }}', {
                        method: 'POST',
                        body: new FormData(form),
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                            'Accept': 'application/json'
                        }
                    })
                    .then(r => r.json())
                    .then(data => {
                        if (!data.success) throw new Error(data.message);
                        bootstrap.Modal.getInstance(modalEl)?.hide();
                        form.reset();
                        form.classList.remove('was-validated');
                        Swal.fire({ icon: 'success', title: 'Demande envoyée !', text: 'Nous vous recontactons très prochainement.' });
                    })
                    .catch(() => Swal.fire({ icon: 'error', title: 'Envoi impossible', text: 'Merci de réessayer ou de nous appeler directement.' }))
                    .finally(() => {
                        btn.disabled = false;
                        label.textContent = 'Envoyer ma demande';
                    });
            });
        })();
    </script>
@endpush
