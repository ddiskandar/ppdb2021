<?php

namespace App\Http\Livewire\Student;

use Livewire\Component;

use App\Models\Ppdb;
use App\Models\Student;

class JoinWa extends Component
{
    public $ppdb;

    public $student;

    public $join_wa;
    public $phone;

    protected $rules = [
        'phone' => 'required|string|max:13',
        'join_wa' => 'required|in:0,1',
    ];

    protected $validationAttributes = [
        'phone' => 'Nomor HP/WA',
        'join_wa' => 'Pilihan Gabung Grup',
    ];

    public function mount(Student $student)
    {
        $ppdb = Ppdb::whereStudentId($student->id)->first();

        $this->ppdb = $ppdb;

        $this->join_wa = $ppdb->join_wa;
        $this->phone = $student->phone;
        $this->student = $student;
    }

    public function update()
    {
        $this->validate();

        $this->ppdb->update([
            'join_wa' => $this->join_wa,
        ]);

        $this->student->update([
            'phone' => $this->phone,
        ]);

        $this->emit('saved');
    }

    public function render()
    {
        return view('livewire.student.join-wa');
    }
}
