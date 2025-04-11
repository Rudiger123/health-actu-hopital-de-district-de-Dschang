<?php

namespace App\Livewire\Back\Admin;

use App\Models\Category as CategorysModel;
use App\Models\ParentCategory;
use Livewire\Component;
use Livewire\Attributes\On;

class Category extends Component
{
    
    public function mount() {}

    public $isUpdateParentCategoryMode = false;
    public $pcategory_name, $pcategory_id;

    public function addParentCategory()
    {
        // dd('create modal');
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

    public function render()
    {
        return view('livewire.back.admin.category', [
            "parentCategories" => ParentCategory::all(),
            "childCategories" => CategorysModel::all()
        ]);
    }
}
