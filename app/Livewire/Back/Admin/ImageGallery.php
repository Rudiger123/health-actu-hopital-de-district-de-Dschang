<?php
namespace App\Livewire\Back\Admin;

use Livewire\Component;
use Livewire\WithFileUploads; // Trait pour la gestion des téléchargements de fichiers
use App\Models\Image; // Notre modèle Image
use Illuminate\Support\Facades\Storage; // Pour la suppression des fichiers du stockage
use Livewire\Attributes\Validate; // Pour la validation Livewire 3+

class ImageGallery extends Component
{
    use WithFileUploads;

    // Propriété pour le téléchargement d'une seule image
    #[Validate('image|max:1024')] // Règle de validation: doit être une image, taille max 1MB [2]
    public $singleImage;

    // Propriété pour le téléchargement de plusieurs images
    // 'multipleImages.*' applique la validation à chaque fichier dans le tableau [2]
    #[Validate(['multipleImages.*' => 'image|max:1024'])] // Chaque image 1MB Max [2]
    public $multipleImages=[];

    // Propriété pour stocker les images déjà présentes dans la base de données
    public $storedImages = [];

    /**
     * Méthode de montage du composant, appelée lors de l'initialisation.
     * Charge les images existantes depuis la base de données.
     */
    public function mount()
    {
        $this->loadStoredImages();
    }

    /**
     * Charge toutes les images depuis la base de données.
     */
    public function loadStoredImages()
    {
        $this->storedImages = Image::all();
    }

    /**
     * Gère le téléchargement et l'enregistrement d'une seule image.
     */
    public function saveSingleImage()
    {
        // Valide uniquement le champ 'singleImage' [2]
        $this->validateOnly('singleImage');

        try {
            // Récupère le nom original du fichier [2]
            $filename = $this->singleImage->getClientOriginalName();
            // Stocke le fichier dans le dossier 'gallery' du disque 'public' [2]
            $path = $this->singleImage->store('gallery', 'public');

            // Enregistre les informations de l'image dans la base de données
            Image::create([
                'filename' => $filename,
                'path' => $path,
            ]);

            session()->flash('message', 'Image téléchargée avec succès!');
            $this->reset('singleImage'); // Réinitialise le champ de fichier temporaire [3]
            $this->loadStoredImages(); // Rafraîchit la liste des images affichées
        } catch (\Exception $e) {
            session()->flash('error', 'Erreur lors du téléchargement de l\'image: '. $e->getMessage());
        }
    }

    /**
     * Gère le téléchargement et l'enregistrement de plusieurs images.
     */
    public function saveMultipleImages()
    {
        // Valide uniquement le champ 'multipleImages' [2]
        $this->validateOnly('multipleImages');

        try {
            foreach ($this->multipleImages as $image) {
                $filename = $image->getClientOriginalName();
                $path = $image->store('gallery', 'public'); // [2]

                Image::create([
                    'filename' => $filename,
                    'path' => $path,
                ]);
            }

            session()->flash('message', 'Images téléchargées avec succès!');
            $this->reset('multipleImages'); // Réinitialise le champ de fichiers temporaires
            $this->loadStoredImages(); // Rafraîchit la liste des images affichées
        } catch (\Exception $e) {
            session()->flash('error', 'Erreur lors du téléchargement des images: '. $e->getMessage());
        }
    }

    /**
     * Supprime une image du stockage et de la base de données.
     * @param int $id L'ID de l'image à supprimer.
     */
    public function deleteImage($id)
    {
        try {
            $image = Image::findOrFail($id);

            // Supprime le fichier du stockage public [4]
            if (Storage::disk('public')->exists($image->path)) {
                Storage::disk('public')->delete($image->path);
            }

            // Supprime l'entrée de la base de données
            $image->delete();

            session()->flash('message', 'Image supprimée avec succès!');
            $this->loadStoredImages(); // Rafraîchit la liste des images affichées
        } catch (\Exception $e) {
            session()->flash('error', 'Erreur lors de la suppression de l\'image: '. $e->getMessage());
        }
    }

    /**
     * Supprime une image temporaire de la prévisualisation (avant l'enregistrement final).
     * Utile pour les téléchargements multiples.
     * @param int $index L'index de l'image dans le tableau $multipleImages.
     */
    public function removeTemporaryImage($index)
    {
        // Supprime l'élément du tableau $multipleImages à l'index donné [5]
        array_splice($this->multipleImages, $index, 1);
    }

    public function render()
    {
        return view('livewire.back.admin.image-gallery');
    }
}
