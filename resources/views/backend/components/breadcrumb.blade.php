<!-- En-tête de page -->
@section('title')
    {{ trim($title ?? $li_1) }}
@endsection
@php
    $onDashboard = Route::is('dashboard.*');
    $previous = url()->previous();
    $backUrl = $previous && $previous !== url()->current() ? $previous : route('dashboard.index');
@endphp
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">
                @unless ($onDashboard)
                    <a href="{{ $backUrl }}" class="btn btn-light btn-sm" title="Revenir à la page précédente">
                        <i class="ri-arrow-left-line"></i> Retour
                    </a>
                @endunless
                {{ $title }}
            </h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}"><i class="ri-home-4-line"></i></a></li>
                    <li class="breadcrumb-item">{{ $li_1 }}</li>
                    @if (isset($title))
                        <li class="breadcrumb-item active">{{ $title }}</li>
                    @endif
                </ol>
            </div>
        </div>
    </div>

    @include('backend.components.alertMessage')
</div>
