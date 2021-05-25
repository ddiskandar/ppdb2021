<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

use App\Models\User;

class GeneratePermissions extends Component
{
    public function generate()
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        Permission::findOrCreate('edit ukuran seragam', 'web');
        Permission::findOrCreate('delete student', 'web');
        Permission::findOrCreate('view statistik', 'web');

        $role1 = Role::findByName('student', 'web');

        $role2 = Role::findByName('committee', 'web');
        $role2->givePermissionTo([
            'edit ukuran seragam',
            'delete student',
            'view statistik'
        ]);

        $role3 = Role::findByName('interviewer', 'web');

        $role3 = Role::findByName('testers', 'web');

        $this->emit('saved');
    }

    public function render()
    {
        return view('livewire.generate-permissions');
    }
}
