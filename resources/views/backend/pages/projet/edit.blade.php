@extends('backend.layouts.master')

@section('content')
    @component('backend.components.breadcrumb')
        @slot('li_1')
            Projets
        @endslot
        @slot('title')
            Modifier le projet #{{ $projet->id }}
        @endslot
    @endcomponent

    <div class="row">
        <div class="col-lg-10 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">
                        <i class="ri-bar-chart-line me-2"></i>Modifier l'étape projet #{{ $projet->id }}
                    </h4>
                </div>
                <div class="card-body">
                    <form id="formSend" action="{{ route('projets.update', $projet->id) }}" method="POST"
                        class="needs-validation" novalidate enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">

                            <div class="col-md-8">
                                <!--liste des activités-->
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="activite_id" class="form-label">Activité <span
                                                class="text-danger">*</span></label>
                                        <select name="activite_id" id="activite_id" class="form-control" required>
                                            <option value="" disabled>Choisir une activité</option>
                                            @foreach ($activites as $activite)
                                                <option value="{{ $activite->id }}" 
                                                    {{ old('activite_id', $projet->activite_id) == $activite->id ? 'selected' : '' }}>
                                                    {{ $activite->libelle }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('activite_id')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">

                                    <!--Etape-->
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="etape" class="form-label">Etape <span
                                                    class="text-danger">*</span></label>
                                            <select name="etape" id="etape" class="form-control" required>
                                                <option value="" disabled>Choisir une étape</option>
                                                @for ($i = 1; $i < 20; $i++)
                                                    <option value="{{ $i }}" 
                                                        {{ old('etape', $projet->etape) == $i ? 'selected' : '' }}>
                                                        Étape {{ $i }}
                                                    </option>
                                                @endfor
                                            </select>
                                            @error('etape')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                    </div>


                                    <div class="col-md-8">
                                        <div class="mb-3">
                                            <label for="libelle" class="form-label">Libellé <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" name="libelle" id="libelle" class="form-control"
                                                required value="{{ old('libelle', $projet->libelle) }}"
                                                placeholder="Ex: Construction du bâtiment">
                                            @error('libelle')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="description" class="form-label">Description</label>
                                    <textarea name="description" id="description" class="form-control" rows="4"
                                        placeholder="Description détaillée du projet..." required>{{ old('description', $projet->description) }}</textarea>
                                    @error('description')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
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
                                            $imageUrl = $projet->getFirstMediaUrl('image');
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
                                                    {{ old('is_active', $projet->is_active) ? 'selected' : '' }}>Actif
                                                </option>
                                                <option value="0"
                                                    {{ !old('is_active', $projet->is_active) ? 'selected' : '' }}>Inactif
                                                </option>
                                            </select>
                                        </div>

                                        <!-- Informations -->
                                        <div class="bg-light rounded p-3">
                                            <h6 class="mb-2">
                                                <i class="ri-information-line me-2"></i>Informations
                                            </h6>
                                            <small class="text-muted d-block">ID: #{{ $projet->id }}</small>
                                            <small class="text-muted d-block">Créé:
                                                {{ $projet->created_at->format('d/m/Y à H:i') }}</small>
                                            <small class="text-muted d-block">Modifié:
                                                {{ $projet->updated_at->format('d/m/Y à H:i') }}</small>
                                            <small class="text-muted d-block">Activité: 
                                                {{ $projet->activite->libelle ?? 'Non définie' }}</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Boutons d'action -->
                        <div class="text-end mt-4">
                            <a href="{{ route('projets.index') }}" class="btn btn-light w-lg me-2">
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

        // Gestion de l'aperçu de la nouvelle image
        $('#image').on('change', function(e) {
            const [file] = this.files;
            if (file) {
                // Vérification de la taille du fichier (max 1MB)
                if (file.size > 1 * 1024 * 1024) {
                    alert('Le fichier est trop volumineux. Taille maximale: 1MB');
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
            const activite = $('#activite_id').val();
            const etape = $('#etape').val();
            const libelle = $('#libelle').val().trim();

            if (!activite) {
                e.preventDefault();
                alert('Veuillez sélectionner une activité.');
                $('#activite_id').focus();
                return false;
            }

            if (!etape) {
                e.preventDefault();
                alert('Veuillez sélectionner une étape.');
                $('#etape').focus();
                return false;
            }

            if (!libelle) {
                e.preventDefault();
                alert('Veuillez saisir un libellé.');
                $('#libelle').focus();
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
    </script>
@endsection
@endsection