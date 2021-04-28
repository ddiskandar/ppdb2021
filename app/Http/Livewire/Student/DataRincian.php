<?php

namespace App\Http\Livewire\Student;

use Livewire\Component;

class DataRincian extends Component
{
    public function render()
    {
        return view('livewire.student.data-rincian', [
            'hobbies' => \DB::table('hobbies')->get(),
            'ideals' => \DB::table('ideals')->get(),
        ]);
    }
}
