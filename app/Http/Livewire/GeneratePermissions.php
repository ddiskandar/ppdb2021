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
        Permission::findOrCreate('process card', 'web');
        Permission::findOrCreate('process wawancara', 'web');
        Permission::findOrCreate('process pleno', 'web');
        Permission::findOrCreate('download excel', 'web');
        Permission::findOrCreate('reset password', 'web');
        Permission::findOrCreate('edit student', 'web');
        Permission::findOrCreate('print student', 'web');
        Permission::findOrCreate('edit photo', 'web');

        $role1 = Role::findByName('student', 'web');
        $role1->givePermissionTo([
            'edit photo',
        ]);

        $role2 = Role::findByName('committee', 'web');
        $role2->givePermissionTo([
            'edit ukuran seragam',
            'delete student',
            'view statistik',
            'process wawancara',
            'edit ukuran seragam',
            'process tpa',
            'process btq',
            'process pendaftaran',
            'process pembayaran',
            'process seleksi',
            'process pleno',
            'download excel',
            'reset password',
            'edit student',
            'print student',
            'edit photo',
            'process card',
        ]);

        $role3 = Role::findByName('interviewer', 'web');
        $role3->givePermissionTo([
            'process wawancara',
            'process seleksi',
            'edit student',
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
            'edit student',
            'reset password',
            'print student',
            'edit photo',
            'process card',
        ]);

        $role6 = Role::findByName('financial', 'web');
        $role6->givePermissionTo([
            'process pembayaran',
            'process pendaftaran',
            'edit ukuran seragam',
            'edit student',
            'reset password',
            'print student',
            'edit photo',
            'process card',
        ]);

        $this->emit('saved');
    }

    public function render()
    {
        return view('livewire.generate-permissions');
    }
}
