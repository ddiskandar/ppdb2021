<?php

namespace App\Http\Livewire\Student;

use App\Models\Student;
use Livewire\Component;

class NilaiTpa extends Component
{
    public $student;

    public $state = [];

    protected $rules = [
        'state.tpa' => 'nullable',
        'state.gambar' => 'nullable',
    ];

    protected $validationAttributes = [
        'state.tpa' => 'Ujian Test Tulis',
        'state.gambar' => 'Ujian Menggambar',
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
            'tpa' => $this->state['tpa'],
            'gambar' => $this->state['gambar'],
        ]);

        $this->emit('saved');
    }

    public function render()
    {
        return view('livewire.student.nilai-tpa');
    }
}
