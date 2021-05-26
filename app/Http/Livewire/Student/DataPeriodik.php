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
        'state.tinggi' => 'nullable|numeric|max:250',
        'state.berat' => 'nullable|numeric|max:250',
        'state.lingkar_kepala' => 'nullable|numeric|max:250',
        'state.jarak' => 'nullable|numeric|max:250',
        'state.waktu' => 'nullable|numeric|max:250',
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
        $this->validate();

        $this->student->update([
            'tinggi' => $this->state['tinggi'],
            'berat' => $this->state['berat'],
            'lingkar_kepala' => $this->state['lingkar_kepala'],
            'jarak' => $this->state['jarak'],
            'waktu' => $this->state['waktu'],
        ]);
            
        $this->emit('saved');
    }

    public function render()
    {
        return view('livewire.student.data-periodik');
    }
}
