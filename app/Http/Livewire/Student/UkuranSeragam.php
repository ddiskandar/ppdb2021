<?php

namespace App\Http\Livewire\Student;

use App\Models\Student;
use Livewire\Component;

class UkuranSeragam extends Component
{
    public $studentId;

    public $state = [];

    protected $rules = [
        'state.pdu' => 'required',
        'state.olahraga' => 'required',
        'state.jas' => 'required',
    ];

    public function mount(Student $student)
    {
        $this->state = $student->toArray();

        $this->studentId = $student->id;
    }

    public function update()
    {
        $this->validate();

        Student::query()
            ->where('id', $this->studentId)
            ->update([
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
