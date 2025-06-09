<?php

namespace App\Livewire;

use App\Models\NewsletterSubscription;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Response;

class NewsletterSubscribers extends Component
{
    use WithPagination;

    public $search = '';
    public $perPage = 10;

    protected $queryString = ['search' => ['except' => '']];

    protected $listeners = [
        'delete' => 'delete',
    ];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $subscribers = NewsletterSubscription::query()
            ->when($this->search, function ($query) {
                $query->where('email', 'like', '%' . $this->search . '%');
            })
            ->paginate($this->perPage);

        return view('livewire.newsletter-subscribers', [
            'subscribers' => $subscribers,
        ]);
    }

    public function unsubscribe($id)
    {
        $subscriber = NewsletterSubscription::find($id);
        if ($subscriber) {
            $subscriber->update(['is_subscribed' => false]);
            session()->flash('message', 'Abonné désabonné avec succès.');
        }
    }

    public function delete($id)
    {
        NewsletterSubscription::destroy($id);
        $this->dispatch('show-toast', type: 'success', message: 'Abonné supprimé avec succès.');
    }

    public function exportCsv()
    {
        $headers = [
            'Content-type'        => 'text/csv',
            'Content-Disposition' => 'attachment; filename=newsletter_subscribers.csv',
            'Pragma'              => 'no-cache',
            'Cache-Control'       => 'must-revalidate, post-check=0, pre-check=0',
            'Expires'             => '0',
        ];

        $subscribers = NewsletterSubscription::all();
        $callback = function () use ($subscribers) {
            $file = fopen('php://output', 'w');
            fputcsv($file, ['ID', 'Email', 'Date d\'inscription', 'Abonné']); // CSV Header

            foreach ($subscribers as $subscriber) {
                fputcsv($file, [
                    $subscriber->id,
                    $subscriber->email,
                    $subscriber->created_at->format('Y-m-d H:i:s'),
                    $subscriber->is_subscribed ? 'Oui' : 'Non',
                ]);
            }
            fclose($file);
        };

        return Response::stream($callback, 200, $headers);
    }

    public function confirmDelete($id)
    {
        $this->dispatch('confirm-delete', title: 'Confirmer la suppression', text: 'Voulez-vous vraiment supprimer cet abonné ? Cette action est irréversible.', id: $id);
    }
}
