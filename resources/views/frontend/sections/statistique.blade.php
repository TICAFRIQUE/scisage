@if ($statistiques && $statistiques->count())
    <section class="stats-band" aria-label="SCI SAGES en chiffres">
        <div class="container">
            <div class="stats-band__grid">
                @foreach ($statistiques as $item)
                    <div class="stat" data-aos="fade-up" data-aos-delay="{{ $loop->index * 90 }}">
                        <span class="stat__icon"><i class="{{ $item->icone ?: 'fas fa-chart-line' }}"></i></span>
                        <div>
                            <div class="stat__number js-counter" data-target="{{ $item->chiffre }}">{{ $item->chiffre }}</div>
                            <div class="stat__label">{{ $item->libelle }}</div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endif
