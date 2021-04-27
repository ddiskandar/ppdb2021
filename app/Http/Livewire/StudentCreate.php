<?php

namespace App\Http\Livewire;

use Livewire\Component;

class StudentCreate extends Component
{
    public $studentCreate = false;

    public function create()
    {
        $this->studentCreate = true;
    }

    public function store()
    {
        $this->emit('saved');
    }

    public function render()
    {
        return view('livewire.student-create', [
            'schools' => \DB::table('schools')->get(),
        ]);
    }
}
