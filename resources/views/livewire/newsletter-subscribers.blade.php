<div class="container-fluid py-4 container-xxl flex-grow-1 container-p-y">
    <!-- Header -->
    <div>
        <h1 class="text-3xl font-bold text-gray-900">Gestion des Abonnés</h1>
        <p class="text-gray-600">Gérez tous les abonnés de votre plateforme</p>
    </div>

    @if (session()->has('message'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
            <span class="block sm:inline">{{ session('message') }}</span>
        </div>
    @endif

    <div class="container my-5">
        <ul class="nav nav-tabs" id="newsletterTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="view-tab" data-bs-toggle="tab" data-bs-target="#view-content"
                    type="button">
                    <i class="fas fa-list me-1"></i>
                    Liste des newsletters
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="send-tab" data-bs-toggle="tab" data-bs-target="#send-content"
                    type="button">
                    <i class="fas fa-paper-plane me-1"></i>
                    Envoyer une newsletter
                </button>
            </li>
        </ul>

        <div class="tab-content p-3 rounded-bottom" id="newsletterTabContent">
            <div class="tab-pane fade show active" id="view-content" role="tabpanel">

                <div class="flex justify-between items-center mb-4">
                    <input type="text" wire:model.live="search" placeholder="Rechercher par email..."
                        class="border p-2 rounded w-1/3">
                    <button wire:click="exportCsv"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Exporter CSV
                    </button>
                </div>

                <div class="overflow-x-auto bg-white shadow-md rounded-lg">
                    <table class="min-w-full leading-normal">
                        <thead>
                            <tr>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    ID
                                </th>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Email
                                </th>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Date d'inscription
                                </th>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Statut d'abonnement
                                </th>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($subscribers as $subscriber)
                                <tr>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        {{ $subscriber->id }}
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        {{ $subscriber->email }}
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        {{ $subscriber->created_at->format('d/m/Y H:i') }}
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <span
                                            class="relative inline-block px-3 py-1 font-semibold leading-tight {{ $subscriber->is_subscribed ? 'text-green-900' : 'text-red-900' }}">
                                            <span aria-hidden="true"
                                                class="absolute inset-0 opacity-50 rounded-full {{ $subscriber->is_subscribed ? 'bg-green-200' : 'bg-red-200' }}"></span>
                                            <span
                                                class="relative">{{ $subscriber->is_subscribed ? 'Abonné' : 'Désabonné' }}</span>
                                        </span>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        @if ($subscriber->is_subscribed)
                                            <button wire:click="unsubscribe({{ $subscriber->id }})"
                                                class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-2 px-4 rounded-lg shadow-md transition duration-300 ease-in-out mr-2">
                                                Désabonner
                                            </button>
                                        @endif
                                        <button wire:click="confirmDelete({{ $subscriber->id }})"
                                            class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded-lg shadow-md transition duration-300 ease-in-out">
                                            Supprimer
                                        </button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5"
                                        class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-center">
                                        Aucun abonné trouvé.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="mt-4">
                    {{ $subscribers->links() }}
                </div>
            </div>

            <div class="tab-pane fade" id="send-content" role="tabpanel">
                <div class="card border-0">
                    <div class="card-body">
                        @livewire('send-newsletter-form')
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
