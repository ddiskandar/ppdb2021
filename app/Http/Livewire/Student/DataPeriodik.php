<?php

namespace App\Http\Livewire\Student;

use App\Models\Student;
use App\Models\Ortu;
use Livewire\Component;

class DataPeriodik extends Component
{
    public $student;

    public $state = [];

    protected $rules = [
        'state.tinggi' => 'nullable|numeric|max:254',
        'state.berat' => 'nullable|numeric|max:254',
        'state.lingkar_kepala' => 'nullable|numeric|max:254',
        'state.jarak' => 'nullable|numeric|max:254',
        'state.waktu' => 'nullable|numeric|max:254',
    ];

    protected $validationAttributes = [
        'state.tinggi' => 'Tinggi badan',
        'state.berat' => 'Berat badan',
        'state.lingkar_kepala' => 'Lingkar kepala',
        'state.jarak' => 'Jarak tempat tinggal',
        'state.waktu' => 'Waktu tempuh',
    ];

    public function mount(Student $student)
    {
        $this->student = $student;

        $this->state = $student->toArray();
    }

    public function update()
    {
        $this->student->update($this->state);
            
        $this->emit('saved');
    }

    public function render()
    {
        return view('livewire.student.data-periodik');
    }
}
