<div class="p-6">
    <h2 class="text-2xl font-semibold mb-4">Envoyer une Nouvelle Newsletter Personnalisée</h2>

    @if (session()->has('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    @endif

    @if (session()->has('error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
            <span class="block sm:inline">{{ session('error') }}</span>
        </div>
    @endif

    <div class="bg-white p-6 rounded-lg shadow-md">
        <p class="text-gray-700 mb-4">Nombre d'abonnés actifs : <span class="font-bold text-blue-600">{{ $subscribersCount }}</span></p>

        <form wire:submit.prevent="sendNewsletter">
            {{-- Champ pour le sujet --}}
            <div class="mb-4">
                <label for="newsletterSubject" class="block text-gray-700 text-sm font-bold mb-2">Sujet de la newsletter :</label>
                <input type="text" wire:model.defer="newsletterSubject" id="newsletterSubject"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('newsletterSubject') border-red-500 @enderror"
                    placeholder="Saisissez le sujet de votre newsletter...">
                @error('newsletterSubject')
                    <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                @enderror
            </div>

            {{-- Champ pour le contenu --}}
            <div class="mb-4">
                <label for="newsletterContent" class="block text-gray-700 text-sm font-bold mb-2">Contenu du message :</label>
                <textarea wire:model.defer="newsletterContent" id="newsletterContent" rows="10"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('newsletterContent') border-red-500 @enderror"
                    placeholder="Saisissez ici le contenu de votre newsletter. "></textarea>
                @error('newsletterContent')
                    <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                @enderror
                {{--
                <p class="text-xs text-gray-500 mt-1">
                    **Astuce de personnalisation :** Utilisez `{{ '{' }}{'{ $subscriber->name ?? \'abonné\' }} {{ '}' }}{'}'}` pour insérer le nom de l'abonné (ou 'abonné' par défaut si absent) et `{{ '{' }}{'{ $subscriber->email }} {{ '}' }}{'}'}` pour son adresse e-mail.
                </p>--}}
            </div>

            <div class="flex items-center justify-between">
                <button type="submit"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                    wire:loading.attr="disabled" wire:target="sendNewsletter">
                    Envoyer la Newsletter
                </button>
                <span wire:loading wire:target="sendNewsletter" class="text-gray-600 text-sm ml-3">Envoi en cours...</span>
            </div>
        </form>
    </div>
</div>