<div>
    <div class="container-fluid py-4 container-xxl flex-grow-1 container-p-y">
         <!-- En-tête -->
    <div class="container-fluid py-4 container-xxl flex-grow-1 container-p-y">
        <!-- Header -->
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 gap-4">
            <div>
                <h1 class="text-3xl font-bold text-gray-900">Gestion des Tags</h1>
                <p class="text-gray-600">Gérez tous les etiquettes</p>
            </div>
        </div>
    </div>

        <div class="flex flex-col md:flex-row gap-6 ">
            <!-- Tableau des tags -->
            <div class="w-full md:w-1/2 bg-white rounded-lg shadow p-4">
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-xl font-semibold">Gestion des Tags</h2>
                    <div class="flex items-center space-x-2">
                        <input wire:model.live.debounce.300ms="search" type="text" placeholder="Rechercher..."
                            class="px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <select wire:model.live="perPage"
                            class="px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <option value="10">5</option>
                            <option value="25">7</option>
                            <option value="50">9</option>
                            <option value="100">10</option>
                        </select>
                    </div>
                </div>

                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Nom</th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Posts</th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse ($tags as $tag)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <span class="inline-block w-3 h-3 rounded-full mr-2"
                                                style="background-color: {{ $tag->color }}"></span>
                                            <span class="font-medium">{{ $tag->name }}</span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span
                                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                                            {{ $tag->posts_count }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <button wire:click="edit({{ $tag->id }})"
                                            class="text-indigo-600 hover:text-indigo-900 mr-3">
                                            <i class="icon-base bx bx-edit-alt me-1"></i>
                                        </button>
                                        <button wire:click="confirmDelete({{ $tag->id }})"
                                            class="text-red-600 hover:text-red-900">
                                            <i class="icon-base bx bx-trash me-1"></i>
                                        </button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="px-6 py-4 text-center text-gray-500">
                                        Aucun tag trouvé
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="mt-4">
                    {{ $tags->links('pagination::bootstrap-5') }}
                </div>
            </div>

            <!-- Formulaire -->
            <div class="w-full md:w-1/2 bg-white rounded-lg shadow p-4">
                <h2 class="text-xl font-semibold mb-4">
                    {{ $isEditing ? 'Modifier un Tag' : 'Créer un Tag' }}
                </h2>

                @if ($isEditing)
                <form wire:submit="update">
                    <div class="mb-4">
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nom du tag</label>
                        <input type="text" id="name" wire:model.defer="name"
                            class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                            placeholder="Nom du tag">
                        @error('name')
                            <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror
                    </div>
            
                    <div class="mb-4">
                        <label for="color" class="block text-sm font-medium text-gray-700 mb-1">Couleur</label>
                        <div class="flex items-center">
                            <input type="color" id="color" wire:model.defer="color"
                                class="w-10 h-10 border rounded-lg mr-2" placeholder="#3b82f6">
                            <input type="text" wire:model="color"
                                class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                                placeholder="#3b82f6">
                        </div>
                        @error('color')
                            <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror
                    </div>
            
                    <div class="flex justify-end space-x-3">
                        <button type="button" wire:click="resetForm"
                            class="px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50">
                            Annuler
                        </button>
                        <button type="submit"
                            class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                            Mettre à jour
                        </button>
                    </div>
                </form>
            @else
                <form wire:submit.prevent="create">
                    <div class="mb-4">
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nom du tag</label>
                        <input type="text" id="name" wire:model="name"
                            class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                            placeholder="Nom du tag">
                        @error('name')
                            <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror
                    </div>
            
                    <div class="mb-4">
                        <label for="color" class="block text-sm font-medium text-gray-700 mb-1">Couleur</label>
                        <div class="flex items-center">
                            <input type="color" id="color" wire:model="color"
                                class="w-10 h-10 border rounded-lg mr-2">
                            <input type="text" wire:model="color"
                                class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                                placeholder="#3b82f6">
                        </div>
                        @error('color')
                            <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror
                    </div>
            
                    <div class="flex justify-end space-x-3">
                        <button type="submit"
                            class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                            Créer
                        </button>
                    </div>
                </form>
            @endif
            </div>
        </div>
    </div>
</div>
