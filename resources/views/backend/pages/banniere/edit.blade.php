@extends('backend.layouts.master')

@section('content')
    @component('backend.components.breadcrumb')
        @slot('li_1')
            Bannières
        @endslot
        @slot('title')
            Modifier la bannière
        @endslot
    @endcomponent

    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Modifier la bannière #{{ $banniere->id }}</h4>
                </div>
                <div class="card-body">
                    <form id="formSend" action="{{ route('bannieres.update', $banniere->id) }}" method="POST"
                        class="needs-validation" novalidate enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <!-- Image actuelle -->
                        <div class="mb-4">
                            <label class="form-label">Image actuelle</label>
                            <div class="current-image-container">
                                @if ($banniere->hasMedia('banniere'))
                                    <div class="position-relative d-inline-block">
                                        <img src="{{ $banniere->getFirstMediaUrl('banniere') }}" alt="Image actuelle"
                                            class="img-thumbnail"
                                            style="max-width: 300px; max-height: 200px; object-fit: cover;">
                                        <div class="position-absolute top-0 end-0 p-2">
                                            <span class="badge bg-success">Image actuelle</span>
                                        </div>
                                    </div>
                                @else
                                    <div class="bg-light d-flex align-items-center justify-content-center rounded"
                                        style="width: 300px; height: 200px;">
                                        <div class="text-center text-muted">
                                            <i class="ri-image-line fs-1 mb-2"></i>
                                            <p>Aucune image</p>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <!-- Nouvelle image -->
                        <div class="mb-4">
                            <label for="image" class="form-label">
                                Nouvelle image <small class="text-muted">(optionnelle - laissez vide pour conserver l'image
                                    actuelle)</small>
                            </label>
                            <input class="form-control" type="file" id="image" name="image" accept="image/*">
                            <div class="form-text">Formats acceptés: JPG, PNG, WebP. Taille recommandée: 1920x1080px</div>
                            @error('image')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Aperçu de la nouvelle image -->
                        <div class="mb-4">
                            <div class="mt-3 position-relative" style="display: inline-block;">
                                <img id="previewImage" src="#" alt="Aperçu de la nouvelle image"
                                    style="max-width: 100%; max-height: 300px; display: none; border-radius: 8px; border: 2px solid #ddd;" />
                                <button type="button" id="removeImageBtn" class="btn btn-danger btn-sm"
                                    style="position: absolute; top: 10px; right: 10px; display: none;">
                                    <i class="ri-delete-bin-line"></i>
                                </button>
                                <div id="newImageLabel" class="position-absolute top-0 start-0 p-2" style="display: none;">
                                    <span class="badge bg-primary">Nouvelle image</span>
                                </div>
                            </div>
                        </div>

                        <!-- Statut en select-->
                        <div class="mb-3">
                            <label for="statut" class="form-label">Statut</label>
                            <select name="is_active" id="statut" class="form-select">
                                <option value="1" {{ old('is_active', $banniere->is_active) ? 'selected' : '' }}>Actif
                                </option>
                                <option value="0" {{ !old('is_active', $banniere->is_active) ? 'selected' : '' }}>Inactif
                                </option>
                            </select>
                        </div>


                        <!-- Informations de la bannière -->
                        <div class="mb-4">
                            <div class="bg-light rounded p-3">
                                <h6 class="mb-3">
                                    <i class="ri-information-line me-2"></i>Informations
                                </h6>
                                <div class="row">
                                    <div class="col-md-6">
                                        <p class="mb-2">
                                            <strong>ID:</strong> #{{ $banniere->id }}
                                        </p>
                                        <p class="mb-2">
                                            <strong>Créée le:</strong> {{ $banniere->created_at->format('d/m/Y à H:i') }}
                                        </p>
                                    </div>
                                    <div class="col-md-6">
                                        <p class="mb-2">
                                            <strong>Statut actuel:</strong>
                                            <span class="badge bg-{{ $banniere->is_active ? 'success' : 'secondary' }}">
                                                {{ $banniere->is_active ? 'Active' : 'Inactive' }}
                                            </span>
                                        </p>
                                        <p class="mb-2">
                                            <strong>Dernière modification:</strong>
                                            {{ $banniere->updated_at->format('d/m/Y à H:i') }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Boutons -->
                        <div class="text-end">
                            <a href="{{ route('bannieres.index') }}" class="btn btn-light w-lg me-2">
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
            // Gestion du switch de statut
            updateStatusText();

            $('#is_active').on('change', function() {
                updateStatusText();
            });
        });

        // Aperçu de la nouvelle image
        $('#image').on('change', function(e) {
            const [file] = this.files;
            if (file) {
                // Vérification de la taille du fichier (max 5MB)
                if (file.size > 5 * 1024 * 1024) {
                    alert('Le fichier est trop volumineux. Taille maximale: 5MB');
                    this.value = '';
                    return;
                }

                // Vérification du type de fichier
                if (!file.type.startsWith('image/')) {
                    alert('Veuillez sélectionner un fichier image valide.');
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

        // Mise à jour du texte du statut
        function updateStatusText() {
            const isActive = $('#is_active').is(':checked');
            const statusText = $('#statusText');
            const statusDescription = $('#statusDescription');

            if (isActive) {
                statusText.text('Bannière active').removeClass('text-muted').addClass('text-success');
                statusDescription.text('La bannière sera visible sur le site web').removeClass('text-muted').addClass(
                    'text-success');
            } else {
                statusText.text('Bannière inactive').removeClass('text-success').addClass('text-muted');
                statusDescription.text('La bannière ne sera pas visible sur le site web').removeClass('text-success')
                    .addClass('text-muted');
            }
        }

        // Drag & Drop pour la nouvelle image
        const imageInput = document.getElementById('image');
        const dropZone = imageInput.closest('.mb-4');

        ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
            dropZone.addEventListener(eventName, preventDefaults, false);
        });

        function preventDefaults(e) {
            e.preventDefault();
            e.stopPropagation();
        }

        ['dragenter', 'dragover'].forEach(eventName => {
            dropZone.addEventListener(eventName, highlight, false);
        });

        ['dragleave', 'drop'].forEach(eventName => {
            dropZone.addEventListener(eventName, unhighlight, false);
        });

        function highlight(e) {
            dropZone.style.backgroundColor = '#f8f9fa';
            dropZone.style.border = '2px dashed #007bff';
        }

        function unhighlight(e) {
            dropZone.style.backgroundColor = '';
            dropZone.style.border = '';
        }

        dropZone.addEventListener('drop', handleDrop, false);

        function handleDrop(e) {
            const dt = e.dataTransfer;
            const files = dt.files;

            if (files.length > 0) {
                imageInput.files = files;
                $(imageInput).trigger('change');
            }
        }

        // Confirmation avant soumission si changement d'image
        $('#formSend').on('submit', function(e) {
            const hasNewImage = $('#image')[0].files.length > 0;

            if (hasNewImage) {
                const confirmMessage = 'Vous allez remplacer l\'image actuelle par une nouvelle image. Continuer ?';
                if (!confirm(confirmMessage)) {
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
