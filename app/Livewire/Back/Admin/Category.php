<?php

namespace App\Livewire\Back\Admin;

use App\Models\Category as CategoryModel;
use App\Models\ParentCategory;
use Livewire\Component;

class Category extends Component
{
    public $parentCategories;
    public $categories;

    // Propriétés pour les catégories parents
    public $parentName, $parentDescription, $parentId;

    // Propriétés pour les sous-catégories
    public $categoryName, $categoryDescription, $parentCategoryId, $categoryId;

    // Modals
    public $isEditParent = false;
    public $isEditCategory = false;

    protected $rules = [
        'parentName' => 'required|string|max:255|unique:parent_category,name',
        'categoryName' => 'required|string|max:255',
        'categoryDescription' => 'nullable|string|max:500',
        'parentCategoryId' => 'required|exists:categories,id',
    ];

    public function mount()
    {
        $this->loadData();
    }

    public function loadData()
    {
        $this->parentCategories = ParentCategory::all();
        $this->categories = CategoryModel::all();
    }

    // CRUD pour les catégories parents
    public function storeParent()
    {
        $this->validate([
            'parentName' => 'required|string|max:255|unique:parent_categories,name',
        ]);

        $parent = ParentCategory::create([
            'name' => $this->parentName
        ]);

        if ($parent) {
            $this->dispatch('showAlert', [
                'type' => 'success',
                'title' => 'creation succès',
                'text' => "categorie crée avec succès !",
            ]);
        }
        $this->resetParentFields();
        $this->loadData();
    }

    public function editParent($id)
    {
        $parent = CategoryModel::findOrFail($id);
        $this->parentId = $parent->id;
        $this->parentName = $parent->name;
        $this->parentDescription = $parent->description;
        $this->isEditParent = true;
    }

    public function updateParent()
    {
        $this->validate([
            'parentName' => 'required|string|max:255',
            'parentDescription' => 'nullable|string|max:500',
        ]);

        $parent = CategoryModel::findOrFail($this->parentId);
        $parent->update([
            'name' => $this->parentName,
            'description' => $this->parentDescription,
        ]);

        session()->flash('success', 'Catégorie parent mise à jour avec succès.');
        $this->resetParentFields();
        $this->loadData();
    }

    public function confirmDeleteParent($id)
    {
        $this->parentId = $id;
    }

    public function deleteParent()
    {
        $parent = CategoryModel::findOrFail($this->parentId);
        $parent->delete();

        session()->flash('success', 'Catégorie parent supprimée avec succès.');
        $this->resetParentFields();
        $this->loadData();
    }

    public function resetParentFields()
    {
        $this->parentName = '';
        $this->parentDescription = '';
        $this->parentId = null;
        $this->isEditParent = false;
    }

    // CRUD pour les sous-catégories
    public function storeCategory()
    {
        $this->validate([
            'categoryName' => 'required|string|max:255',
            'categoryDescription' => 'nullable|string|max:500',
            'parentCategoryId' => 'required|exists:categories,id',
        ]);

        CategoryModel::create([
            'name' => $this->categoryName,
            'description' => $this->categoryDescription,
            'parent_id' => $this->parentCategoryId,
        ]);

        session()->flash('success', 'Sous-catégorie ajoutée avec succès.');
        $this->resetCategoryFields();
        $this->loadData();
    }

    public function editCategory($id)
    {
        $category = CategoryModel::findOrFail($id);
        $this->categoryId = $category->id;
        $this->categoryName = $category->name;
        $this->categoryDescription = $category->description;
        $this->parentCategoryId = $category->parent_id;
        $this->isEditCategory = true;
    }

    public function updateCategory()
    {
        $this->validate([
            'categoryName' => 'required|string|max:255',
            'categoryDescription' => 'nullable|string|max:500',
            'parentCategoryId' => 'required|exists:categories,id',
        ]);

        $category = CategoryModel::findOrFail($this->categoryId);
        $category->update([
            'name' => $this->categoryName,
            'description' => $this->categoryDescription,
            'parent_id' => $this->parentCategoryId,
        ]);

        session()->flash('success', 'Sous-catégorie mise à jour avec succès.');
        $this->resetCategoryFields();
        $this->loadData();
    }

    public function confirmDeleteCategory($id)
    {
        $this->categoryId = $id;
    }

    public function deleteCategory()
    {
        $category = CategoryModel::findOrFail($this->categoryId);
        $category->delete();

        session()->flash('success', 'Sous-catégorie supprimée avec succès.');
        $this->resetCategoryFields();
        $this->loadData();
    }

    public function resetCategoryFields()
    {
        $this->categoryName = '';
        $this->categoryDescription = '';
        $this->parentCategoryId = null;
        $this->categoryId = null;
        $this->isEditCategory = false;
    }

    public function render()
    {
        return view('livewire.back.admin.category');
    }
}