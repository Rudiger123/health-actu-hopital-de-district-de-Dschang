<div>
    <!-- Modal pour l'Avatar -->
     <div x-show="modelOpen" class="fixed inset-0 z-50 overflow-y-auto" aria-labelledby="modal-title"
     role="dialog" aria-modal="true">
     <div
         class="flex items-end justify-center min-h-screen px-4 text-center md:items-center sm:block sm:p-0">
         <div x-cloak @click="modelOpen = false" x-show="modelOpen"
             x-transition:enter="transition ease-out duration-300 transform"
             x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
             x-transition:leave="transition ease-in duration-200 transform"
             x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
             class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-40" aria-hidden="true"></div>

         <div x-cloak x-show="modelOpen" x-transition:enter="transition ease-out duration-300 transform"
             x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
             x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
             x-transition:leave="transition ease-in duration-200 transform"
             x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
             x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
             class="inline-block w-full max-w-xl p-8 my-20 overflow-hidden text-left transition-all transform bg-white rounded-lg shadow-xl 2xl:max-w-2xl">

             <div class="flex items-center justify-between space-x-4">
                 <h1 class="text-2xl font-medium text-gray-800 "> Mettre à jour la photo de profil </h1>
                 <button @click="modelOpen = false"
                     class="text-gray-600 focus:outline-none hover:text-gray-700">
                     <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none"
                         viewBox="0 0 24 24" stroke="currentColor">
                         <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                             d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                     </svg>
                 </button>
             </div>


             <form wire:submit.prevent="save" class="mt-5">
                 <div class="mb-4">
                     <label for="photo"
                         class="block text-sm font-medium text-gray-700 mb-2"> <i class="bx bx-cloud-upload"></i>
                         <p>Glissez-déposez une image ou cliquez pour sélectionner</p></label>
                     <div>
                         <div class="flex flex-wrap items-center gap-3 sm:gap-5">
                             <div class="group">
                                 <span
                                     class="group-has-[div]:hidden flex shrink-0 justify-center items-center size-20 border-2 border-dotted border-gray-300 text-gray-400 cursor-pointer rounded-full hover:bg-gray-50 :border-neutral-700 :text-neutral-600 :hover:bg-neutral-700/50">
                                     @if ($photo)
                                         <img class="shrink-0 size-20 rounded-full"
                                             src="{{ $photo->temporaryUrl() }}">
                                     @else
                                         <svg class="shrink-0 size-7" xmlns="http://www.w3.org/2000/svg"
                                             width="24" height="24" viewBox="0 0 24 24"
                                             fill="none" stroke="currentColor" stroke-width="1.5"
                                             stroke-linecap="round" stroke-linejoin="round">
                                             <circle cx="12" cy="12" r="10"></circle>
                                             <circle cx="12" cy="10" r="3"></circle>
                                             <path d="M7 20.662V19a2 2 0 0 1 2-2h6a2 2 0 0 1 2 2v1.662">
                                             </path>
                                         </svg>
                                     @endif
                                 </span>
                             </div>
                             <div class="grow">
                                 <div class="flex items-center gap-x-2">
                                     <input wire:model.lazy="photo" id="photo" type="file"
                                         class="mt-1 block w-full border file:border-none  border-gray-300 rounded-md shadow-sm file:py-2 file:cursor-pointer">
                                 </div>
                                 <div wire:loading wire:target="photo">chargement...</div>
                             </div>
                         </div>
                     </div>
                     @error('photo')
                         <span class="text-red-500 text-sm">{{ $message }}</span>
                     @enderror
                 </div>

                 <div class="flex justify-end mt-6">
                     <button type="submit"
                         class="px-3 py-2 text-sm tracking-wide text-white capitalize transition-colors duration-200 transform bg-indigo-500 rounded-md :bg-indigo-600 :hover:bg-indigo-700 :focus:bg-indigo-700 hover:bg-indigo-600 focus:outline-none focus:bg-indigo-500 focus:ring focus:ring-indigo-300 focus:ring-opacity-50">
                         Enregistrer
                     </button>
                 </div>
             </form>
         </div>
     </div>
 </div>
 <!-- End create new Post modal -->

</div>
