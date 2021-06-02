<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTable extends Component
{
    use WithPagination;

    public $search;
    public $perPage = 4;

    public $userId = '';

    public $name;
    public $username;
    public $role;

    public $confirmingResetPassword = false;
    public $userResetPassword;

    protected $rules = [
        'username' => 'required|string|max:32',
        'name' => 'required|string|max:32',
    ];

    public function confirmResetPassword($id)
    {
        $this->resetErrorBag();
        $this->userResetPassword = User::where('id', $id)->first();

        $this->dispatchBrowserEvent('confirming-reset-password');

        $this->confirmingResetPassword = true;
    }

    public function resetPassword()
    {
        User::where('id', $this->userResetPassword->id)
            ->update([
                'password' => Hash::make('majuterus'),
            ]);

        $this->confirmingResetPassword = false;

        $this->emit('reseted');
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingPerPage()
    {
        $this->resetPage();
    }

    public function edit($id)
    {
        $user = User::find($id);
        $this->userId = $user->id;
        $this->username = $user->username;
        $this->name = $user->name;
        $this->role = $user->getRoleNames();
    }

    public function submitForm()
    {
        $this->validate();

        if ( ! $this->userId) {

            DB::transaction(function () {

                $user = User::Create([
                    'username' => $this->username,
                    'name' => $this->name,
                    'password' => bcrypt('majuterus'),
                ]);

                $user->assignRole($this->role);

            });

        } else {

            DB::transaction( function () {

                $user = User::where('id', $this->userId)->first();

                $user->update([
                    'username' => $this->username,
                    'name' => $this->name,
                ]);
                
                $user->syncRoles($this->role);
            
            });
            
        }

        $this->resetForm();
    }

    public function resetForm()
    {
        $this->userId = '';
        $this->username = '';
        $this->name = '';
    }

    public function render()
    {
        return view('livewire.users-table', [
            'users' => User::query()
                ->with('roles')
                ->role(['committee', 'interviewer', 'testers', 'officer'])
                ->where('name', 'like', '%' . $this->search . '%')
                ->paginate($this->perPage),

            'roles' => Role::query()
                ->whereNotIn('name', ['student', 'admin'])
                ->orderBy('name', 'DESC')
                ->get(),
        ]);
    }
}
