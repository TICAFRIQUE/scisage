@php
    $slidesUrls = collect($banniere ?? [])
        ->map(function ($slide) {
            $media = $slide->media?->where('collection_name', 'banniere')->first() ?? $slide->media?->first();
            return $media?->getFullUrl();
        })
        ->filter()
        ->values();
@endphp

<section id="accueil" class="hero" aria-label="Présentation SCI SAGES">
    <!-- Diaporama : seule la 1re image est chargée immédiatement, les suivantes après le chargement de la page -->
    <div class="hero__slides" aria-hidden="true">
        @forelse ($slidesUrls as $index => $url)
            <div class="hero__slide {{ $index === 0 ? 'is-active' : '' }}">
                @if ($index === 0)
                    <img src="{{ $url }}" alt="" fetchpriority="high" decoding="async">
                @else
                    <img data-src="{{ $url }}" alt="" decoding="async">
                @endif
            </div>
        @empty
            <div class="hero__slide is-active hero__slide--empty"></div>
        @endforelse
    </div>
    <div class="hero__overlay" aria-hidden="true"></div>

    <div class="container hero__container">
        <div class="hero__content">
            <span class="eyebrow" data-aos="fade-up">Promoteur immobilier &amp; BTP · Côte d'Ivoire</span>
            <h1 class="hero__title" data-aos="fade-up" data-aos-delay="80">
                Nous bâtissons <span>la maison de vos rêves</span>
            </h1>
            <p class="hero__lead" data-aos="fade-up" data-aos-delay="160">
                Maisons clé en main ou construction sur mesure : de l'étude du terrain à la remise des clés,
                nos équipes pilotent votre chantier avec rigueur et transparence.
            </p>
            <div class="hero__actions" data-aos="fade-up" data-aos-delay="240">
                <a href="#form-projet" class="btn-sage btn-sage--lg">
                    <i class="fas fa-helmet-safety"></i> Démarrer mon projet
                </a>
                <a href="{{ route('page.portfolios', ['categorie' => 'realisations']) }}" class="btn-sage btn-sage--outline btn-sage--lg">
                    Nos réalisations <i class="fas fa-arrow-right"></i>
                </a>
            </div>
        </div>

        @if ($activites && $activites->count())
            <div class="hero__services" data-aos="fade-up" data-aos-delay="320">
                @foreach ($activites as $item)
                    <a href="{{ route('page.activites', $item->slug) }}" class="hero-service">
                        <span class="hero-service__icon"><i class="{{ $item->icone ?: 'fas fa-hard-hat' }}"></i></span>
                        <span class="hero-service__text">
                            <small>0{{ $loop->iteration }} · Notre offre</small>
                            <strong>{{ $item->libelle }}</strong>
                        </span>
                        <i class="fas fa-arrow-right hero-service__arrow"></i>
                    </a>
                @endforeach
            </div>
        @endif
    </div>

    @if ($slidesUrls->count() > 1)
        <div class="hero__controls">
            <button type="button" class="hero__nav" data-dir="-1" aria-label="Image précédente"><i class="fas fa-chevron-left"></i></button>
            <div class="hero__dots" role="tablist" aria-label="Choisir une image">
                @foreach ($slidesUrls as $index => $url)
                    <button type="button" class="hero__dot {{ $index === 0 ? 'is-active' : '' }}" data-index="{{ $index }}"
                        aria-label="Image {{ $index + 1 }}"><span></span></button>
                @endforeach
            </div>
            <button type="button" class="hero__nav" data-dir="1" aria-label="Image suivante"><i class="fas fa-chevron-right"></i></button>
        </div>
    @endif

    <a href="#presentation" class="hero__scroll" aria-label="Découvrir la suite"><span></span></a>
</section>

@push('scripts')
    <script>
        (function() {
            const hero = document.querySelector('.hero');
            if (!hero) return;
            const slides = [...hero.querySelectorAll('.hero__slide')];
            const dots = [...hero.querySelectorAll('.hero__dot')];
            if (slides.length < 2) return;

            const DELAY = 6000;
            let current = 0;
            let timer = null;

            // Charge les images suivantes une fois la page prête (ne ralentit pas l'affichage initial)
            const loadRest = () => hero.querySelectorAll('img[data-src]').forEach(img => {
                img.src = img.dataset.src;
                img.removeAttribute('data-src');
            });
            if (document.readyState === 'complete') loadRest();
            else window.addEventListener('load', loadRest);

            const go = index => {
                const next = (index + slides.length) % slides.length;
                if (next === current) return;
                const img = slides[next].querySelector('img[data-src]');
                if (img) { img.src = img.dataset.src; img.removeAttribute('data-src'); }
                slides[current].classList.remove('is-active');
                dots[current]?.classList.remove('is-active');
                current = next;
                slides[current].classList.add('is-active');
                dots[current]?.classList.add('is-active');
                restart();
            };

            const restart = () => {
                clearInterval(timer);
                hero.style.setProperty('--hero-delay', DELAY + 'ms');
                timer = setInterval(() => go(current + 1), DELAY);
            };

            hero.querySelectorAll('.hero__nav').forEach(btn => btn.addEventListener('click', () => go(current + Number(btn.dataset.dir))));
            dots.forEach(dot => dot.addEventListener('click', () => go(Number(dot.dataset.index))));

            // Balayage tactile
            let startX = null;
            hero.addEventListener('touchstart', e => { startX = e.touches[0].clientX; }, { passive: true });
            hero.addEventListener('touchend', e => {
                if (startX === null) return;
                const diff = startX - e.changedTouches[0].clientX;
                if (Math.abs(diff) > 50) go(current + (diff > 0 ? 1 : -1));
                startX = null;
            });

            // Pause quand l'onglet est caché
            document.addEventListener('visibilitychange', () => document.hidden ? clearInterval(timer) : restart());

            if (!window.matchMedia('(prefers-reduced-motion: reduce)').matches) restart();
        })();
    </script>
@endpush
