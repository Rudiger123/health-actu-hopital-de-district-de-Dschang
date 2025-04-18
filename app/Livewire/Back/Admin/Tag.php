<?php

namespace App\Livewire\Back\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Tag as TagModel;

class Tag extends Component
{
    use WithPagination;

    public $name;
    public $color = '#3b82f6';
    public $tagId;
    public $isEditing = false;
    public $search = '';
    public $perPage = 5;

    protected $rules = [
        'name' => 'required|min:2|max:50|unique:tags,name',
        'color' => 'required|string',
    ];

    protected $listeners = [
        'deleteConfirmed' => 'delete',
        'showToast' => 'showToast'
    ];

    public function mount()
    {
        $this->resetForm();
    }

    public function resetForm()
    {
        $this->reset(['name', 'color', 'tagId', 'isEditing']);
        $this->resetErrorBag();
    }

    public function create()
    {
        $this->validate();

        TagModel::create([
            'name' => $this->name,
            'color' => $this->color,
        ]);

        $this->showToast('success', 'Tag créé avec succès');
        $this->resetForm();
    }

    public function edit($id)
    {
        $tag = TagModel::findOrFail($id);
        $this->tagId = $id;
        $this->name = $tag->name;
        $this->color = $tag->color;
        $this->isEditing = true;
    }

    public function update()
    {
        $this->validate([
            'name' => 'required|min:2|max:50|unique:tags,name,' . $this->tagId,
            'color' => 'required|string',
        ]);

        $tag = TagModel::findOrFail($this->tagId);
        $tag->update([
            'name' => $this->name,
            'color' => $this->color,
        ]);

        $this->showToast('success', 'Tag mis à jour avec succès');
        $this->resetForm();
    }

    public function confirmDelete($id)
    {
        $this->dispatch('confirm-delete', 
            title :'Supprimer le tag',
            text :'Êtes-vous sûr de vouloir supprimer ce tag?',
            id : $id
        );  
    }

    public function delete($id)
    {
        $tag = TagModel::findOrFail($id);
        $tag->delete();

        $this->showToast('success', 'Tag supprimé avec succès');
    }

    public function showToast($type, $message)
    {
        $this->dispatch(
            'show-toast',
            type: $type,
            message: $message
        );
    }

    public function render()
    {
        $tags = TagModel::query()
            ->when($this->search, function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%');
            })
            ->withCount('posts')
            ->orderBy('name')
            ->paginate($this->perPage);

        return view('livewire.back.admin.tag', [
            'tags' => $tags,
        ]);
    }
}
