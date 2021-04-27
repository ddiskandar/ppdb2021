<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Student;

class StudentDetail extends Component
{
    public Student $student;

    public function render()
    {
        ddd($this->student);
        return view('livewire.student-detail');
    }
}
