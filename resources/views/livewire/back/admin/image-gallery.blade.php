{{-- resources/views/livewire/image-gallery.blade.php --}}
<div class="container mt-5">
    <h2 class="mb-4 text-center">Galerie d'Images</h2>

    {{-- Messages de session (succès/erreur) --}}
    @if (session()->has('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if (session()->has('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="row mb-5">
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h5>Télécharger une seule image</h5>
                </div>
                <div class="card-body pt-4">
                    <form wire:submit.prevent="saveSingleImage">
                        <div class="mb-3">
                            <label for="singleImage" class="form-label">Sélectionner une image</label>
                            <input type="file" class="form-control" id="singleImage" wire:model="singleImage">
                            {{-- Affichage des erreurs de validation pour singleImage --}}
                            @error('singleImage') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        {{-- Aperçu de l'image temporaire (avant l'upload final) [2] --}}
                        @if ($singleImage)
                            <div class="mb-3">
                                <p>Aperçu de l'image :</p>
                                <img src="{{ $singleImage->temporaryUrl() }}" class="img-thumbnail" style="max-width: 200px;">
                            </div>
                        @endif

                        <button type="submit" class="btn btn-success">Télécharger l'image</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-header bg-info text-white">
                    <h5>Télécharger plusieurs images</h5>
                </div>
                <div class="card-body pt-4">
                    <form wire:submit.prevent="saveMultipleImages">
                        <div class="mb-3">
                            <label for="multipleImages" class="form-label">Sélectionner des images</label>
                            <input type="file" class="form-control" id="multipleImages" wire:model="multipleImages" multiple>
                            {{-- Affichage des erreurs de validation pour multipleImages --}}
                            @error('multipleImages.*') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        {{-- Aperçu des images temporaires (avant l'upload final) [2] --}}
                        @if (count($multipleImages) > 0)
                            <div class="mb-3">
                                <p>Aperçu des images :</p>
                                <div class="d-flex flex-wrap">
                                    @foreach ($multipleImages as $index => $image)
                                        <div class="position-relative me-2 mb-2">
                                            <img src="{{ $image->temporaryUrl() }}" class="img-thumbnail" style="max-width: 100px; height: 100px; object-fit: cover;">
                                            {{-- Bouton pour supprimer une image de la prévisualisation [5] --}}
                                            <button type="button" class="btn btn-danger btn-sm position-absolute top-0 end-0" wire:click="removeTemporaryImage({{ $index }})" style="font-size: 0.7em; padding: 0.1em 0.4em;">X</button>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif

                        <button type="submit" class="btn btn-success">Télécharger les images</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="card shadow-sm">
        <div class="card-header bg-secondary text-white">
            <h5>Images de la Galerie</h5>
        </div>
        <div class="card-body pt-4">
            @if (count($storedImages) > 0)
                <div class="row">
                    @foreach ($storedImages as $image)
                        <div class="col-6 col-md-4 col-lg-3 mb-4">
                            <div class="card h-100">
                                {{-- Affichage de l'image stockée. L'accesseur `url` du modèle est utilisé. --}}
                                <img src="{{ $image->url }}" class="card-img-top" alt="{{ $image->filename }}" style="height: 200px; object-fit: cover;">
                                <div class="card-body d-flex flex-column">
                                    <h6 class="card-title text-truncate">{{ $image->filename }}</h6>
                                    <p class="card-text text-muted" style="font-size: 0.8em;">Ajouté le: {{ $image->created_at->format('d/m/Y H:i') }}</p>
                                    {{-- Bouton de suppression avec confirmation Livewire [6] --}}
                                    <button type="button" class="btn btn-danger btn-sm mt-auto" wire:click="deleteImage({{ $image->id }})" wire:confirm="Êtes-vous sûr de vouloir supprimer cette image?">Supprimer</button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <p class="text-center">Aucune image dans la galerie pour le moment.</p>
            @endif
        </div>
    </div>
</div>