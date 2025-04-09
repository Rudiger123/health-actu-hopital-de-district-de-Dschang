<div x-data="{ modelOpen: @entangle('isOpen') }" wire:ignore>
    <!-- Modal pour l'Avatar -->
    <div x-show="modelOpen" class="fixed inset-0 z-50 overflow-y-auto" role="dialog" aria-modal="true">
        <div class="flex items-end justify-center min-h-screen px-4 text-center sm:items-center sm:block sm:p-0">
            
            <!-- Overlay -->
            <div x-cloak x-show="modelOpen"
                 x-transition:enter="transition ease-out duration-300"
                 x-transition:enter-start="opacity-0"
                 x-transition:enter-end="opacity-100"
                 x-transition:leave="transition ease-in duration-200"
                 x-transition:leave-start="opacity-100"
                 x-transition:leave-end="opacity-0"
                 class="fixed inset-0 bg-black bg-opacity-75 transition-opacity">
                 @click="modelOpen = false"></div>

            <!-- Modal content -->
            <div x-cloak x-show="modelOpen"
                 x-transition:enter="transition ease-out duration-300 transform"
                 x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                 x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                 x-transition:leave="transition ease-in duration-200 transform"
                 x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                 x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                 class="inline-block w-full max-w-xl p-6 my-20 overflow-hidden text-left align-middle transition-all transform bg-white rounded-lg shadow-xl">
                
                <!-- Header -->
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-lg font-semibold text-gray-800">Mettre à jour la photo de profil</h2>
                    <button @click="modelOpen = false" class="text-gray-500 hover:text-gray-700 focus:outline-none">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none"
                             viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <!-- Formulaire -->
                <form wire:submit.prevent="save">
                    <div class="mb-4">
                        <label for="photo" class="block text-sm font-medium text-gray-700 mb-2">
                            <i class="bx bx-cloud-upload text-lg"></i>
                            <span>Glissez-déposez une image ou cliquez pour sélectionner</span>
                        </label>

                        <div class="flex items-center gap-4">
                            <div class="flex items-center justify-center w-20 h-20 border border-dashed border-gray-300 rounded-full bg-gray-50 overflow-hidden">
                                @if ($photo)
                                    <img src="{{ $photo->temporaryUrl() }}" class="object-cover w-full h-full rounded-full" alt="Preview">
                                @else
                                    <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor"
                                         stroke-width="1.5" viewBox="0 0 24 24" stroke-linecap="round"
                                         stroke-linejoin="round">
                                        <circle cx="12" cy="12" r="10"></circle>
                                        <circle cx="12" cy="10" r="3"></circle>
                                        <path d="M7 20.662V19a2 2 0 0 1 2-2h6a2 2 0 0 1 2 2v1.662"></path>
                                    </svg>
                                @endif
                            </div>

                            <div class="flex-1">
                                <input id="photo" type="file" wire:model.lazy="photo"
                                       class="block w-full text-sm text-gray-700 file:mr-4 file:py-2 file:px-4
                                       file:rounded-full file:border-0 file:text-sm file:font-semibold
                                       file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100">
                                <div wire:loading wire:target="photo" class="text-sm text-gray-500 mt-1">Chargement...</div>
                                @error('photo')
                                    <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Bouton -->
                    <div class="flex justify-end">
                        <button type="submit"
                                class="px-4 py-2 text-sm font-medium text-white bg-indigo-600 rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                            Enregistrer
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
