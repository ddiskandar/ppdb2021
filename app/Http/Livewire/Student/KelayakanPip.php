<?php

namespace App\Http\Livewire\Student;

use App\Models\Student;
use Livewire\Component;

class KelayakanPip extends Component
{
    public $pip_id;
    public $studentId;
    public $desc_keluarga;

    protected $rules = [
        'pip_id' => 'required',
        'desc_keluarga' => 'required|string|max:512',
    ];

    protected $validationAttributes = [
        'desc_keluarga' => 'Deskripsi keluarga'
    ];

    public function mount(Student $student)
    {
        $this->pip_id = $student->pip_id;
        $this->desc_keluarga = $student->desc_keluarga;
        $this->studentId = $student->id;
    }

    public function update()
    {
        Student::query()
            ->where('id', $this->studentId)
            ->update([
                'pip_id' => $this->pip_id,
                'desc_keluarga' => $this->desc_keluarga,
            ]);

        $this->emit('saved');
    }

    public function render()
    {
        return view('livewire.student.kelayakan-pip', [
            'pips' => \DB::table('pips')->get(),
        ]);
    }
}
