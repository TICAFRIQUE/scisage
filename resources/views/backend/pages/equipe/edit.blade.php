@extends('backend.layouts.master')

@section('content')
    @component('backend.components.breadcrumb')
        @slot('li_1')
            Equipes
        @endslot
        @slot('title')
            Modifier l'équipe
        @endslot
    @endcomponent

    <div class="row">
        <div class="col-lg-10 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Modifier l'équipe #{{ $equipe->id }}</h4>
                </div>
                <div class="card-body">
                    <form id="formSend" action="{{ route('equipes.update', $equipe->id) }}" method="POST"
                        class="needs-validation" novalidate enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <!-- Nom de l'equipe -->
                            <div class="col-md-6 mb-3">
                                <label for="nom" class="form-label">Nom de l'équipe <span
                                        class="text-danger">*</span></label>
                                <input type="text" name="nom" class="form-control" id="nom"
                                    placeholder="Entrer le nom de l'équipe" value="{{ old('nom', $equipe->nom) }}" required>
                                @error('nom')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <!--Prenoms-->
                            <div class="col-md-6 mb-3">
                                <label for="prenoms" class="form-label">Prénoms <span class="text-danger">*</span></label>
                                <input type="text" name="prenoms" class="form-control" id="prenoms"
                                    placeholder="Entrer les prénoms" value="{{ old('prenoms', $equipe->prenoms) }}"
                                    required>
                                @error('prenoms')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Fonction -->
                        <div class="mb-3">
                            <label for="fonction" class="form-label">Fonction <span class="text-danger">*</span></label>
                            <input type="text" name="fonction" class="form-control" id="fonction"
                                placeholder="Entrer la fonction de l'équipe"
                                value="{{ old('fonction', $equipe->fonction) }}" required>
                            @error('fonction')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Description de l'equipe -->
                        <div class="mb-3">
                            <label for="description" class="form-label">Description de l'équipe <span
                                    class="text-danger">*</span></label>
                            <textarea name="description" class="form-control" id="description" rows="3"
                                placeholder="Entrer la description de l'équipe" required>{{ old('description', $equipe->description) }}</textarea>
                            @error('description')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Image actuelle -->
                        <div class="mb-4">
                            <label class="form-label">Image actuelle</label>
                            <div class="current-image-container">
                                @if ($equipe->hasMedia('image'))
                                    <div class="position-relative d-inline-block">
                                        <img src="{{ $equipe->getFirstMediaUrl('image') }}" alt="Image actuelle"
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

                        <!-- Statut -->
                        <div class="mb-3">
                            <label for="statut" class="form-label">Statut</label>
                            <select name="is_active" id="statut" class="form-select">
                                <option value="1" {{ old('is_active', $equipe->is_active) ? 'selected' : '' }}>Actif
                                </option>
                                <option value="0" {{ !old('is_active', $equipe->is_active) ? 'selected' : '' }}>
                                    Inactif</option>
                            </select>
                        </div>

                        <!-- Informations de l'équipe -->
                        <div class="mb-4">
                            <div class="bg-light rounded p-3">
                                <h6 class="mb-3">
                                    <i class="ri-information-line me-2"></i>Informations
                                </h6>
                                <div class="row">
                                    <div class="col-md-6">
                                        <p class="mb-2">
                                            <strong>ID:</strong> #{{ $equipe->id }}
                                        </p>
                                        <p class="mb-2">
                                            <strong>Créé le:</strong> {{ $equipe->created_at->format('d/m/Y à H:i') }}
                                        </p>
                                    </div>
                                    <div class="col-md-6">
                                        <p class="mb-2">
                                            <strong>Statut actuel:</strong>
                                            <span class="badge bg-{{ $equipe->is_active ? 'success' : 'secondary' }}">
                                                {{ $equipe->is_active ? 'Actif' : 'Inactif' }}
                                            </span>
                                        </p>
                                        <p class="mb-2">
                                            <strong>Dernière modification:</strong>
                                            {{ $equipe->updated_at->format('d/m/Y à H:i') }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Boutons -->
                        <div class="text-end">
                            <a href="{{ route('equipes.index') }}" class="btn btn-light w-lg me-2">
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
