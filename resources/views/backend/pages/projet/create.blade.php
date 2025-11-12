@extends('backend.layouts.master')

@section('content')
    @component('backend.components.breadcrumb')
        @slot('li_1')
            Projets
        @endslot
        @slot('title')
            Créer un projet
        @endslot
    @endcomponent

    <div class="row">
        <div class="col-lg-10 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">
                        <i class="ri-bar-chart-line me-2"></i>Nouvelle Etape projet
                    </h4>
                </div>
                <div class="card-body">
                    <form id="formSend" action="{{ route('projets.store') }}" method="POST" class="needs-validation"
                        novalidate enctype="multipart/form-data">
                        @csrf
                        <div class="row">

                            <div class="col-md-8">
                                <!--liste des activités-->
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="activite_id" class="form-label">Activité <span
                                                class="text-danger">*</span></label>
                                        <select name="activite_id" id="activite_id" class="form-control" required>
                                            <option value="" selected disabled>Choisir une activité</option>
                                            @foreach ($activites as $activite)
                                                <option value="{{ $activite->id }}">{{ $activite->libelle }}
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
                                                <option value="" selected disabled>Choisir une étape</option>
                                                @for ($i = 1; $i < 20; $i++)
                                                    <option value="{{ $i }}">Étape {{ $i }}</option>
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
                                                required value="{{ old('libelle') }}"
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
                                        placeholder="Description détaillée du projet..." required>{{ old('description') }}</textarea>
                                    @error('description')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>


                            </div>

                            <div class="col-md-4">
                                <!-- Image optionnelle -->
                                <div class="card border mt-3">
                                    <div class="card-header">
                                        <h6 class="card-title mb-0">
                                            <i class="ri-image-line me-2"></i>Image <small
                                                class="text-muted">(optionnelle)</small>
                                        </h6>
                                    </div>
                                    <div class="card-body">
                                        <input class="form-control" type="file" id="image" name="image"
                                            accept="image/*">
                                        <div class="form-text">Formats : JPG, PNG, WebP</div>

                                        <div class="mt-3 position-relative" style="display: inline-block;">
                                            <img id="previewImage" src="#" alt="Aperçu"
                                                style="max-width: 100%; max-height: 150px; display: none; border-radius: 8px;" />
                                            <button type="button" id="removeImageBtn" class="btn btn-danger btn-sm"
                                                style="position: absolute; top: 5px; right: 5px; display: none;">
                                                <i class="ri-delete-bin-line"></i>
                                            </button>
                                        </div>
                                        @error('image')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Statut -->
                                <div class="card border mt-3">
                                    <div class="mb-3">
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
                            <a href="{{ route('projets.index') }}" class="btn btn-light w-lg me-2">
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

    <script>
        // Gestion de l'aperçu et suppression de l'image
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
                }
                reader.readAsDataURL(file);
            } else {
                resetImage();
            }
        });

        $('#removeImageBtn').on('click', function() {
            $('#image').val('');
            resetImage();
        });

        function resetImage() {
            $('#previewImage').attr('src', '#').hide();
            $('#removeImageBtn').hide();
        }
    </script>
@endsection
@endsection
