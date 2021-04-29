<?php

namespace App\Http\Livewire\Student;

use App\Models\Student;
use Livewire\Component;

class DataRincian extends Component
{
    public $student;
    public $state = [];

    protected $rules = [
        'state.hobby_id' => 'required',
        'state.ideals_id' => 'required',
        'state.prestasi' => 'nullable|string|max:512',
    ];

    protected $validationAttributes = [
        'state.prestasi' => 'Prestasi',
    ];

    public function mount(Student $student)
    {
        $this->state = $student->toArray();
        $this->student = $student;
    }

    public function update()
    {
        $this->validate();

        $this->student->update($this->state);
        
        $this->emit('saved');
    }

    public function render()
    {
        return view('livewire.student.data-rincian', [
            'hobbies' => \DB::table('hobbies')->get(),
            'ideals' => \DB::table('ideals')->get(),
        ]);
    }
}
