<?php

namespace App\Http\Livewire\Student;

use App\Models\Student;
use Livewire\Component;

class UkuranSeragam extends Component
{
    public $student;

    public $state = [];

    protected $rules = [
        'state.pdu' => 'nullable',
        'state.olahraga' => 'nullable',
        'state.jas' => 'nullable',
    ];

    public function mount(Student $student)
    {
        $this->state = $student->toArray();

        $this->student = $student;
    }

    public function update()
    {
        $this->validate();

        $this->student->update($this->state);
        
        $this->emit('saved');
    }

    public function render()
    {
        return view('livewire.student.ukuran-seragam');
    }
}
