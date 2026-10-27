{{--
    En-tête des pages internes.
    Paramètres : $title (requis), $eyebrow, $lead, $image, $crumbs (['Libellé' => url|null])
--}}
@php
    $heroImage = $image ?? null;
@endphp
<section class="page-hero">
    @if ($heroImage)
        <div class="page-hero__bg" aria-hidden="true">
            <img src="{{ $heroImage }}" alt="" fetchpriority="high" decoding="async">
        </div>
    @endif

    <div class="container">
        <div class="page-hero__inner" data-aos="fade-up">
            @if (!empty($eyebrow))
                <span class="eyebrow">{{ $eyebrow }}</span>
            @endif

            <h1>{{ $title }}</h1>

            @if (!empty($lead))
                <p class="page-hero__lead">{{ $lead }}</p>
            @endif

            <nav aria-label="Fil d'Ariane">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('page.accueil') }}">Accueil</a></li>
                    @foreach ($crumbs ?? [] as $label => $url)
                        @if ($loop->last || !$url)
                            <li class="breadcrumb-item active" aria-current="page">{{ $label }}</li>
                        @else
                            <li class="breadcrumb-item"><a href="{{ $url }}">{{ $label }}</a></li>
                        @endif
                    @endforeach
                </ol>
            </nav>
        </div>
    </div>
</section>
