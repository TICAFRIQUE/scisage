@extends('backend.layouts.master')

@section('content')
    @component('backend.components.breadcrumb')
        @slot('li_1')
            FAQS
        @endslot
        @slot('title')
            Modifier la FAQ #{{ $faq->id }}
        @endslot
    @endcomponent

    <div class="row">
        <div class="col-lg-10 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">
                        <i class="ri-question-line me-2"></i>Modifier la FAQ #{{ $faq->id }}
                    </h4>
                </div>
                <div class="card-body">
                    <form id="formSend" action="{{ route('faqs.update', $faq->id) }}" method="POST" 
                        class="needs-validation" novalidate enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">

                            <div class="col-md-8">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="question" class="form-label">Question <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" name="question" id="question" class="form-control"
                                                required value="{{ old('question', $faq->question) }}"
                                                placeholder="Ex: Quelle est la politique de retour ?">
                                            @error('question')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="reponse" class="form-label">Réponse <span class="text-danger">*</span></label>
                                    <textarea name="reponse" id="reponse" class="form-control" rows="4"
                                        placeholder="Réponse détaillée à la question..." required>{{ old('reponse', $faq->reponse) }}</textarea>
                                    @error('reponse')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4 m-auto">
                                <div class="card border mt-3">
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <label for="position" class="form-label">Position d'affichage</label>
                                            <input type="number" name="position" id="position" class="form-control"
                                                value="{{ old('position', $faq->position) }}" min="1" max="100">
                                            <div class="form-text">Ordre d'affichage (1 = premier)</div>
                                            @error('position')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label for="statut" class="form-label">Statut</label>
                                            <select name="is_active" id="statut" class="form-select">
                                                <option value="1" {{ old('is_active', $faq->is_active) ? 'selected' : '' }}>Actif</option>
                                                <option value="0" {{ !old('is_active', $faq->is_active) ? 'selected' : '' }}>Inactif</option>
                                            </select>
                                        </div>

                                        <!-- Informations -->
                                        <div class="bg-light rounded p-3 mt-3">
                                            <h6 class="mb-2">
                                                <i class="ri-information-line me-2"></i>Informations
                                            </h6>
                                            <small class="text-muted d-block">ID: #{{ $faq->id }}</small>
                                            <small class="text-muted d-block">Créée: {{ $faq->created_at->format('d/m/Y à H:i') }}</small>
                                            <small class="text-muted d-block">Modifiée: {{ $faq->updated_at->format('d/m/Y à H:i') }}</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Boutons d'action -->
                        <div class="text-end mt-4">
                            <a href="{{ route('faqs.index') }}" class="btn btn-light w-lg me-2">
                                <i class="ri-arrow-left-line"></i> Retour à la liste
                            </a>
                            <button type="submit" class="btn btn-success w-lg">
                                <i class="ri-save-line"></i> Mettre à jour
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@section('script')
    <script src="{{ URL::asset('build/js/app.js') }}"></script>

    <script>
        $(document).ready(function() {
            // Animation d'entrée
            $('.card').hide().fadeIn(500);
        });

        // Validation du formulaire
        $('#formSend').on('submit', function(e) {
            const question = $('#question').val().trim();
            const reponse = $('#reponse').val().trim();

            if (!question) {
                e.preventDefault();
                alert('Veuillez saisir une question.');
                $('#question').focus();
                return false;
            }

            if (!reponse) {
                e.preventDefault();
                alert('Veuillez saisir une réponse.');
                $('#reponse').focus();
                return false;
            }
        });
    </script>
@endsection
@endsection