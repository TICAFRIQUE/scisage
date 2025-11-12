@extends('backend.layouts.master')

@section('content')
    @component('backend.components.breadcrumb')
        @slot('li_1')
            Apropos
        @endslot
        @slot('title')
            Créer une nouveau apropos
        @endslot
    @endcomponent

    <div class="row">
        <div class="col-lg-9 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Nouvel apropos</h4>
                </div>
                <div class="card-body">
                    <form id="formSend" action="{{ route('apropos.store') }}" method="POST" class="needs-validation"
                        novalidate enctype="multipart/form-data">
                        @csrf

                        <!-- Image de l'apropos -->
                        <div class="mb-4">
                            <label for="image" class="form-label">Image <span class="text-danger">*</span></label>
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

                        <!-- Description -->
                        <div class="mb-4">
                            <label for="description" class="form-label">Description <span
                                    class="text-danger">*</span></label>
                            <textarea class="form-control" id="ckeditor-classic" name="description" rows="5" required></textarea>


                            
                            @error('description')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
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
                            <a href="{{ route('apropos.index') }}" class="btn btn-light w-lg me-2">
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
    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script> --}}
    <!-- CKEditor -->
    <script src="{{ URL::asset('build/libs/@ckeditor/ckeditor5-build-classic/build/ckeditor.js') }}"></script>
    <script src="{{ URL::asset('build/js/pages/ecommerce-product-create.init.js') }}"></script>
    <!-- App js -->


    <script>
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
    </script>
@endsection
@endsection
