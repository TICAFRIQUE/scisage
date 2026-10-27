@if (isset($realisations) && $realisations->count())
    <section id="realisations" class="section section--sand works">
        <div class="container">
            <div class="works__head">
                <div class="section-head section-head--left mb-0">
                    <span class="eyebrow">Portfolio</span>
                    <h2 class="section-title">Nos dernières réalisations</h2>
                    <p class="section-lead">Villas, duplex et résidences livrés ou en cours de construction.</p>
                </div>
                <a href="{{ route('page.portfolios') }}" class="btn-sage btn-sage--ghost d-none d-md-inline-flex">
                    Tout le portfolio <i class="fas fa-arrow-right"></i>
                </a>
            </div>

            <div class="works__grid">
                @foreach ($realisations as $item)
                    @php $img = $item->getFirstMediaUrl('image_principale'); @endphp
                    <a href="{{ route('page.portfolios', ['categorie' => $item->categorie]) }}"
                        class="work {{ $loop->first ? 'work--featured' : '' }}" data-aos="fade-up"
                        data-aos-delay="{{ $loop->index * 70 }}">
                        <div class="work__img img-frame">
                            @if ($img)
                                <img src="{{ $img }}" alt="{{ $item->libelle }}" loading="lazy" decoding="async" class="img-fade">
                            @endif
                        </div>
                        <div class="work__body">
                            <span class="work__tag">{{ ucfirst($item->categorie) }}@if ($item->type) · {{ ucfirst($item->type) }}@endif</span>
                            <h3 class="work__title">{{ $item->libelle }}</h3>
                            @if ($item->localisation)
                                <span class="work__loc"><i class="fas fa-location-dot"></i> {{ $item->localisation }}</span>
                            @endif
                        </div>
                    </a>
                @endforeach
            </div>

            <div class="text-center mt-4 d-md-none">
                <a href="{{ route('page.portfolios') }}" class="btn-sage btn-sage--ghost">
                    Tout le portfolio <i class="fas fa-arrow-right"></i>
                </a>
            </div>
        </div>
    </section>
@endif
