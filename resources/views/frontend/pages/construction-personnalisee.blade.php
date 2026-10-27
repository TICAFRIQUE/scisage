@extends('frontend.layouts.app')
@section('title', 'Construction sur mesure - Faites construire votre maison | SCI SAGES')
@section('description', 'Faites construire votre maison sur mesure avec SCI SAGES : plans personnalisés, devis détaillé, suivi de chantier et remise des clés en Côte d\'Ivoire.')
@section('keywords', 'construction sur mesure, faire construire maison, constructeur Abidjan, villa sur mesure, BTP Côte d\'Ivoire, construction clé en main')
@section('og_title', 'Construction sur mesure - SCI SAGES')
@section('og_description', 'Construisez la maison qui vous ressemble avec un accompagnement complet de A à Z.')

@section('content')
    @include('frontend.components.page_hero', [
        'eyebrow' => 'Construction sur mesure',
        'title' => 'Construisons votre maison',
        'lead' => 'Vous avez un terrain et une idée ? Nos architectes, ingénieurs et chefs de chantier la transforment en maison, de la conception à la livraison.',
        'crumbs' => ['Construction sur mesure' => null],
    ])

    <section class="section">
        <div class="container">
            <div class="section-head">
                <span class="eyebrow">Pourquoi nous confier votre chantier</span>
                <h2 class="section-title">Un seul interlocuteur, de A à Z</h2>
            </div>

            <div class="features-grid">
                @foreach ([
                    ['fas fa-compass-drafting', 'Conception sur mesure', 'Plans adaptés à votre terrain, à vos besoins et à votre budget.'],
                    ['fas fa-helmet-safety', 'Équipe d\'experts', 'Architectes, ingénieurs et artisans qualifiés réunis sur votre projet.'],
                    ['fas fa-clipboard-check', 'Suivi de chantier', 'Points d\'avancement réguliers, photos et communication transparente.'],
                    ['fas fa-key', 'Remise des clés', 'Réception des travaux, état des lieux et garanties après livraison.'],
                ] as [$icon, $title, $text])
                    <div class="card-btp feature" data-aos="fade-up" data-aos-delay="{{ $loop->index * 80 }}">
                        <span class="icon-box"><i class="{{ $icon }}"></i></span>
                        <h3>{{ $title }}</h3>
                        <p>{{ $text }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="section section--sand" id="formulaire">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-9 col-xl-8">
                    <div class="section-head">
                        <span class="eyebrow">Votre demande</span>
                        <h2 class="section-title">Parlez-nous de votre projet</h2>
                        <p class="section-lead">Quelques informations suffisent : un conseiller vous rappelle sous 48 h pour en discuter.</p>
                    </div>

                    <form id="constructionForm" class="form-panel" novalidate data-aos="fade-up">
                        @csrf
                        <div class="form-panel__step"><span>1</span> Vos coordonnées</div>
                        <div class="row g-3 mb-4">
                            <div class="col-12">
                                <label for="nom" class="form-label">Nom complet *</label>
                                <input type="text" class="form-control" id="nom" name="nom" autocomplete="name" required>
                            </div>
                            <div class="col-md-6">
                                <label for="telephone" class="form-label">Téléphone *</label>
                                <input type="tel" class="form-control" id="telephone" name="telephone" autocomplete="tel"
                                    placeholder="+225 07 00 00 00 00" required>
                            </div>
                            <div class="col-md-6">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" autocomplete="email">
                            </div>
                        </div>

                        <div class="form-panel__step"><span>2</span> Votre projet</div>
                        <div class="row g-3">
                            <div class="col-12">
                                <label for="ville" class="form-label">Ville / commune du terrain *</label>
                                <input type="text" class="form-control" id="ville" name="ville"
                                    placeholder="Abidjan, Bingerville, Yamoussoukro…" required>
                            </div>
                            <div class="col-12">
                                <label for="description_projet" class="form-label">Description du projet *</label>
                                <textarea class="form-control" id="description_projet" name="description_projet" rows="6" maxlength="2000"
                                    placeholder="Nombre de chambres, style, surface du terrain, équipements souhaités, délai…" required></textarea>
                                <div class="form-text">Plus vous êtes précis, plus notre première proposition sera juste.</div>
                            </div>
                            <div class="col-12 mt-4">
                                <button type="submit" class="btn-sage btn-sage--lg btn-sage--block">
                                    <i class="fas fa-paper-plane"></i> <span>Envoyer mon projet</span>
                                </button>
                                <p class="form-note"><i class="fas fa-lock"></i> Étude gratuite et sans engagement.</p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        (function() {
            const form = document.getElementById('constructionForm');
            if (!form) return;
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                if (!form.checkValidity()) {
                    form.classList.add('was-validated');
                    form.querySelector(':invalid')?.focus();
                    return;
                }
                const btn = form.querySelector('button[type="submit"]');
                const label = btn.querySelector('span');
                const original = label.textContent;
                btn.disabled = true;
                label.textContent = 'Envoi en cours…';

                fetch('{{ route('page.construction.personnalisee.send') }}', {
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
                        form.reset();
                        form.classList.remove('was-validated');
                        Swal.fire({ icon: 'success', title: 'Projet envoyé !', text: 'Merci, un conseiller vous recontacte très vite.' });
                    })
                    .catch(() => Swal.fire({ icon: 'error', title: 'Envoi impossible', text: 'Merci de réessayer ou de nous appeler directement.' }))
                    .finally(() => {
                        btn.disabled = false;
                        label.textContent = original;
                    });
            });
        })();
    </script>
@endpush
