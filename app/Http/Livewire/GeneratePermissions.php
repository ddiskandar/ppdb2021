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
        Permission::findOrCreate('process pembayaran', 'web');
        Permission::findOrCreate('process pendaftaran', 'web');
        Permission::findOrCreate('process seleksi', 'web');
        Permission::findOrCreate('process tpa', 'web');
        Permission::findOrCreate('process btq', 'web');
        Permission::findOrCreate('process wawancara', 'web');
        Permission::findOrCreate('process pleno', 'web');
        Permission::findOrCreate('download excel', 'web');
        Permission::findOrCreate('reset password', 'web');

        $role1 = Role::findByName('student', 'web');

        $role2 = Role::findByName('committee', 'web');
        $role2->givePermissionTo([
            'edit ukuran seragam',
            'delete student',
            'view statistik',
            'process wawancara',
            'edit ukuran seragam',
            'process pendaftaran',
            'process pembayaran',
            'process seleksi',
            'process pleno',
            'download excel',
            'reset password',
        ]);

        $role3 = Role::findByName('interviewer', 'web');
        $role3->givePermissionTo([
            'process wawancara',
            'process seleksi',
        ]);

        $role4 = Role::findByName('testers', 'web');
        $role4->givePermissionTo([
            'process seleksi',
            'process tpa',
            'process btq',
        ]);

        $role5 = Role::findByName('officer', 'web');
        $role5->givePermissionTo([
            'process pendaftaran',
            'edit ukuran seragam',
        ]);

        $role6 = Role::findByName('financial', 'web');
        $role6->givePermissionTo([
            'process pembayaran',
            'process pendaftaran',
        ]);

        $this->emit('saved');
    }

    public function render()
    {
        return view('livewire.generate-permissions');
    }
}
