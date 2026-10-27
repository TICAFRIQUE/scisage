{{-- Messages de session (succès / erreur) --}}
@if ($msg = Session::get('error'))
    <div class="col-12">
        <div class="alert alert-danger alert-dismissible alert-label-icon label-arrow fade show js-flash" role="alert">
            <i class="ri-error-warning-line label-icon"></i><strong>{{ $msg }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Fermer"></button>
        </div>
    </div>
@endif

@if ($msg = Session::get('success'))
    <div class="col-12">
        <div class="alert alert-success alert-dismissible alert-label-icon label-arrow fade show js-flash" role="alert">
            <i class="ri-checkbox-circle-line label-icon"></i><strong>{{ $msg }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Fermer"></button>
        </div>
    </div>
@endif

@if ($errors->any())
    <div class="col-12">
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong><i class="ri-alert-line me-1"></i> Merci de corriger les champs signalés :</strong>
            <ul class="mb-0 mt-1 ps-3">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Fermer"></button>
        </div>
    </div>
@endif

@once
    <script>
        // Les messages de succès / erreur se ferment seuls après 8 secondes
        setTimeout(function() {
            document.querySelectorAll('.js-flash').forEach(function(el) {
                if (window.bootstrap) bootstrap.Alert.getOrCreateInstance(el).close();
            });
        }, 8000);
    </script>
@endonce
