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
                <div class="flex flex-col items-start justify-start md:items-center md:space-x-3 md:flex-row">
                <div>{{ $student->user->name }}</div>
                <div class="hidden text-sm text-gray-600 md:block"> / </div> 
                <div class="mt-1 text-sm text-gray-600 ">{{ $student->school->name }}</div>
                </div>
            </div>
        blade;
    }
}
