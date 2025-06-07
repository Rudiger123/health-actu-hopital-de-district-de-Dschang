<?php

namespace App\Livewire;

use App\Models\ContactMessage;
use Livewire\Component;
use Livewire\WithPagination;

class Message extends Component
{
    use WithPagination;

    public $search = '';
    public $status = '';
    public $dateFrom = '';
    public $dateTo = '';

    protected $queryString = [
        'search' => ['except' => ''],
        'status' => ['except' => ''],
        'dateFrom' => ['except' => ''],
        'dateTo' => ['except' => '']
    ];

    protected $listeners = [
        'destroy' => 'destroy',
    ];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingStatus()
    {
        $this->resetPage();
    }

    public function updatingDateFrom()
    {
        $this->resetPage();
    }

    public function updatingDateTo()
    {
        $this->resetPage();
    }

    public function resetFilters()
    {
        $this->reset(['search', 'status', 'dateFrom', 'dateTo']);
        $this->resetPage();
    }

    public function getMessagesProperty()
    {
        $query = ContactMessage::query();

        if ($this->search) {
            $query->where(function ($q) {
                $q->where('name', 'like', '%' . $this->search . '%')
                    ->orWhere('email', 'like', '%' . $this->search . '%')
                    ->orWhere('subject', 'like', '%' . $this->search . '%')
                    ->orWhere('phone', 'like', '%' . $this->search . '%');
            });
        }

        if ($this->status) {
            switch ($this->status) {
                case 'replied':
                    $query->whereNotNull('replied_at');
                    break;
                case 'read':
                    $query->where('is_read', true)->whereNull('replied_at');
                    break;
                case 'unread':
                    $query->where('is_read', false);
                    break;
            }
        }

        if ($this->dateFrom) {
            $query->whereDate('created_at', '>=', $this->dateFrom);
        }

        if ($this->dateTo) {
            $query->whereDate('created_at', '<=', $this->dateTo);
        }

        return $query->latest()->paginate(10);
    }

    public function confirmDestroy($id)
    {
        $this->dispatch('confirm-delete', title: 'Confirmer la suppression', text: 'Voulez-vous vraiment supprimer ce message ? Cette action est irréversible.', id: $id);
    }

    public function destroy($id)
    {
        $message = ContactMessage::findOrFail($id);
        $message->delete();
        $this->dispatch('show-toast', type: 'success', message: 'Message supprimé avec succès.');
    }

    public function render()
    {
        return view('livewire.message', [
            'messages' => $this->messages
        ]);
    }
}
