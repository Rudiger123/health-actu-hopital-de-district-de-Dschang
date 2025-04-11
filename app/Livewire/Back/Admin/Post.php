<?php

namespace App\Livewire\Back\Admin;

use Livewire\Component;
use App\Models\Category;

class Post extends Component
{
    
    public function render()
    {
        return view('livewire.back.admin.post', [
            'parentCategories' => Category::whereNull('parent_id')->get(),
            'childCategories' => Category::whereNotNull('parent_id')->with('parent')->get(),
        ])->layout('back.layouts.app');
    }

    public $isModalOpen = false;
    public $formType = 'create'; // create or edit
    public $categoryType = 'parent'; // parent or child
    public $name, $description, $parent_id, $categoryId;

    public function openModal($formType, $categoryType, $id = null)
    {
        $this->resetForm();
        $this->formType = $formType;
        $this->categoryType = $categoryType;
        $this->isModalOpen = true;

        if ($formType === 'edit') {
            $category = Category::findOrFail($id);
            $this->name = $category->name;
            $this->description = $category->description;
            $this->parent_id = $category->parent_id;
            $this->categoryId = $category->id;
        }
    }

    public function closeModal()
    {
        $this->isModalOpen = false;
        $this->resetForm();
    }

    public function saveCategory()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'parent_id' => $this->categoryType === 'child' ? 'required|exists:categories,id' : 'nullable',
        ]);

        if ($this->formType === 'create') {
            Category::create([
                'name' => $this->name,
                'description' => $this->description,
                'parent_id' => $this->categoryType === 'child' ? $this->parent_id : null,
            ]);

            session()->flash('successMessage', 'Catégorie créée avec succès.');
        } else {
            $category = Category::find($this->categoryId);
            $category->update([
                'name' => $this->name,
                'description' => $this->description,
                'parent_id' => $this->categoryType === 'child' ? $this->parent_id : null,
            ]);

            session()->flash('successMessage', 'Catégorie mise à jour avec succès.');
        }

        $this->closeModal();
    }

    public function confirmDelete($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        session()->flash('successMessage', 'Catégorie supprimée avec succès.');
    }

    private function resetForm()
    {
        $this->name = '';
        $this->description = '';
        $this->parent_id = null;
        $this->categoryId = null;
    }
}
