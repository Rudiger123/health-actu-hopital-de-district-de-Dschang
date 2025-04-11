<?php

namespace App\Livewire\Back\Admin;

use App\Models\Category as CategorysModel;
use App\Models\ParentCategory;
use Livewire\Component;
use Livewire\Attributes\On;

class Category extends Component
{

    protected $listeners = [
        'deleteParentCategory' => 'deleteParentCategory'
    ];

    public function mount() {}

    public $isUpdateParentCategoryMode = false;
    public $pcategory_name, $pcategory_id;

    public function addParentCategory()
    {
        $this->pcategory_name = '';
        $this->pcategory_id = '';
        $this->isUpdateParentCategoryMode = false;
        $this->showParentCategoryModalForm();
    }

    public function showParentCategoryModalForm()
    {
        // dd('show modal');
        $this->resetErrorBag();
        $this->dispatch('showParentCategoryModalForm');
    }

    public function hideParentCategoryModalForm()
    {
        $this->dispatch('hideParentCategoryModalForm');
        $this->isUpdateParentCategoryMode = false;
        $this->pcategory_name = $this->pcategory_id = null;
    }


    public function createParentCategory()
    {
        $this->validate([
            'pcategory_name' => 'required|unique:parent_categories,name',
        ], [
            'pcategory_name.required' => 'Le nom de la catégorie est obligatoire',
            'pcategory_name.unique' => 'Le nom de la catégorie existe déjà',
        ]);

        // store new parent category
        $category = ParentCategory::create([
            'name' => $this->pcategory_name,
        ]);

        if ($category) {
            $this->hideParentCategoryModalForm();
            $this->dispatch('showAlert', [
                'type' => 'success',
                'title' => 'categorie parente',
                'text' => "la nouvelle categorie parente a été créée avec succès !",
            ]);
        } else {
            $this->dispatch('showAlert', [
                'type' => 'success',
                'title' => 'Error',
                'text' => "Une erreur est survenue!",
            ]);
        }
        $this->isUpdateParentCategoryMode = false;
        $this->reset();
    }

    public function editParentCategory($id)
    {
        $category = ParentCategory::findOrFail($id);
        $this->pcategory_name = $category->name;
        $this->pcategory_id = $id;
        $this->isUpdateParentCategoryMode = true;
        $this->showParentCategoryModalForm();
    }

    public function updateParentCategory($id) {
        dd($id);
        $category = ParentCategory::findOrFail($this->pcategory_id);
        $this->validate([
            'pcategory_name' => 'required|unique:parent_categories,name,'.$this->pcategory_id,
        ], [
            'pcategory_name.required' => 'Le nom de la catégorie est obligatoire',
            'pcategory_name.unique' => 'Le nom de la catégorie existe déjà',
        ]);
        $category->name = $this->pcategory_name;
        $update = $category->save();

        if ($update) {
            $this->hideParentCategoryModalForm();
            $this->dispatch('showAlert', [
                'type' => 'success',
                'title' => 'categorie parente',
                'text' => "la catégorie parente a été mise à jour avec succès !",
            ]);
            $this->isUpdateParentCategoryMode = false;
            $this->reset();
        } else {
            $this->dispatch('showAlert', [
                'type' => 'error',
                'title' => 'Erreur',
                'text' => "Une erreur est survenue lors de la mise à jour de la catégorie parente",
            ]);
        }

    }

    // Confirmation de suppression
    public function confirmDelete($id)
    {
        $this->dispatch(
            'confirm-delete',
            title: 'Confirmer la suppression',
            text: 'Voulez-vous vraiment supprimer cette catégorie ?',
            id: $id
        );
    }

    // Action de suppression
    public function deleteParentCategory($id)
    {
        try {
            $category = ParentCategory::findOrFail($id);

            // verifier que la categorie n'a pas de sous-catégories  

            $category->delete();

            $this->dispatch(
                'show-toast',
                type: 'success',
                message: 'Catégorie supprimée avec succès'
            );
        } catch (\Exception $e) {
            $this->dispatch(
                'show-toast',
                type: 'error',
                message: $e->getMessage()
            );
        }
    }

    public function render()
    {
        return view('livewire.back.admin.category', [
            "parentCategories" => ParentCategory::all(),
            "childCategories" => CategorysModel::all()
        ]);
    }
}
