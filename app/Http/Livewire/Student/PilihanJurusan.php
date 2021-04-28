<?php

namespace App\Http\Livewire\Student;

use App\Models\Ppdb;
use App\Models\Student;
use Livewire\Component;

class PilihanJurusan extends Component
{
    public $ppdb;

    public $state = [];

    protected $rules = [
        'state.pilihan_kelas' => 'required|in:0,1',
        'state.pilihan_satu' => 'required|in:1,2,3',
        'state.pilihan_dua' => 'required|in:1,2,3',
    ];

    protected $validationAttributes = [
        'state.pilihan_kelas' => 'Pilihan Kelas',
        'state.pilihan_satu' => 'Pilihan pertama',
        'state.pilihan_dua' => 'Pilihan kedua',
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

        $this->ppdb->update($this->state);

        $this->emit('saved');
    }

    public function render()
    {
        return view('livewire.student.pilihan-jurusan');
    }
}
