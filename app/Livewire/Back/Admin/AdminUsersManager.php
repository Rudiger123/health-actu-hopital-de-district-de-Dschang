<?php

namespace App\Livewire\Back\Admin;

use App\Livewire\Back\UserTopInfo;
use Livewire\Component;
use App\Models\User;
use App\UserStatus;
use App\UserType;
use Illuminate\Support\Facades\Hash;
use Livewire\WithPagination;

class AdminUsersManager extends Component
{
    use WithPagination;

    public $name, $email, $username, $password, $password_confirmation, $bio;
    public $selectedUsers = [];
    public $search = '';
    public $sortField = 'created_at';
    public $sortDirection = 'desc';
    public $showModal = false;
    public $editMode = false;
    public $currentUserId;

    protected $listeners = [
        'deleteUser'
    ];

    protected $rules = [
        'name' => 'required|min:3',
        'email' => 'required|email|unique:users,email',
        'username' => 'required|unique:users,username',
        'password' => 'required|min:8|confirmed'
    ];

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortField = $field;
            $this->sortDirection = 'asc';
        }
    }

    public function showModalForm()
    {
        $this->resetErrorBag();
        $this->dispatch('showModalForm');
    }

    public function hideModalForm()
    {
        $this->editMode = false;
        $this->showModal = false;
        $this->resetForm();
        $this->dispatch('hideModalForm');
    }

    public function addUser()
    {
        $this->resetForm();
        $this->editMode = false;
        $this->showModal = true;
        $this->showModalForm();
    }

    public function createUser()
    {
        // dump('hello world');

        // dump($this->name);

        $this->validate();

        $newUser = new User();
        $newUser->name = $this->name;
        $newUser->email = $this->email;
        $newUser->username = $this->username;
        $newUser->password = Hash::make($this->password);
        $newUser->status = UserStatus::Active;
        $newUser->type = UserType::Admin;
        $newUser->bio =  $this->bio;
        $newUser->save();

        $this->hideModalForm();

        $this->dispatch('showAlert', [
            'type' => 'success',
            'title' => 'utilisateur',
            'text' => "Utilisateur créé avec succès!",
        ]);
    }

    public function editUser($userId)
    {
        $user = User::findOrFail($userId);

        $this->currentUserId = $userId;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->username = $user->username;
        $this->bio = $user->bio;

        $this->editMode = true;
        $this->showModal = true;
        $this->showModalForm();
    }

    public function updateUser()
    {
        $rules = [
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users,email,' . $this->currentUserId,
            'username' => 'required|unique:users,username,' . $this->currentUserId,
        ];

        if ($this->password) {
            $rules['password'] = 'min:8|confirmed';
        }

        $this->validate($rules);

        $user = User::find($this->currentUserId);

        $updateData = [
            'name' => $this->name,
            'email' => $this->email,
            'username' => $this->username,
            'bio' => $this->bio
        ];

        if ($this->password) {
            $updateData['password'] = Hash::make($this->password);
        }

        $user->update($updateData); 

        // Déclenchement des événements pour mettre à jour d'autres composants
        $this->dispatch("updateTopUserInfo")->to(UserTopInfo::class);

        $this->hideModalForm();

        $this->dispatch('showAlert', [
            'type' => 'success',
            'title' => 'utilisateur',
            'text' => "Utilisateur mis à jour avec succès!",
        ]);
    }

    // Confirmation de suppression
    public function confirmDelete($id)
    {
        $this->dispatch(
            'confirm-delete',
            title: 'Confirmer la suppression',
            text: 'Voulez-vous vraiment supprimer cet utilisateur ?',
            id: $id
        );
    }

    public function deleteUser($id)
    {
        $user = User::findOrFail($id);

        // Suppression en cascade grâce aux relations Eloquent
        $user->posts()->delete();
        $user->delete();

        $this->dispatch(
            'show-toast',
            type: 'success',
            message: 'Utilisateur supprimé avec succès'
        );
    }

    public function bulkStatusUpdate($status)
    {
        User::whereIn('id', $this->selectedUsers)->update(['status' => $status]);
        $this->selectedUsers = [];
        session()->flash('success', 'Statut mis à jour pour les utilisateurs sélectionnés!');
    }

    public function updateStatus($id, $status)
    {
        $user = User::findOrFail($id);
        $stat = ($user->status === UserStatus::Active) ? UserStatus::Inactive : UserStatus::Active;
        $user->update([
            'status' => $stat
        ]);
    }

    public function resetForm()
    {
        $this->reset([
            'name',
            'email',
            'username',
            'password',
            'password_confirmation',
            'bio',
            'currentUserId',
            'editMode'
        ]);
        // Valeurs par défaut
        $this->currentUserId = null;
        $this->name = '';
        $this->email = '';
        $this->username = '';
        $this->bio = '';
        $this->editMode = false;

        // Réinitialiser les erreurs de validation
        $this->resetErrorBag();

        // Réinitialiser les champs du formulaire (si nécessaire)
        $this->resetValidation();
    }

    public function render()
    {
        $users = User::query()
            ->when($this->search, function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%')
                    ->orWhere('email', 'like', '%' . $this->search . '%')
                    ->orWhere('username', 'like', '%' . $this->search . '%');
            })
            ->withCount(['posts'])
            ->orderBy($this->sortField, $this->sortDirection)
            ->paginate(10);

        return view('livewire.back.admin.admin-users-manager', [
            'users' => $users,
            'statuses' => ['active', 'inactive', 'suspended'],
            'types' => ['user', 'editor', 'admin', 'superadmin']
        ]);
    }
}
