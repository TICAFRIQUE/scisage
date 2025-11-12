@extends('backend.layouts.master')

@section('content')
    @component('backend.components.breadcrumb')
        @slot('li_1')
            Apropos
        @endslot
        @slot('title')
            Modifier l'apropos
        @endslot
    @endcomponent

    <div class="row">
        <div class="col-lg-9 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Modifier l'apropos #{{ $apropos->id }}</h4>
                </div>
                <div class="card-body">
                    <form id="formSend" action="{{ route('apropos.update', $apropos->id) }}" method="POST"
                        class="needs-validation" novalidate enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <!-- Image actuelle -->
                        <div class="mb-4">
                            <label class="form-label">Image actuelle</label>
                            <div class="current-image-container">
                                @if ($apropos->hasMedia('image'))
                                    <div class="position-relative d-inline-block">
                                        <img src="{{ $apropos->getFirstMediaUrl('image') }}" alt="Image actuelle"
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

                        <!-- Description -->
                        <div class="mb-4">
                            <label for="description" class="form-label">Description <span
                                    class="text-danger">*</span></label>
                            <textarea class="form-control" id="ckeditor-classic" name="description" rows="5" required>{{ old('description', $apropos->description) }}</textarea>
                            @error('description')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Statut en select-->
                        <div class="mb-3">
                            <label for="statut" class="form-label">Statut</label>
                            <select name="is_active" id="statut" class="form-select">
                                <option value="1" {{ old('is_active', $apropos->is_active) ? 'selected' : '' }}>Actif
                                </option>
                                <option value="0" {{ !old('is_active', $apropos->is_active) ? 'selected' : '' }}>
                                    Inactif
                                </option>
                            </select>
                        </div>

                        <!-- Informations de l'apropos -->
                        <div class="mb-4">
                            <div class="bg-light rounded p-3">
                                <h6 class="mb-3">
                                    <i class="ri-information-line me-2"></i>Informations
                                </h6>
                                <div class="row">
                                    <div class="col-md-6">
                                        <p class="mb-2">
                                            <strong>ID:</strong> #{{ $apropos->id }}
                                        </p>
                                        <p class="mb-2">
                                            <strong>Créé le:</strong> {{ $apropos->created_at->format('d/m/Y à H:i') }}
                                        </p>
                                    </div>
                                    <div class="col-md-6">
                                        <p class="mb-2">
                                            <strong>Statut actuel:</strong>
                                            <span class="badge bg-{{ $apropos->is_active ? 'success' : 'secondary' }}">
                                                {{ $apropos->is_active ? 'Actif' : 'Inactif' }}
                                            </span>
                                        </p>
                                        <p class="mb-2">
                                            <strong>Dernière modification:</strong>
                                            {{ $apropos->updated_at->format('d/m/Y à H:i') }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Boutons -->
                        <div class="text-end">
                            <a href="{{ route('apropos.index') }}" class="btn btn-light w-lg me-2">
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
    <!-- CKEditor -->
    <script src="{{ URL::asset('build/libs/@ckeditor/ckeditor5-build-classic/build/ckeditor.js') }}"></script>
    <script src="{{ URL::asset('build/js/pages/ecommerce-product-create.init.js') }}"></script>
    <!-- App js -->
    <script src="{{ URL::asset('build/js/app.js') }}"></script>

    <script>
        $(document).ready(function() {
            // Animation d'entrée
            $('.card').hide().fadeIn(500);
        });

        // Aperçu de la nouvelle image
        $('#image').on('change', function(e) {
            const [file] = this.files;
            if (file) {
                // Vérification de la taille du fichier (max 1MB)
                if (file.size > 1 * 1024 * 1024) {
                    alert('Le fichier est trop volumineux. Taille maximale: 1MB');
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
    </script>
@endsection
@endsection
