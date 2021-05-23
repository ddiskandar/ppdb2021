<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use App\Models\User;

class GeneratePermissions extends Component
{
    public function generate()
    {
        sleep(5);
    }

    public function render()
    {
        return view('livewire.generate-permissions');
    }
}
