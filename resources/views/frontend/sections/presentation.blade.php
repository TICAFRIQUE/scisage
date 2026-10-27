@php
    $aproposText = trim(preg_replace('/\s+/u', ' ', html_entity_decode(strip_tags(str_replace('</p>', '</p> ', $apropos?->description ?? '')), ENT_QUOTES, 'UTF-8')));
    $aproposText = str_replace("\u{00A0}", ' ', $aproposText);
    $aproposImage = $apropos?->getFirstMediaUrl('image');
@endphp

<section id="presentation" class="section about">
    <div class="container">
        <div class="about__grid">
            <div class="about__media" data-aos="fade-right">
                <div class="about__img img-frame">
                    @if ($aproposImage)
                        <img src="{{ $aproposImage }}" alt="SCI SAGES - Nous bâtissons votre rêve" loading="lazy" decoding="async" class="img-fade">
                    @endif
                </div>
                <div class="about__badge">
                    <i class="fas fa-helmet-safety"></i>
                    <span><strong>Promoteur</strong> &amp; constructeur</span>
                </div>
            </div>

            <div class="about__content" data-aos="fade-left">
                <div class="section-head section-head--left mb-4">
                    <span class="eyebrow">Qui sommes-nous ?</span>
                    <h2 class="section-title">Un promoteur bâtisseur à vos côtés</h2>
                </div>

                @if ($aproposText)
                    <p class="about__text">{{ Str::limit($aproposText, 460) }}</p>
                @else
                    <p class="about__text">
                        SCI SAGES conçoit, construit et commercialise des maisons modernes en Côte d'Ivoire.
                        Notre mission : rendre l'accès à un logement de qualité simple, sûr et transparent.
                    </p>
                @endif

                <ul class="about__checks">
                    <li><i class="fas fa-check"></i> Maisons clé en main et construction sur mesure</li>
                    <li><i class="fas fa-check"></i> Suivi de chantier et points d'avancement réguliers</li>
                    <li><i class="fas fa-check"></i> Accompagnement financement, notaire et après-vente</li>
                </ul>

                <div class="d-flex flex-wrap gap-3 mt-4">
                    <a href="{{ route('page.apropos') }}" class="btn-sage btn-sage--dark">
                        Lire le mot de la Direction <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>

        <!-- Nos valeurs -->
        @include('frontend.sections.engagement')
    </div>
</section>
