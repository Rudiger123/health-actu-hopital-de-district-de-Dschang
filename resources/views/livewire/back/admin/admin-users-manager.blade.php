<div>
    <div class="container mx-auto px-4 py-8">
        <!-- Header -->
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 gap-4">
            <div>
                <h1 class="text-3xl font-bold text-gray-900">Gestion des Utilisateurs</h1>
                <p class="text-gray-600">Gérez tous les utilisateurs de votre plateforme</p>
            </div>
            @can('create', App\Models\User::class)
                <button wire:click = 'addUser'
                    class="bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-2 rounded-lg flex items-center gap-2 transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                            clip-rule="evenodd" />
                    </svg>
                    Nouvel Utilisateur
                </button>
            @endcan
        </div>

        <!-- Search and Bulk Actions -->
        <div class="bg-white rounded-xl shadow-sm p-4 mb-6">
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
                <div class="relative w-full md:w-96">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <input wire:model.live.debounce.300ms="search" type="text"
                        class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-lg bg-gray-50 focus:ring-indigo-500 focus:border-indigo-500"
                        placeholder="Rechercher utilisateurs...">
                </div>

                @if (count($selectedUsers) > 0)
                    <div class="flex items-center gap-2">
                        <span class="text-gray-700">{{ count($selectedUsers) }} sélectionné(s)</span>
                        <div class="flex gap-2">
                            <select wire:change="bulkStatusUpdate($event.target.value)" class="form-control">
                                <option value="">Modifier statut...</option>
                                @foreach ($statuses as $status)
                                    <option value="{{ $status }}">{{ ucfirst($status) }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                @endif
            </div>
        </div>

        <!-- Users Table -->
        <div class="bg-white rounded-xl shadow-sm overflow-hidden">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                <input type="checkbox" class="rounded text-indigo-600 focus:ring-indigo-500"
                                    wire:model="selectAll">
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer"
                                wire:click="sortBy('name')">
                                <div class="flex items-center gap-1">
                                    Utilisateur
                                    @if ($sortField === 'name')
                                        @if ($sortDirection === 'asc')
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M5 15l7-7 7 7"></path>
                                            </svg>
                                        @else
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M19 9l-7 7-7-7"></path>
                                            </svg>
                                        @endif
                                    @endif
                                </div>
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Stats
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer"
                                wire:click="sortBy('type')">
                                <div class="flex items-center gap-1">
                                    Rôle
                                    @if ($sortField === 'type')
                                        @if ($sortDirection === 'asc')
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M5 15l7-7 7 7"></path>
                                            </svg>
                                        @else
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M19 9l-7 7-7-7"></path>
                                            </svg>
                                        @endif
                                    @endif
                                </div>
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer"
                                wire:click="sortBy('status')">
                                <div class="flex items-center gap-1">
                                    Statut
                                    @if ($sortField === 'status')
                                        @if ($sortDirection === 'asc')
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M5 15l7-7 7 7"></path>
                                            </svg>
                                        @else
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M19 9l-7 7-7-7"></path>
                                            </svg>
                                        @endif
                                    @endif
                                </div>
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer"
                                wire:click="sortBy('created_at')">
                                <div class="flex items-center gap-1">
                                    Date
                                    @if ($sortField === 'created_at')
                                        @if ($sortDirection === 'asc')
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M5 15l7-7 7 7"></path>
                                            </svg>
                                        @else
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M19 9l-7 7-7-7"></path>
                                            </svg>
                                        @endif
                                    @endif
                                </div>
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse($users as $user)
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <input type="checkbox" class="rounded text-indigo-600 focus:ring-indigo-500"
                                        wire:model="selectedUsers" value="{{ $user->id }}">
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        @if ($user->picture)
                                            <div class="flex-shrink-0 h-10 w-10">
                                                <img class="h-10 w-10 rounded-full object-cover"
                                                    src="{{ asset('storage/' . $user->picture) }}"
                                                    alt="{{ $user->name }}">
                                            </div>
                                        @else
                                            <div class="flex-shrink-0">
                                                <div
                                                    class="h-10 w-10 rounded-full bg-blue-100 flex items-center justify-center text-blue-600 font-semibold">
                                                    {{ substr($user->name, 0, 1) }}
                                                </div>
                                            </div>
                                        @endif
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">{{ $user->name }}</div>
                                            <div class="text-sm text-gray-500">{{ $user->email }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex gap-4">
                                        <div class="text-center">
                                            <div class="text-sm font-medium text-gray-900">{{ $user->posts_count }}
                                            </div>
                                            <div class="text-xs text-gray-500">Posts</div>
                                        </div>
                                        <div class="text-center">
                                            <div class="text-sm font-medium text-gray-900">
                                                @php
                                                    $count = 0;
                                                    $like = 0;

                                                    foreach ($user->posts as $post) {
                                                        $count = $count + $post->comments()->count();
                                                        foreach ($post->comments as $comment) {
                                                            $like = $like + $comment->likes()->count();
                                                        }
                                                    }
                                                @endphp
                                                {{ $count }}
                                            </div>
                                            <div class="text-xs text-gray-500">Commentaires</div>
                                        </div>
                                        <div class="text-center">
                                            <div class="text-sm font-medium text-gray-900">
                                                {{ $like }}
                                            </div>
                                            <div class="text-xs text-gray-500">Likes</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @php
                                        $color = $user->type;
                                    @endphp
                                    <span
                                        class="px-2 py-1 text-xs font-semibold rounded-full {{ $color === App\UserType::Admin ? 'bg-yellow-100 text-yellow-800' : 'bg-red-100 text-red-800' }}">
                                        {{ $user->type }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <label class="inline-flex items-center cursor-pointer">

                                        @if ($user->type === App\UserType::SuperAdmin)
                                            <input type="checkbox" class="sr-only peer" checked disabled>
                                        @else
                                            <input type="checkbox" class="sr-only peer"
                                                wire:change="updateStatus('{{ $user->id }}', $event.target.checked ? 'active' : 'inactive')"
                                                @checked($user->status === App\UserStatus::Active)>
                                        @endif
                                        <div
                                            class="relative w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-indigo-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-indigo-600">
                                        </div>
                                        <span class="ml-3 text-sm font-medium text-gray-900">

                                            @if ($user->status === App\UserStatus::Active)
                                                active
                                            @else
                                                inactive
                                            @endif
                                        </span>
                                    </label>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{ $user->created_at->format('d/m/Y') }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <div class="flex justify-end gap-2">
                                        <button wire:click="editUser('{{ $user->id }}')"
                                            class="text-indigo-600 hover:text-indigo-900" title="Modifier">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                                viewBox="0 0 20 20" fill="currentColor">
                                                <path
                                                    d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                                            </svg>
                                        </button>

                                        @can('delete', $user)
                                            <button wire:click="confirmDelete('{{ $user->id }}')"
                                                class="text-red-600 hover:text-red-900" title="Supprimer">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                                    viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd"
                                                        d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                            </button>
                                        @endcan
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="px-6 py-4 text-center text-gray-500">
                                    Aucun utilisateur trouvé
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="bg-white px-4 py-3 border-t border-gray-200 sm:px-6 rounded-b-xl">
                {{ $users->links('pagination::bootstrap-5') }}
            </div>
        </div>


        <!-- Modal -->
        <div wire:ignore.self class="modal fade" id="modalCenter" tabindex="-1" aria-hidden="true"
            data-backdrop="static" data-keyboard = "false">
            <div class="modal-dialog modal-dialog-centered" role="document">
                @if (!$editMode)
                    <form wire:submit.prevent= 'createUser' class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalCenterTitle">
                                {{ $editMode ? 'Modifier Utilisateur' : 'Créer un Nouvel Utilisateur' }}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">

                            <div class="row g-6">
                                <div class="col mb-4">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" id="nameWithTitle" class="form-control" wire:model="name"
                                        placeholder="Enter Name" />
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col mb-0">
                                    <label for="dobWithTitle" class="form-label">Username</label>
                                    <input type="text" class="form-control" placeholder="Enter UserName"
                                        wire:model="username" />
                                    @error('username')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="col mb-4">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" id="emailWithTitle" class="form-control"
                                        wire:model="email" placeholder="xxxx@xxx.xx" />
                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                            </div>

                            <div class="row g-6">
                                <div class="col mb-4">
                                    <label for="emailWithTitle" class="form-label">Password</label>
                                    <div class="input-group input-group-merge">
                                        <input type="password" class="form-control" wire:model="password"
                                            placeholder="{{ $editMode ? 'Nouveau Mot de passe' : 'Mot de passe' }}"
                                            id="basic-default-password32"
                                            placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                            aria-describedby="basic-default-password" />
                                        <span class="input-group-text cursor-pointer" id="basic-default-password"><i
                                                class="icon-base bi bi-hide"></i></span>
                                    </div>
                                    @error('password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col mb-0">
                                    <label for="dobWithTitle" class="form-label">Password Confirmation</label></label>
                                    <input type="password" class="form-control"
                                        placeholder="Enter confirmation Password"
                                        wire:model="password_confirmation" />
                                    @error('password_confirmation')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="col mb-4">
                                    <label for="nameWithTitle" class="form-label">Bio (Optionnel)</label>
                                    <textarea id="bio" class="form-control" wire:model="bio" placeholder="Enter la biographie..."></textarea>
                                    @error('bio')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                annuler
                            </button>
                            <button type="submit" class="btn btn-primary" wire:loading.attr="disabled">
                                <span wire:loading class="spinner-border spinner-border-sm"></span> Créer</button>
                        </div>
                    </form>
                @endif

                @if ($editMode)
                    <form wire:submit= 'updateUser' class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalCenterTitle">
                                {{ $editMode ? 'Modifier Utilisateur' : 'Créer un Nouvel Utilisateur' }}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row g-6">

                                <div class="col mb-4">
                                    <label for="nameWithTitle" class="form-label">Name</label>
                                    <input type="text" id="nameWithTitle" class="form-control" wire:model="name"
                                        placeholder="Enter Name" />
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col mb-0">
                                    <label for="dobWithTitle" class="form-label">Username</label>
                                    <input type="text" class="form-control" placeholder="Enter UserName"
                                        wire:model="username" />
                                    @error('username')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="col mb-4">
                                    <label for="emailWithTitle" class="form-label">Email</label>
                                    <input type="email" id="emailWithTitle" class="form-control"
                                        wire:model="email" placeholder="xxxx@xxx.xx" />
                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row g-6">
                                <div class="col mb-4">
                                    <label for="emailWithTitle" class="form-label">Password</label>
                                    <div class="input-group input-group-merge">
                                        <input type="password" class="form-control" wire:model="password"
                                            placeholder="{{ $editMode ? 'Nouveau Mot de passe' : 'Mot de passe' }}"
                                            id="basic-default-password32"
                                            placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                            aria-describedby="basic-default-password" />
                                        <span class="input-group-text cursor-pointer" id="basic-default-password"><i
                                                class="icon-base bi bi-hide"></i></span>
                                    </div>
                                    @error('password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col mb-0">
                                    <label for="dobWithTitle" class="form-label">Password Confirmation</label></label>
                                    <input type="password" class="form-control"
                                        placeholder="Enter confirmation Password"
                                        wire:model="password_confirmation" />
                                    @error('password_confirmation')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="col mb-4">
                                    <label for="bio" class="form-label">Bio (Optionnel)</label>
                                    <textarea id="bio" class="form-control" wire:model="bio" placeholder="Enter la biographie..."></textarea>
                                    @error('bio')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">
                                annuler
                            </button>
                            <button type="submit" class="btn btn-primary" wire:loading.attr="disabled">
                                <span wire:loading class="spinner-border spinner-border-sm"></span>Mettre à
                                jour</button>
                        </div>
                    </form>
                @endif
            </div>
        </div>

    </div>
</div>
