@extends('backend.layouts.master')

@section('content')
    @component('backend.components.breadcrumb')
        @slot('li_1')
            FAQS
        @endslot
        @slot('title')
            Créer une FAQ
        @endslot
    @endcomponent

    <div class="row">
        <div class="col-lg-10 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">
                        <i class="ri-bar-chart-line me-2"></i>Nouvelle FAQ
                    </h4>
                </div>
                <div class="card-body">
                    <form id="formSend" action="{{ route('faqs.store') }}" method="POST" class="needs-validation" novalidate
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row">

                            <div class="col-md-8">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="question" class="form-label">Question <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" name="question" id="question" class="form-control"
                                                required value="{{ old('question') }}"
                                                placeholder="Ex: Quelle est la politique de retour ?">
                                            @error('question')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="reponse" class="form-label">Réponse</label>
                                    <textarea name="reponse" id="reponse" class="form-control" rows="4"
                                        placeholder="Réponse détaillée à la question..." required>{{ old('reponse') }}</textarea>
                                    @error('reponse')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>


                            </div>

                            <div class="col-md-4 m-auto">

                                <div class="card border mt-3">
                                    <div class="mb-3 mx-3">
                                        <label for="position" class="form-label">Position d'affichage</label>
                                        <input type="number" name="position" id="position" class="form-control"
                                            value="{{ old('position', 1) }}" min="1" max="100">
                                        <div class="form-text">Ordre d'affichage (1 = premier)</div>
                                        @error('position')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3 mx-3">
                                        <label for="statut" class="form-label">Statut</label>
                                        <select name="is_active" id="statut" class="form-select">
                                            <option value="1">Actif</option>
                                            <option value="0">Inactif</option>
                                        </select>
                                    </div>
                                </div>

                               
                            </div>
                        </div>

                        <!-- Boutons d'action -->
                        <div class="text-end mt-4">
                            <a href="{{ route('faqs.index') }}" class="btn btn-light w-lg me-2">
                                <i class="ri-arrow-left-line"></i> Annuler
                            </a>
                            <button type="submit" class="btn btn-success w-lg">
                                <i class="ri-save-line"></i> Enregistrer
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@section('script')
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
@endsection
