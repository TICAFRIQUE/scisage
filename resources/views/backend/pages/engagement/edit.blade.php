@extends('backend.layouts.master')

@section('content')
    @component('backend.components.breadcrumb')
        @slot('li_1')
            Engagements
        @endslot
        @slot('title')
            Modifier l'engagement #{{ $engagement->id }}
        @endslot
    @endcomponent

    <div class="row">
        <div class="col-lg-10 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">
                        <i class="ri-bar-chart-line me-2"></i>Modifier l'engagement #{{ $engagement->id }}
                    </h4>
                </div>
                <div class="card-body">
                    <form id="formSend" action="{{ route('engagements.update', $engagement->id) }}" method="POST"
                        class="needs-validation" novalidate enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">

                            <div class="col-md-8">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="libelle" class="form-label">Libellé <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" name="libelle" id="libelle" class="form-control"
                                                required value="{{ old('libelle', $engagement->libelle) }}"
                                                placeholder="Ex: Maisons construites">
                                            @error('libelle')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    
                                </div>

                                <div class="mb-3">
                                    <label for="description" class="form-label">Description</label>
                                    <textarea name="description" id="description" class="form-control" rows="4"
                                        placeholder="Description détaillée de l'engagement...">{{ old('description', $engagement->description) }}</textarea>
                                    @error('description')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="icone" class="form-label">Icône <span
                                                    class="text-danger">*</span></label>
                                            <div class="input-group">
                                                <span class="input-group-text">
                                                    <i id="iconPreview" class="{{ $engagement->icone }}"></i>
                                                </span>
                                                <input type="text" name="icone" id="icone" class="form-control"
                                                    required value="{{ old('icone', $engagement->icone) }}"
                                                    placeholder="ri-home-line">
                                            </div>
                                            <div class="form-text">
                                                Icônes disponibles :
                                                <a href="https://remixicon.com/" target="_blank">Remix Icon</a> ou
                                                <a href="https://fontawesome.com/icons" target="_blank">Font Awesome</a>
                                            </div>
                                            @error('icone')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="position" class="form-label">Position d'affichage</label>
                                            <input type="number" name="position" id="position" class="form-control"
                                                value="{{ old('position', $engagement->position) }}" min="1"
                                                max="100">
                                            <div class="form-text">Ordre d'affichage (1 = premier)</div>
                                            @error('position')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                               

                                <!-- Image -->
                                <div class="card border mt-3">
                                    <div class="card-header">
                                        <h6 class="card-title mb-0">
                                            <i class="ri-image-line me-2"></i>Image <small
                                                class="text-muted">(optionnelle)</small>
                                        </h6>
                                    </div>
                                    <div class="card-body">
                                        @php
                                            $imageUrl = $engagement->getFirstMediaUrl('image');
                                        @endphp

                                        @if ($imageUrl)
                                            <div class="mb-3">
                                                <label class="form-label">Image actuelle</label>
                                                <div class="position-relative d-inline-block">
                                                    <img src="{{ $imageUrl }}" alt="Image actuelle"
                                                        class="img-thumbnail" style="max-width: 100%; max-height: 120px;">
                                                    <div class="position-absolute top-0 end-0 p-1">
                                                        <span class="badge bg-success">Actuelle</span>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif

                                        <input class="form-control" type="file" id="image" name="image"
                                            accept="image/*">
                                        <div class="form-text">{{ $imageUrl ? 'Changer l\'image' : 'Ajouter une image' }}
                                            (JPG, PNG, WebP)</div>

                                        <div class="mt-3 position-relative" style="display: inline-block;">
                                            <img id="previewImage" src="#" alt="Nouvelle image"
                                                style="max-width: 100%; max-height: 150px; display: none; border-radius: 8px;" />
                                            <button type="button" id="removeImageBtn" class="btn btn-danger btn-sm"
                                                style="position: absolute; top: 5px; right: 5px; display: none;">
                                                <i class="ri-delete-bin-line"></i>
                                            </button>
                                            <div id="newImageLabel" class="position-absolute top-0 start-0 p-1"
                                                style="display: none;">
                                                <span class="badge bg-primary">Nouvelle</span>
                                            </div>
                                        </div>
                                        @error('image')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Statut et informations -->
                                <div class="card border mt-3">
                                    <div class="card-body">
                                        <!-- Statut -->
                                        <div class="mb-3">
                                            <label for="statut" class="form-label">Statut</label>
                                            <select name="is_active" id="statut" class="form-select">
                                                <option value="1"
                                                    {{ old('is_active', $engagement->is_active) ? 'selected' : '' }}>Actif
                                                </option>
                                                <option value="0"
                                                    {{ !old('is_active', $engagement->is_active) ? 'selected' : '' }}>Inactif
                                                </option>
                                            </select>
                                        </div>

                                        <!-- Informations -->
                                        <div class="bg-light rounded p-3">
                                            <h6 class="mb-2">
                                                <i class="ri-information-line me-2"></i>Informations
                                            </h6>
                                            <small class="text-muted d-block">ID: #{{ $engagement->id }}</small>
                                            <small class="text-muted d-block">Créée:
                                                {{ $engagement->created_at->format('d/m/Y à H:i') }}</small>
                                            <small class="text-muted d-block">Modifiée:
                                                {{ $engagement->updated_at->format('d/m/Y à H:i') }}</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Boutons d'action -->
                        <div class="text-end mt-4">
                            <a href="{{ route('engagements.index') }}" class="btn btn-light w-lg me-2">
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
            // Mise à jour de l'aperçu en temps réel
            updatePreview();
            updateStatusText();

            // Événements pour la mise à jour de l'aperçu
            $('#libelle, #chiffre, #icone').on('input', updatePreview);
            $('#is_active').on('change', updateStatusText);
        });

        // Fonction de mise à jour de l'aperçu
        function updatePreview() {
            const libelle = $('#libelle').val() || 'Libellé';
            const chiffre = $('#chiffre').val() || '0';
            const icone = $('#icone').val() || 'ri-star-line';

            $('#previewLibelle').text(libelle);
            $('#previewChiffre').text(chiffre);
            $('#previewIcon').attr('class', icone);
            $('#iconPreview').attr('class', icone);
        }

        // Mise à jour du texte du statut
        function updateStatusText() {
            const isActive = $('#is_active').is(':checked');
            const statusText = $('#statusText');

            if (isActive) {
                statusText.text('Statistique active').removeClass('text-muted').addClass('text-success');
            } else {
                statusText.text('Statistique inactive').removeClass('text-success').addClass('text-muted');
            }
        }

        // Gestion de l'aperçu de la nouvelle image
        $('#image').on('change', function(e) {
            const [file] = this.files;
            if (file) {
                // Vérification de la taille du fichier (max 3MB)
                if (file.size > 3 * 1024 * 1024) {
                    alert('Le fichier est trop volumineux. Taille maximale: 3MB');
                    this.value = '';
                    return;
                }

                const reader = new FileReader();
                reader.onload = function(e) {
                    $('#previewImage').attr('src', e.target.result).show();
                    $('#removeImageBtn').show();
                    $('#newImageLabel').show();
                }
                reader.readAsDataURL(file);
            } else {
                resetNewImage();
            }
        });

        // Suppression de la nouvelle image
        $('#removeImageBtn').on('click', function() {
            $('#image').val('');
            resetNewImage();
        });

        function resetNewImage() {
            $('#previewImage').attr('src', '#').hide();
            $('#removeImageBtn').hide();
            $('#newImageLabel').hide();
        }

        // Validation du formulaire
        $('#formSend').on('submit', function(e) {
            const libelle = $('#libelle').val().trim();
            const chiffre = $('#chiffre').val().trim();
            const icone = $('#icone').val().trim();

            if (!libelle) {
                e.preventDefault();
                alert('Veuillez saisir un libellé.');
                $('#libelle').focus();
                return false;
            }

            if (!chiffre) {
                e.preventDefault();
                alert('Veuillez saisir un chiffre.');
                $('#chiffre').focus();
                return false;
            }

            if (!icone) {
                e.preventDefault();
                alert('Veuillez saisir une icône.');
                $('#icone').focus();
                return false;
            }

            // Confirmation si nouvelle image
            const hasNewImage = $('#image')[0].files.length > 0;
            if (hasNewImage) {
                if (!confirm('Vous allez remplacer l\'image actuelle. Continuer ?')) {
                    e.preventDefault();
                    return false;
                }
            }
        });

        // Animation d'entrée
        $('.card').hide().fadeIn(500);
    </script>
@endsection
@endsection
