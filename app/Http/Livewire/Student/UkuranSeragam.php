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

        $this->student->update([
            'pdu' => $this->state['pdu'],
            'olahraga' => $this->state['olahraga'],
            'jas' => $this->state['jas'],
        ]);
        
        $this->emit('saved');
    }

    public function render()
    {
        return view('livewire.student.ukuran-seragam');
    }
}
