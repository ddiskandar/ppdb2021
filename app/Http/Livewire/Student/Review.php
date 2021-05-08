<?php

namespace App\Http\Livewire\Student;

use App\Models\Student;
use Livewire\Component;

class Review extends Component
{
    public $student;

    public function mount(Student $student)
    {
        $this->student = $student;
    }

    public function render()
    {
        return view('livewire.student.review');
    }
}
