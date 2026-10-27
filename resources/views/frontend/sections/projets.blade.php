@if ($activites && $activites->count())
    <section id="projets" class="section section--dark process">
        <div class="container">
            <div class="section-head">
                <span class="eyebrow">Notre méthode</span>
                <h2 class="section-title">Votre projet, étape par étape</h2>
                <p class="section-lead">Un parcours clair et balisé, du premier rendez-vous à la remise des clés.</p>
            </div>

            @if ($activites->count() > 1)
                <div class="process__tabs" role="tablist" aria-label="Choisir un parcours" data-aos="fade-up">
                    @foreach ($activites as $activite)
                        <button type="button" class="process__tab {{ $loop->first ? 'is-active' : '' }}" role="tab"
                            id="tab-{{ $activite->slug }}" aria-controls="panel-{{ $activite->slug }}"
                            aria-selected="{{ $loop->first ? 'true' : 'false' }}" tabindex="{{ $loop->first ? '0' : '-1' }}">
                            <i class="{{ $activite->icone ?: 'fas fa-hard-hat' }}"></i>
                            <span>{{ $activite->libelle }}</span>
                        </button>
                    @endforeach
                </div>
            @endif

            @foreach ($activites as $activite)
                <div class="process__panel {{ $loop->first ? 'is-active' : '' }}" role="tabpanel"
                    id="panel-{{ $activite->slug }}" aria-labelledby="tab-{{ $activite->slug }}"
                    @unless ($loop->first) hidden @endunless>
                    @if ($activite->projets && $activite->projets->count())
                        <ol class="steps">
                            @foreach ($activite->projets as $projet)
                                <li class="step" data-aos="fade-up" data-aos-delay="{{ min($loop->index, 5) * 60 }}">
                                    <span class="step__num">{{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}</span>
                                    <h3 class="step__title">{{ $projet->libelle }}</h3>
                                    <p class="step__text">{{ $projet->description }}</p>
                                </li>
                            @endforeach
                        </ol>
                    @else
                        <p class="text-center section-lead">{{ $activite->description ?: 'Les étapes de ce parcours seront bientôt détaillées.' }}</p>
                    @endif

                    <div class="text-center mt-5">
                        <a href="{{ route('page.activites', $activite->slug) }}" class="btn-sage">
                            Découvrir ce parcours <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    @push('scripts')
        <script>
            (function() {
                const tabs = [...document.querySelectorAll('.process__tab')];
                if (!tabs.length) return;
                const select = tab => {
                    tabs.forEach(t => {
                        const on = t === tab;
                        t.classList.toggle('is-active', on);
                        t.setAttribute('aria-selected', on);
                        t.tabIndex = on ? 0 : -1;
                        const panel = document.getElementById(t.getAttribute('aria-controls'));
                        panel.hidden = !on;
                        panel.classList.toggle('is-active', on);
                        if (on) panel.querySelectorAll('[data-aos]').forEach(el => el.classList.add('aos-animate'));
                    });
                };
                tabs.forEach((tab, i) => {
                    tab.addEventListener('click', () => select(tab));
                    tab.addEventListener('keydown', e => {
                        if (e.key !== 'ArrowRight' && e.key !== 'ArrowLeft') return;
                        const next = tabs[(i + (e.key === 'ArrowRight' ? 1 : -1) + tabs.length) % tabs.length];
                        next.focus();
                        select(next);
                    });
                });
            })();
        </script>
    @endpush
@endif
