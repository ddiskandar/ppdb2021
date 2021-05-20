<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UsersTable extends Component
{
    use WithPagination;

    public $search;

    public $userId = '';

    public $name;
    public $username;
    public $role;

    protected $rules = [
        'username' => 'required|string|max:24',
        'name' => 'required|string|max:32',
    ];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function edit($id)
    {
        $user = User::find($id);
        $this->userId = $user->id;
        $this->username = $user->username;
        $this->name = $user->name;
    }

    public function submitForm()
    {
        $this->validate();

        if ( ! $this->userId) {

            $user = User::Create([
                'username' => $this->username,
                'name' => $this->name,
                'password' => bcrypt('majuterus'),
            ]);

            $user->assignRole($this->role);

        } else {
            
            User::where('id', $this->userId)
                ->Update([
                    'username' => $this->username,
                    'name' => $this->name,
                ]);
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
            'users' => User::with('roles')->role(['committee', 'interviewer', 'testers'])
                ->where('name', 'like', '%' . $this->search . '%')
                ->paginate(5),
            'roles' => \DB::table('roles')->get(),
        ]);
    }
}
