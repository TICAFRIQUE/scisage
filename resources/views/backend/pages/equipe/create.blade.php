@extends('backend.layouts.master')

@section('content')
    @component('backend.components.breadcrumb')
        @slot('li_1')
            Equipes
        @endslot
        @slot('title')
            Créer une nouvelle équipe
        @endslot
    @endcomponent

    <div class="row">
        <div class="col-lg-10 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Nouvelle équipe</h4>
                </div>
                <div class="card-body">
                    <form id="formSend" action="{{ route('equipes.store') }}" method="POST" class="needs-validation"
                        novalidate enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <!-- Nom de l'equipe -->
                            <div class="col-md-6 mb-3">
                                <label for="nom" class="form-label">Nom de l'equipe <span
                                        class="text-danger">*</span></label>
                                <input type="text" name="nom" class="form-control" id="nom"
                                    placeholder="Entrer le nom de l'equipe" required>
                                @error('nom')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <!--Prenoms-->
                            <div class="col-md-6 mb-3">
                                <label for="prenoms" class="form-label">Prénoms <span class="text-danger">*</span></label>
                                <input type="text" name="prenoms" class="form-control" id="prenoms"
                                    placeholder="Entrer les prénoms" required>
                                @error('prenoms')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>

                        <!-- Fonction -->
                        <div class=" mb-3">
                            <label for="fonction" class="form-label">Fonction <span class="text-danger">*</span></label>
                            <input type="text" name="fonction" class="form-control" id="fonction"
                                placeholder="Entrer la fonction de l'equipe" required>
                            @error('fonction')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Description de l'equipe -->
                        <div class="mb-3">
                            <label for="description" class="form-label">Description de l'equipe <span
                                    class="text-danger">*</span></label>
                            <textarea name="description" class="form-control" id="description" rows="3"
                                placeholder="Entrer la description de l'equipe" required></textarea>
                            @error('description')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Image de la bannière -->
                        <div class="mb-4">
                            <label for="image" class="form-label">Image de la bannière <span
                                    class="text-danger">*</span></label>
                            <input class="form-control" type="file" id="image" name="image" accept="image/*"
                                required>
                            <div class="form-text">Formats acceptés: JPG, PNG, WebP. Taille recommandée: 1920x1080px</div>
                            @error('image')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Aperçu de l'image -->
                        <div class="mb-4">
                            <div class="mt-3 position-relative" style="display: inline-block;">
                                <img id="previewImage" src="#" alt="Aperçu de l'image"
                                    style="max-width: 100%; max-height: 300px; display: none; border-radius: 8px; border: 2px solid #ddd;" />
                                <button type="button" id="removeImageBtn" class="btn btn-danger btn-sm"
                                    style="position: absolute; top: 10px; right: 10px; display: none;">
                                    <i class="ri-delete-bin-line"></i>
                                </button>
                            </div>
                        </div>

                        <!-- Statut -->
                        <div class="mb-3">
                            <label for="statut" class="form-label">Statut</label>
                            <select name="is_active" id="statut" class="form-select">
                                <option value="1">Actif</option>
                                <option value="0">Inactif</option>
                            </select>
                        </div>

                        <!-- Boutons -->
                        <div class="text-end">
                            <a href="{{ route('equipes.index') }}" class="btn btn-light w-lg me-2">
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
        $(document).ready(function() {
            // Gestion du switch de statut
            updateStatusText();

            $('#is_active').on('change', function() {
                updateStatusText();
            });
        });

        // Aperçu de l'image
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
                }
                reader.readAsDataURL(file);
            } else {
                resetImage();
            }
        });

        // Suppression de l'image
        $('#removeImageBtn').on('click', function() {
            $('#image').val('');
            resetImage();
        });

        function resetImage() {
            $('#previewImage').attr('src', '#').hide();
            $('#removeImageBtn').hide();
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
    </script>
@endsection
@endsection
