<?php

namespace App\Http\Livewire\Student;

use App\Models\Ppdb;
use App\Models\Student;
use Livewire\Component;

class NilaiBtq extends Component
{
    public $student;

    public $state = [];

    protected $rules = [
        'state.baca_quran' => 'required',
        'state.tulis_quran' => 'required',
    ];

    protected $validationAttributes = [
        'state.baca_quran' => 'Baca Quran',
        'state.tulis_quran' => 'Tulis Quran',
    ];

    public function mount(Student $student)
    {
        $this->student = $student;

        $this->state = $student->toArray();
    }

    public function update()
    {
        $this->validate();

        $this->student->update($this->state);

        $this->emit('saved');
    }

    public function render()
    {
        return view('livewire.student.nilai-btq');
    }
}
