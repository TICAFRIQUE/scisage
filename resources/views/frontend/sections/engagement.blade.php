@if ($engagements && $engagements->count())
    <div class="values" id="valeurs">
        <div class="section-head">
            <span class="eyebrow">Nos engagements</span>
            <h2 class="section-title">Ce qui guide chacun de nos chantiers</h2>
        </div>

        <div class="values__grid">
            @foreach ($engagements as $item)
                <article class="card-btp value" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                    <div class="value__head">
                        <span class="icon-box">
                            @if ($item->icone)
                                <i class="{{ $item->icone }}"></i>
                            @elseif ($item->getFirstMediaUrl('image'))
                                <img src="{{ $item->getFirstMediaUrl('image') }}" alt="" loading="lazy">
                            @else
                                <i class="fas fa-star"></i>
                            @endif
                        </span>
                        <span class="value__num">0{{ $loop->iteration }}</span>
                    </div>
                    <h3 class="value__title">{{ $item->libelle }}</h3>
                    <p class="value__text">{{ $item->description }}</p>
                </article>
            @endforeach
        </div>
    </div>
@endif
