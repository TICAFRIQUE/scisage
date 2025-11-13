@extends('backend.layouts.master')

@section('content')
    @component('backend.components.breadcrumb')
        @slot('li_1')
            Portfolios
        @endslot
        @slot('title')
            Créer un nouveau portfolio
        @endslot
    @endcomponent

    <div class="row">
        <div class="col-lg-10 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">
                        <i class="ri-folder-image-line me-2"></i>Nouveau portfolio
                    </h4>
                </div>
                <div class="card-body">
                    <form id="formSend" action="{{ route('portfolios.store') }}" method="POST" class="needs-validation"
                        novalidate enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-md-8">
                                <!-- Libellé -->
                                <div class="mb-3">
                                    <label for="libelle" class="form-label">Libellé/Titre <span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="libelle" class="form-control" id="libelle"
                                        placeholder="Ex: Villa moderne de 250m²" value="{{ old('libelle') }}" required>
                                    @error('libelle')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                    <div id="libelle-error" class="text-danger" style="display: none;"></div>
                                </div>

                                <div class="row">
                                    <!-- Catégorie -->
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="categorie" class="form-label">Catégorie <span
                                                    class="text-danger">*</span></label>
                                            <select name="categorie" id="categorie" class="form-select" required>
                                                <option value="" disabled selected>Choisir une catégorie</option>
                                                @php
                                                    $categories = ['realisations', 'projets', 'conceptions'];
                                                @endphp
                                                @foreach ($categories as $categorie)
                                                    <option value="{{ $categorie }}"
                                                        {{ old('categorie') == $categorie ? 'selected' : '' }}>
                                                        {{ ucfirst($categorie) }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('categorie')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                            <div id="categorie-error" class="text-danger" style="display: none;"></div>
                                        </div>
                                    </div>

                                    <!-- Type -->
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="type" class="form-label">Type</label>
                                            <input type="text" name="type" class="form-control" id="type"
                                                placeholder="Ex: Villa, Appartement, Bureau" value="{{ old('type') }}">
                                            @error('type')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Prix -->
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="prix" class="form-label">Prix (FCFA)</label>
                                            <input type="number" name="prix" class="form-control" id="prix"
                                                placeholder="Ex: 75000000" value="{{ old('prix') }}" min="0">
                                            @error('prix')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <!-- Localisation -->
                                <div class="mb-3">
                                    <label for="localisation" class="form-label">Localisation</label>
                                    <input type="text" name="localisation" class="form-control" id="localisation"
                                        placeholder="Ex: Cocody, Abidjan" value="{{ old('localisation') }}">
                                    @error('localisation')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Caractéristiques -->
                                <div class="mb-3">
                                    <label for="caracteristique" class="form-label">Caractéristiques</label>
                                    <textarea name="caracteristique" class="form-control" id="caracteristique" rows="3"
                                        placeholder="Ex: 4 chambres, 3 salles de bain, garage 2 places, piscine...">{{ old('caracteristique') }}</textarea>
                                    @error('caracteristique')
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
                                            <option value="1" {{ old('is_active', 1) ? 'selected' : '' }}>Actif
                                            </option>
                                            <option value="0" {{ !old('is_active', 1) ? 'selected' : '' }}>Inactif
                                            </option>
                                        </select>
                                    </div>
                                </div>

                                <!-- Image principale -->
                                <div class="card border mb-3">
                                    <div class="card-header">
                                        <h6 class="card-title mb-0">
                                            <i class="ri-image-line me-2"></i>Image principale <span
                                                class="text-danger">*</span>
                                        </h6>
                                    </div>
                                    <div class="card-body">
                                        <input class="form-control mb-3" type="file" id="image_principale"
                                            name="image_principale" accept="image/*" required>
                                        <div class="form-text">Image de couverture du portfolio - Max 1MB (JPG, PNG, WebP)
                                        </div>

                                        <div class="mt-3 position-relative" style="display: inline-block;">
                                            <img id="previewImagePrincipale" src="#" alt="Aperçu image principale"
                                                style="max-width: 100%; max-height: 200px; display: none; border-radius: 8px; border: 2px solid #ddd;" />
                                            <button type="button" id="removeImagePrincipaleBtn"
                                                class="btn btn-danger btn-sm"
                                                style="position: absolute; top: 10px; right: 10px; display: none;">
                                                <i class="ri-delete-bin-line"></i>
                                            </button>
                                        </div>
                                        @error('image_principale')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                        <div id="image_principale-error" class="text-danger" style="display: none;">
                                        </div>
                                    </div>
                                </div>

                                <!-- Galerie d'images -->
                                <div class="card border">
                                    <div class="card-header">
                                        <h6 class="card-title mb-0">
                                            <i class="ri-gallery-line me-2"></i>Galerie d'images
                                            <span class="badge bg-info ms-2" id="imageCount">0</span>
                                        </h6>
                                    </div>
                                    <div class="card-body">
                                        <input class="form-control mb-3" type="file" id="galerie" name="galerie[]"
                                            accept="image/*" multiple>
                                        <div class="form-text">Ajoutez des images supplémentaires - Max 1MB par image (Max
                                            10 images)</div>

                                        <!-- Aperçu de la galerie -->
                                        <div id="galeriePreview" class="mt-3 row g-2"></div>

                                        @error('galerie')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                        @error('galerie.*')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                        <div id="galerie-error" class="text-danger" style="display: none;"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Boutons -->
                        <div class="text-end mt-4">
                            <a href="{{ route('portfolios.index') }}" class="btn btn-light w-lg me-2">
                                <i class="ri-arrow-left-line"></i> Retour
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

    <script>
        // Variables globales pour la galerie
        let galerieFiles = [];
        let nextImageId = 0;

        $(document).ready(function() {
            // Animation d'entrée
            $('.card').hide().fadeIn(500);
        });

        // Fonction pour afficher une erreur sous un champ
        function showError(fieldId, message) {
            const errorDiv = $(`#${fieldId}-error`);
            const field = $(`#${fieldId}`);
            
            errorDiv.text(message).show();
            field.addClass('is-invalid');
            
            // Masquer l'erreur après 5 secondes
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

        // NOUVELLE FONCTION : Vérifier si une image existe déjà
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
            hideError('image_principale'); // Masquer les erreurs précédentes
            
            if (file) {
                // Vérification de la taille du fichier (max 1MB)
                if (file.size > 1 * 1024 * 1024) {
                    showError('image_principale', 'L\'image principale est trop volumineuse. Taille maximale: 1MB');
                    this.value = '';
                    return;
                }

                // Vérification du type de fichier
                if (!file.type.startsWith('image/')) {
                    showError('image_principale', 'Veuillez sélectionner un fichier image valide.');
                    this.value = '';
                    return;
                }

                const reader = new FileReader();
                reader.onload = function(e) {
                    $('#previewImagePrincipale').attr('src', e.target.result).show();
                    $('#removeImagePrincipaleBtn').show();
                }
                reader.readAsDataURL(file);
            } else {
                resetImagePrincipale();
            }
        });

        // Suppression de l'image principale
        $('#removeImagePrincipaleBtn').on('click', function() {
            $('#image_principale').val('');
            resetImagePrincipale();
            hideError('image_principale');
        });

        function resetImagePrincipale() {
            $('#previewImagePrincipale').attr('src', '#').hide();
            $('#removeImagePrincipaleBtn').hide();
        }

        // Aperçu de la galerie - AJOUT au lieu de remplacement + ANTI-DOUBLONS
        $('#galerie').on('change', function(e) {
            const newFiles = Array.from(this.files);
            hideError('galerie'); // Masquer les erreurs précédentes
            
            if (newFiles.length > 0) {
                // Vérification du nombre total d'images (existantes + nouvelles sans doublons)
                const uniqueNewFiles = newFiles.filter(file => !imageAlreadyExists(file));
                
                if (uniqueNewFiles.length === 0) {
                    showError('galerie', 'Toutes ces images ont déjà été ajoutées à la galerie.');
                    this.value = '';
                    return;
                }
                
                if (galerieFiles.length + uniqueNewFiles.length > 10) {
                    showError('galerie', `Vous ne pouvez avoir que 10 images maximum. Vous avez déjà ${galerieFiles.length} images. ${uniqueNewFiles.length} nouvelles images uniques détectées.`);
                    this.value = '';
                    return;
                }

                // Traitement de chaque nouvelle image unique
                let hasError = false;
                let duplicateCount = 0;
                
                newFiles.forEach((file) => {
                    // Vérifier d'abord si l'image existe déjà
                    if (imageAlreadyExists(file)) {
                        duplicateCount++;
                        return;
                    }
                    
                    // Vérification de la taille (max 1MB par image)
                    if (file.size > 1 * 1024 * 1024) {
                        showError('galerie', `L'image ${file.name} est trop volumineuse. Taille maximale: 1MB par image.`);
                        hasError = true;
                        return;
                    }

                    if (!file.type.startsWith('image/')) {
                        showError('galerie', `${file.name} n'est pas un fichier image valide.`);
                        hasError = true;
                        return;
                    }

                    // Ajouter le fichier à notre tableau avec un ID unique
                    const imageId = nextImageId++;
                    galerieFiles.push({
                        id: imageId,
                        file: file,
                        name: file.name
                    });

                    // Créer l'aperçu
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        addImageToGallery(imageId, e.target.result, file.name);
                    };
                    reader.readAsDataURL(file);
                });

                // Afficher message informatif sur les doublons
                if (duplicateCount > 0 && !hasError) {
                    const message = duplicateCount === 1 ? 
                        '1 image en doublon ignorée.' : 
                        `${duplicateCount} images en doublon ignorées.`;
                    
                    // Afficher temporairement le message (pas une erreur)
                    const infoDiv = $('#galerie-error');
                    infoDiv.removeClass('text-danger').addClass('text-info').text(message).show();
                    setTimeout(() => {
                        infoDiv.hide().removeClass('text-info').addClass('text-danger');
                    }, 3000);
                }

                if (!hasError) {
                    // Mettre à jour le compteur et l'input
                    updateImageCount();
                    updateGalerieInput();
                }
            }
            
            // Réinitialiser l'input pour permettre de sélectionner les mêmes fichiers
            this.value = '';
        });

        // Fonction pour ajouter une image à la galerie
        function addImageToGallery(imageId, imageSrc, imageName) {
            const imageHtml = `
                <div class="col-6 col-md-4 mb-2 position-relative" data-image-id="${imageId}">
                    <img src="${imageSrc}" class="img-thumbnail w-100" style="height: 100px; object-fit: cover;">
                    <button type="button" class="btn btn-danger btn-sm position-absolute top-0 end-0 remove-galerie-image" 
                            data-image-id="${imageId}" title="Supprimer ${imageName}">
                        <i class="ri-close-line"></i>
                    </button>
                    <div class="position-absolute bottom-0 start-0 w-100 bg-dark bg-opacity-75 text-white text-center py-1">
                        <small>${imageName.substring(0, 15)}${imageName.length > 15 ? '...' : ''}</small>
                    </div>
                </div>
            `;
            $('#galeriePreview').append(imageHtml);
        }

        // Suppression d'une image de la galerie
        $(document).on('click', '.remove-galerie-image', function() {
            const imageId = parseInt($(this).data('image-id'));
            
            // Supprimer de notre tableau
            galerieFiles = galerieFiles.filter(item => item.id !== imageId);
            
            // Supprimer de l'affichage
            $(this).closest('.col-6').remove();
            
            // Mettre à jour le compteur et l'input principal de galerie
            updateImageCount();
            updateGalerieInput();
            
            // Masquer les erreurs de galerie si il n'y a plus d'erreur
            hideError('galerie');
        });

        // Mettre à jour le compteur d'images
        function updateImageCount() {
            $('#imageCount').text(galerieFiles.length);
        }

        // Mettre à jour l'input galerie principal
        function updateGalerieInput() {
            const dt = new DataTransfer();
            
            // Ajouter tous les fichiers actuels au DataTransfer
            galerieFiles.forEach(item => {
                dt.items.add(item.file);
            });
            
            // Mettre à jour l'input principal de galerie
            const galerieInput = document.getElementById('galerie');
            galerieInput.files = dt.files;
            
            console.log('Input galerie mis à jour:', galerieInput.files.length, 'fichiers');
        }

        // Validation du formulaire
        $('#formSend').on('submit', function(e) {
            let hasErrors = false;
            
            // Masquer toutes les erreurs précédentes
            $('.text-danger[id$="-error"]').hide();
            $('.form-control, .form-select').removeClass('is-invalid');
            
            const libelle = $('#libelle').val().trim();
            const categorie = $('#categorie').val();
            const imagePrincipale = $('#image_principale')[0].files.length;

            if (!libelle) {
                showError('libelle', 'Veuillez saisir un libellé.');
                hasErrors = true;
            }

            if (!categorie) {
                showError('categorie', 'Veuillez sélectionner une catégorie.');
                hasErrors = true;
            }

            if (imagePrincipale === 0) {
                showError('image_principale', 'Veuillez sélectionner une image principale.');
                hasErrors = true;
            }

            if (hasErrors) {
                e.preventDefault();
                // Scroller vers la première erreur
                const firstError = $('.is-invalid').first();
                if (firstError.length) {
                    $('html, body').animate({
                        scrollTop: firstError.offset().top - 100
                    }, 500);
                }
                return false;
            }

            // S'assurer que l'input galerie est à jour avant soumission
            updateGalerieInput();
            
            console.log('Soumission du formulaire:');
            console.log('- Image principale:', $('#image_principale')[0].files.length);
            console.log('- Galerie:', $('#galerie')[0].files.length);
            console.log('- Images uniques:', galerieFiles.length);
        });

        // Masquer les erreurs quand l'utilisateur corrige
        $('#libelle').on('input', function() {
            if ($(this).val().trim()) {
                hideError('libelle');
            }
        });

        $('#categorie').on('change', function() {
            if ($(this).val()) {
                hideError('categorie');
            }
        });

        // Formatage automatique du prix
        $('#prix').on('input', function() {
            let value = this.value.replace(/\D/g, '');
            if (value) {
                this.value = parseInt(value).toLocaleString('fr-FR');
            }
        });

        // Nettoyage du prix avant soumission
        $('#formSend').on('submit', function() {
            const prixInput = $('#prix');
            const cleanPrice = prixInput.val().replace(/\s/g, '');
            prixInput.val(cleanPrice);
        });

        // Bouton pour vider toute la galerie
        $(document).on('dblclick', '#imageCount', function() {
            if (galerieFiles.length > 0 && confirm('Voulez-vous supprimer toutes les images de la galerie ?')) {
                galerieFiles = [];
                $('#galeriePreview').empty();
                updateImageCount();
                updateGalerieInput();
                hideError('galerie');
            }
        });
    </script>
@endsection
@endsection
