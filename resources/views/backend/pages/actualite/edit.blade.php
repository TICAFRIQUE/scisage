@extends('backend.layouts.master')

@section('content')
    @component('backend.components.breadcrumb')
        @slot('li_1')
            Actualites
        @endslot
        @slot('title')
            Modifier l'actualité #{{ $actualite->id }}
        @endslot
    @endcomponent

    <div class="row">
        <div class="col-lg-10 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">
                        <i class="ri-folder-image-line me-2"></i>Modifier l'actualité #{{ $actualite->id }}
                    </h4>
                </div>
                <div class="card-body">
                    <form id="formSend" action="{{ route('actualites.update', $actualite->id) }}" method="POST"
                        class="needs-validation" novalidate enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-md-8">
                                <!-- Libellé -->
                                <div class="mb-3">
                                    <label for="libelle" class="form-label">Libellé/Titre <span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="libelle" class="form-control" id="libelle"
                                        placeholder="Ex: Villa moderne de 250m²"
                                        value="{{ old('libelle', $actualite->libelle) }}" required>
                                    @error('libelle')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                    <div id="libelle-error" class="text-danger" style="display: none;"></div>
                                </div>





                                <!-- Description -->
                                <div class="mb-4">
                                    <label for="description" class="form-label">Description <span
                                            class="text-danger">*</span></label>
                                    <textarea class="form-control" id="ckeditor-classic" name="description" rows="5" required>{{ old('description', $actualite->description) }}</textarea>
                                    @error('description')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <!-- Statut -->
                                <div class="card border mb-3">
                                    <div class="card-body">
                                        <label for="statut" class="form-label">Statut</label>
                                        <select name="is_active" id="statut" class="form-select">
                                            <option value="1"
                                                {{ old('is_active', $actualite->is_active) ? 'selected' : '' }}>Actif
                                            </option>
                                            <option value="0"
                                                {{ !old('is_active', $actualite->is_active) ? 'selected' : '' }}>Inactif
                                            </option>
                                        </select>
                                    </div>
                                </div>

                                <!-- Image principale actuelle -->
                                <div class="card border mb-3">
                                    <div class="card-header">
                                        <h6 class="card-title mb-0">
                                            <i class="ri-image-line me-2"></i>Image principale
                                        </h6>
                                    </div>
                                    <div class="card-body">
                                        @php
                                            $imagePrincipaleUrl = $actualite->getFirstMediaUrl('image_principale');
                                        @endphp

                                        @if ($imagePrincipaleUrl)
                                            <div class="mb-3">
                                                <label class="form-label">Image actuelle</label>
                                                <div class="position-relative d-inline-block">
                                                    <img src="{{ $imagePrincipaleUrl }}" alt="Image principale actuelle"
                                                        class="img-thumbnail" style="max-width: 100%; max-height: 150px;">
                                                    <div class="position-absolute top-0 end-0 p-1">
                                                        <span class="badge bg-success">Actuelle</span>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif

                                        <input class="form-control mb-3" type="file" id="image_principale"
                                            name="image_principale" accept="image/*">
                                        <div class="form-text">
                                            {{ $imagePrincipaleUrl ? 'Changer l\'image principale' : 'Ajouter une image principale' }}
                                            - Max 1MB (JPG, PNG, WebP)</div>

                                        <div class="mt-3 position-relative" style="display: inline-block;">
                                            <img id="previewImagePrincipale" src="#"
                                                alt="Aperçu nouvelle image principale"
                                                style="max-width: 100%; max-height: 200px; display: none; border-radius: 8px; border: 2px solid #ddd;" />
                                            <button type="button" id="removeImagePrincipaleBtn"
                                                class="btn btn-danger btn-sm"
                                                style="position: absolute; top: 10px; right: 10px; display: none;">
                                                <i class="ri-delete-bin-line"></i>
                                            </button>
                                            <div id="newImagePrincipaleLabel" class="position-absolute top-0 start-0 p-1"
                                                style="display: none;">
                                                <span class="badge bg-primary">Nouvelle</span>
                                            </div>
                                        </div>
                                        @error('image_principale')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                        <div id="image_principale-error" class="text-danger" style="display: none;"></div>
                                    </div>
                                </div>

                                <!-- Galerie actuelle et nouvelle -->
                                <div class="card border">
                                    <div class="card-header">
                                        <h6 class="card-title mb-0">
                                            <i class="ri-gallery-line me-2"></i>Galerie d'images
                                            <span class="badge bg-info ms-2"
                                                id="imageCount">{{ $actualite->getMedia('galerie')->count() }}</span>
                                        </h6>
                                    </div>
                                    <div class="card-body">
                                        <!-- Galerie actuelle -->
                                        @if ($actualite->getMedia('galerie')->count() > 0)
                                            <div class="mb-3">
                                                <label class="form-label">Images actuelles</label>
                                                <div class="row g-2" id="currentGallery">
                                                    @foreach ($actualite->getMedia('galerie') as $media)
                                                        <div class="col-6 col-md-4 mb-2 position-relative"
                                                            data-media-id="{{ $media->id }}">
                                                            <img src="{{ $media->getUrl() }}" alt="Image galerie"
                                                                class="img-thumbnail w-100"
                                                                style="height: 100px; object-fit: cover;">
                                                            <button type="button"
                                                                class="btn btn-danger btn-sm position-absolute top-0 end-0 delete-existing-image"
                                                                data-media-id="{{ $media->id }}"
                                                                title="Supprimer cette image">
                                                                <i class="ri-close-line"></i>
                                                            </button>
                                                            <div
                                                                class="position-absolute bottom-0 start-0 w-100 bg-dark bg-opacity-75 text-white text-center py-1">
                                                                <small>Existante</small>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        @endif

                                        <!-- Ajout de nouvelles images -->
                                        <input class="form-control mb-3" type="file" id="galerie" name="galerie[]"
                                            accept="image/*" multiple>
                                        <div class="form-text">Ajouter de nouvelles images - Max 1MB par image</div>

                                        <!-- Aperçu nouvelles images -->
                                        <div id="galeriePreview" class="mt-3 row g-2"></div>

                                        @error('galerie')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                        @error('galerie.*')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                        <div id="galerie-error" class="text-danger" style="display: none;"></div>

                                        <!-- Input caché pour les suppressions -->
                                        <input type="hidden" name="deleted_images" id="deleted_images" value="">
                                    </div>
                                </div>

                                <!-- Informations -->
                                <div class="card border mt-3">
                                    <div class="card-body">
                                        <div class="bg-light rounded p-3">
                                            <h6 class="mb-2">
                                                <i class="ri-information-line me-2"></i>Informations
                                            </h6>
                                            <small class="text-muted d-block">ID: #{{ $actualite->id }}</small>
                                            <small class="text-muted d-block">Créé:
                                                {{ $actualite->created_at->format('d/m/Y à H:i') }}</small>
                                            <small class="text-muted d-block">Modifié:
                                                {{ $actualite->updated_at->format('d/m/Y à H:i') }}</small>
                                            <small class="text-muted d-block">Images galerie:
                                                {{ $actualite->getMedia('galerie')->count() }}</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Boutons -->
                        <div class="text-end mt-4">
                            <a href="{{ route('actualites.index') }}" class="btn btn-light w-lg me-2">
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
    <script src="{{ URL::asset('build/libs/@ckeditor/ckeditor5-build-classic/build/ckeditor.js') }}"></script>
    <script src="{{ URL::asset('build/js/pages/ecommerce-product-create.init.js') }}"></script>
    <script src="{{ URL::asset('build/js/app.js') }}"></script>

    <script>
        // Variables globales pour la galerie
        let galerieFiles = [];
        let nextImageId = 0;
        let deletedImages = [];

        $(document).ready(function() {
            // Animation d'entrée
            $('.card').hide().fadeIn(500);

            // Initialiser le compteur avec les images existantes + nouvelles
            updateImageCount();
        });

        // Fonction pour afficher une erreur sous un champ
        function showError(fieldId, message) {
            const errorDiv = $(`#${fieldId}-error`);
            const field = $(`#${fieldId}`);

            errorDiv.text(message).show();
            field.addClass('is-invalid');

            setTimeout(() => {
                errorDiv.hide();
                field.removeClass('is-invalid');
            }, 5000);
        }

        // Fonction pour masquer les erreurs d'un champ
        function hideError(fieldId) {
            const errorDiv = $(`#${fieldId}-error`);
            const field = $(`#${fieldId}`);

            errorDiv.hide();
            field.removeClass('is-invalid');
        }

        // Vérifier si une image existe déjà
        function imageAlreadyExists(file) {
            return galerieFiles.some(existingFile =>
                existingFile.file.name === file.name &&
                existingFile.file.size === file.size &&
                existingFile.file.lastModified === file.lastModified
            );
        }

        // Aperçu de l'image principale
        $('#image_principale').on('change', function(e) {
            const [file] = this.files;
            hideError('image_principale');

            if (file) {
                if (file.size > 1 * 1024 * 1024) {
                    showError('image_principale', 'L\'image principale est trop volumineuse. Taille maximale: 1MB');
                    this.value = '';
                    return;
                }

                if (!file.type.startsWith('image/')) {
                    showError('image_principale', 'Veuillez sélectionner un fichier image valide.');
                    this.value = '';
                    return;
                }

                const reader = new FileReader();
                reader.onload = function(e) {
                    $('#previewImagePrincipale').attr('src', e.target.result).show();
                    $('#removeImagePrincipaleBtn').show();
                    $('#newImagePrincipaleLabel').show();
                }
                reader.readAsDataURL(file);
            } else {
                resetImagePrincipale();
            }
        });

        // Suppression de la nouvelle image principale
        $('#removeImagePrincipaleBtn').on('click', function() {
            $('#image_principale').val('');
            resetImagePrincipale();
            hideError('image_principale');
        });

        function resetImagePrincipale() {
            $('#previewImagePrincipale').attr('src', '#').hide();
            $('#removeImagePrincipaleBtn').hide();
            $('#newImagePrincipaleLabel').hide();
        }

        // Suppression d'une image existante de la galerie
        $(document).on('click', '.delete-existing-image', function() {
            const mediaId = $(this).data('media-id');
            const imageElement = $(this).closest('.col-6');

            if (confirm('Voulez-vous vraiment supprimer cette image ? elle sera definitivement supprimée ?')) {
                // Ajouter à la liste des suppressions
                deletedImages.push(mediaId);
                $('#deleted_images').val(deletedImages.join(','));

                // Supprimer visuellement
                imageElement.remove();

                // Mettre à jour le compteur
                updateImageCount();
            }
        });

        // Aperçu de la galerie - nouvelles images
        $('#galerie').on('change', function(e) {
            const newFiles = Array.from(this.files);
            hideError('galerie');

            if (newFiles.length > 0) {
                const currentExistingCount = $('#currentGallery .col-6').length;
                const totalAfterAdd = currentExistingCount + galerieFiles.length + newFiles.length;

                if (totalAfterAdd > 10) {
                    showError('galerie',
                        `Vous ne pouvez avoir que 10 images maximum. Total actuel: ${currentExistingCount + galerieFiles.length}`
                    );
                    this.value = '';
                    return;
                }

                const uniqueNewFiles = newFiles.filter(file => !imageAlreadyExists(file));

                if (uniqueNewFiles.length === 0) {
                    showError('galerie', 'Toutes ces images ont déjà été ajoutées.');
                    this.value = '';
                    return;
                }

                let hasError = false;
                let duplicateCount = 0;

                newFiles.forEach((file) => {
                    if (imageAlreadyExists(file)) {
                        duplicateCount++;
                        return;
                    }

                    if (file.size > 1 * 1024 * 1024) {
                        showError('galerie',
                            `L'image ${file.name} est trop volumineuse. Taille maximale: 1MB`);
                        hasError = true;
                        return;
                    }

                    if (!file.type.startsWith('image/')) {
                        showError('galerie', `${file.name} n'est pas un fichier image valide.`);
                        hasError = true;
                        return;
                    }

                    const imageId = nextImageId++;
                    galerieFiles.push({
                        id: imageId,
                        file: file,
                        name: file.name
                    });

                    const reader = new FileReader();
                    reader.onload = function(e) {
                        addImageToGallery(imageId, e.target.result, file.name);
                    };
                    reader.readAsDataURL(file);
                });

                if (duplicateCount > 0 && !hasError) {
                    const message = duplicateCount === 1 ? '1 image en doublon ignorée.' :
                        `${duplicateCount} images en doublon ignorées.`;
                    const infoDiv = $('#galerie-error');
                    infoDiv.removeClass('text-danger').addClass('text-info').text(message).show();
                    setTimeout(() => {
                        infoDiv.hide().removeClass('text-info').addClass('text-danger');
                    }, 3000);
                }

                if (!hasError) {
                    updateImageCount();
                    updateGalerieInput();
                }
            }

            this.value = '';
        });

        // Ajouter une nouvelle image à la galerie
        function addImageToGallery(imageId, imageSrc, imageName) {
            const imageHtml = `
                <div class="col-6 col-md-4 mb-2 position-relative" data-image-id="${imageId}">
                    <img src="${imageSrc}" class="img-thumbnail w-100" style="height: 100px; object-fit: cover;">
                    <button type="button" class="btn btn-danger btn-sm position-absolute top-0 end-0 remove-galerie-image" 
                            data-image-id="${imageId}" title="Supprimer ${imageName}">
                        <i class="ri-close-line"></i>
                    </button>
                    <div class="position-absolute bottom-0 start-0 w-100 bg-dark bg-opacity-75 text-white text-center py-1">
                        <small>Nouvelle</small>
                    </div>
                </div>
            `;
            $('#galeriePreview').append(imageHtml);
        }

        // Suppression d'une nouvelle image
        $(document).on('click', '.remove-galerie-image', function() {
            const imageId = parseInt($(this).data('image-id'));

            galerieFiles = galerieFiles.filter(item => item.id !== imageId);
            $(this).closest('.col-6').remove();

            updateImageCount();
            updateGalerieInput();
            hideError('galerie');
        });

        // Mettre à jour le compteur d'images
        function updateImageCount() {
            const existingCount = $('#currentGallery .col-6').length;
            const newCount = galerieFiles.length;
            const totalCount = existingCount + newCount;

            $('#imageCount').text(totalCount);
        }

        // Mettre à jour l'input galerie
        function updateGalerieInput() {
            const dt = new DataTransfer();
            galerieFiles.forEach(item => {
                dt.items.add(item.file);
            });

            const galerieInput = document.getElementById('galerie');
            galerieInput.files = dt.files;
        }

        // Validation du formulaire
        $('#formSend').on('submit', function(e) {


            updateGalerieInput();

            // Confirmation si changement d'image principale
            const hasNewImagePrincipale = $('#image_principale')[0].files.length > 0;
            if (hasNewImagePrincipale) {
                if (!confirm('Vous allez remplacer l\'image principale actuelle. Continuer ?')) {
                    e.preventDefault();
                    return false;
                }
            }
        });
    </script>
@endsection
@endsection
