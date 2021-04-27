<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Student;

class StudentDetail extends Component
{
    public $studentDetail;

    public function render()
    {
        // ddd($this->studentDetail);
        return view('livewire.student-detail');
    }
}
