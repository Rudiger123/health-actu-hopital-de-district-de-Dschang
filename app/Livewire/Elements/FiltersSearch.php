<?php

namespace App\Livewire\Elements;

use App\Models\Category;
use App\Models\Tag;
use Livewire\Component;

class FiltersSearch extends Component
{
    public $search = '';
    public $selectedCategory = '';
    public $selectedTags = [];
    public $selectedStatus = '';
    public $showAdvancedFilters = false;

    protected $queryString = [
        'search' => ['except' => ''],
        'selectedCategory' => ['except' => ''],
        'selectedTags' => ['except' => []],
        'selectedStatus' => ['except' => ''],
    ];

    public function mount()
    {
        // Initialisation si vous voulez récupérer les valeurs depuis l'URL
        $this->selectedTags = is_array($this->selectedTags) ? $this->selectedTags : [];
    }

    public function toggleAdvancedFilters()
    {
        $this->showAdvancedFilters = !$this->showAdvancedFilters;
    }

    public function resetFilters()
    {
        $this->reset([
            'search',
            'selectedCategory',
            'selectedTags',
            'selectedStatus'
        ]);
    }

    public function getCategoriesProperty()
    {
        return Category::orderBy('name')->get();
    }

    public function getTagsProperty()
    {
        return Tag::orderBy('name')->get();
    }

    public function render()
    {
        // Émettre un événement lorsque les filtres changent
        $this->dispatch('filters-updated', [
            'search' => $this->search,
            'category' => $this->selectedCategory,
            'tags' => $this->selectedTags,
            'status' => $this->selectedStatus,
        ]);

        $hasFilters = !empty($this->search) ||
        !empty($this->selectedCategory) ||
        !empty($this->selectedTags) ||
        !empty($this->selectedStatus);

        return view('livewire.elements.filters-search',[
            'categories' => Category::orderBy('name')->get(),
            'tags' => Tag::orderBy('name')->get(),
            'hasFilters' => $hasFilters
        ]);
    }
}
