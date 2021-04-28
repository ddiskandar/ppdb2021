<?php

namespace App\Http\Livewire\Student;

use App\Models\Student;
use Livewire\Component;

class ShowName extends Component
{
    public Student $student;

    protected $listeners = [
        'nameUpdated' => '$refresh',
    ];

    public function render()
    {
        return <<<'blade'
            <div>
                {{ $student->user->name }}
            </div>
        blade;
    }
}
