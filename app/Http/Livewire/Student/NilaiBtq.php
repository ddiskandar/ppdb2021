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
        'state.baca_quran' => 'required|string|max:1|in:S,A,B,C,D,E',
        'state.tulis_quran' => 'required|string|max:1|in:S,A,B,C,D,E',
        'state.bacaan_shalat' => 'required|string|max:1|in:S,A,B,C,D,E',
    ];

    protected $validationAttributes = [
        'state.baca_quran' => 'Baca Quran',
        'state.tulis_quran' => 'Tulis Quran',
        'state.bacaan_shalat' => 'Bacaan Shalat',
    ];

    public function mount(Student $student)
    {
        $this->student = $student;

        $this->state = $student->toArray();
    }

    public function update()
    {
        $this->validate();

        $this->student->update([
            'baca_quran' => $this->state['baca_quran'],
            'tulis_quran' => $this->state['tulis_quran'],
            'bacaan_shalat' => $this->state['bacaan_shalat'],
        ]);

        $this->emit('saved');
    }

    public function render()
    {
        return view('livewire.student.nilai-btq');
    }
}
