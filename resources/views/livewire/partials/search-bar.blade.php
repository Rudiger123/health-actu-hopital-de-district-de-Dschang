<?php

use Livewire\Volt\Component;

new class extends Component {
    
    public $query = '';

    public function searchPosts()
    {
        if (trim($this->query) !== '') {
            return redirect()->route('blog.search', ['query' => $this->query]);
        }
    }
}; ?>

<div class="input-group">
    <input type="text" class="form-control" placeholder="{{__('Search')}}" wire:model.defer="query"
        wire:keydown.enter="searchPosts">

    <button class="btn btn-primary" wire:click="search">
        <i class="bi bi-search"></i>
    </button>
</div>
