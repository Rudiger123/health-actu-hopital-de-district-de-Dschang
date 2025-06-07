<div class="container-fluid py-4 container-xxl flex-grow-1 container-p-y">

    <div class="py-4">
        <div class="card shadow-sm">
            <div class="card-body">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item">
                            <a href="{{ route('home') }}">Home</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            <a href="#" class="text-primary fw-semibold">Messages</a>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Messages de contact</h3>
                </div>
                <div class="card-body">
                    <!-- Filtres -->
                    <div class="row mb-4">
                        <div class="col-md-3">
                            <div class="form-group">
                                <input type="text" wire:model.live.debounce.300ms="search" class="form-control"
                                    placeholder="Rechercher...">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <select wire:model.live="status" class="form-control">
                                    <option value="">Tous les statuts</option>
                                    <option value="unread">Non lu</option>
                                    <option value="read">Lu</option>
                                    <option value="replied">Répondu</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <input type="date" wire:model.live="dateFrom" class="form-control"
                                    placeholder="Date début">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <input type="date" wire:model.live="dateTo" class="form-control"
                                    placeholder="Date fin">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <button wire:click="resetFilters" class="btn btn-secondary">
                                <i class="fas fa-times"></i> Réinitialiser
                            </button>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Nom</th>
                                    <th>Email</th>
                                    <th>Téléphone</th>
                                    <th>Sujet</th>
                                    <th>Statut</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($messages as $message)
                                    <tr>
                                        <td>{{ $message->created_at->format('d/m/Y H:i') }}</td>
                                        <td>{{ $message->name }}</td>
                                        <td>{{ $message->email }}</td>
                                        <td>{{ $message->phone }}</td>
                                        <td>{{ $message->subject }}</td>
                                        <td>
                                            @if ($message->replied_at)
                                                <span class="badge badge-success">Répondu</span>
                                            @elseif($message->is_read)
                                                <span class="badge badge-info">Lu</span>
                                            @else
                                                <span class="badge badge-warning">Non lu</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.contact-messages.show', $message) }}"
                                                class="btn btn-sm btn-primary">
                                                <i class="fas fa-eye"></i> Voir
                                            </a>
                                            <button wire:click="confirmDestroy({{ $message->id }})"
                                                class="btn btn-sm btn-danger" wire:loading.attr="disabled"
                                                wire:target="confirmDestroy, destroy">
                                                <i class="fas fa-trash"></i>
                                                <span wire:loading.remove
                                                    wire:target="confirmDestroy, destroy">Supprimer</span>
                                                <span wire:loading
                                                    wire:target="confirmDestroy, destroy">Suppression...</span>
                                            </button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center">Aucun message trouvé</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-4">
                        {{ $messages->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
