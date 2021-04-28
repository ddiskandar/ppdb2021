<?php

namespace App\Http\Livewire\Student;

use App\Models\Student;
use Livewire\Component;

class Description extends Component
{
    public $student;

    public $desc_student;

    protected $rules = [
        'desc_student' => 'required|string|max:512'
    ];

    protected $validationAttributes = [
        'desc_student' => 'Deskripsi peserta didik'
    ];


    public function mount(Student $student)
    {
        $this->student = $student;
        $this->desc_student = $student->desc_student;
    }

    public function update()
    {
        $this->validate();

        $this->student->update([
            'desc_student' => $this->desc_student,
        ]);

        $this->emit('saved');
    }

    public function render()
    {
        return view('livewire.student.description');
    }
}
