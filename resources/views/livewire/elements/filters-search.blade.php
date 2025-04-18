<div>
    <div class="bg-white p-4 rounded-lg shadow mb-6">
        <!-- Barre de recherche principale -->
        <div class="mb-4">
            <input 
                wire:model.live.debounce.300ms="search" 
                type="text" 
                placeholder="Rechercher..." 
                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
            >
        </div>
    
        <!-- Bouton pour afficher/masquer les filtres avancés -->
        <div class="mb-4">
            <button 
                wire:click="toggleAdvancedFilters" 
                class="text-blue-600 hover:text-blue-800 text-sm font-medium"
            >
                {{ $showAdvancedFilters ? 'Masquer les filtres' : 'Filtres avancés' }}
                <i class="ml-1 fas {{ $showAdvancedFilters ? 'fa-chevron-up' : 'fa-chevron-down' }}"></i>
            </button>
        </div>
    
        <!-- Filtres avancés -->
        @if($showAdvancedFilters)
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <!-- Filtre par catégorie -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Catégories</label>
                <select 
                    wire:model.live="selectedCategory" 
                    class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                >
                    <option value="">Toutes les catégories</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
    
            <!-- Filtre par tags -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Tags</label>
                <select 
                    wire:model.live="selectedTags" 
                    multiple 
                    class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 h-[auto]"
                >
                    @foreach($tags as $tag)
                        <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                    @endforeach
                </select>
            </div>
    
            <!-- Filtre par statut -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Statut</label>
                <select 
                    wire:model.live="selectedStatus" 
                    class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                >
                    <option value="">Tous les statuts</option>
                    <option value="published">Publié</option>
                    <option value="draft">Brouillon</option>
                    <option value="archived">Archivé</option>
                </select>
            </div>
        </div>
        @endif
    
        <!-- Bouton réinitialiser -->
        @if($hasFilters)
        <div class="mt-4">
            <button 
                wire:click="resetFilters" 
                class="text-red-600 hover:text-red-800 text-sm font-medium"
            >
                <i class="fas fa-times mr-1"></i> Réinitialiser les filtres
            </button>
        </div>
        @endif
    </div>
</div>
