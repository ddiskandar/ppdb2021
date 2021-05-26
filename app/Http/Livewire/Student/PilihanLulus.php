<?php

namespace App\Http\Livewire\Student;

use App\Models\Ppdb;
use App\Models\Student;
use Livewire\Component;

class PilihanLulus extends Component
{
    public $ppdb;

    public $state = [];

    protected $rules = [
        'state.pilihan_lulus' => 'required|in:1,2,3',
    ];

    protected $validationAttributes = [
        'state.pilihan_lulus' => 'Pilihan jurusan yang lulus',
    ];

    public function mount(Student $student)
    {
        $ppdb = Ppdb::whereStudentId($student->id)->first();

        $this->ppdb = $ppdb;

        $this->state = $ppdb->toArray();
    }

    public function update()
    {
        $this->validate();

        $this->ppdb->update([
            'pilihan_lulus' => $this->state['pilihan_lulus']
        ]);

        $this->emit('saved');
    }

    public function render()
    {
        return view('livewire.student.pilihan-lulus');
    }
}
