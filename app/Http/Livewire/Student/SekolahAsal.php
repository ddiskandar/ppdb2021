<?php

namespace App\Http\Livewire\Student;

use App\Models\Student;
use Livewire\Component;

class SekolahAsal extends Component
{
    public $studentId;

    public $schoolId;
    public $school_temp;

    protected $rules = [
        'schoolId' => 'required',
        'school_temp' => 'nullable|max:52',
    ];

    protected $validationAttributes = [
        'school_id' => 'Asal Sekolah',
        'school_temp' => 'Nama asal sekolah',
    ];

    public function mount(Student $student)
    {
        $this->schoolId = $student->school_id;
        $this->studentId = $student->id;
        $this->school_temp = $student->school_temp;
    }

    public function update()
    {
        $this->validate();

        Student::query()
            ->where('id', $this->studentId)
            ->update([
                'school_id' => $this->schoolId,
                'school_temp' => $this->school_temp,
            ]);
        
        $this->emit('saved');
    }

    public function render()
    {
        return view('livewire.student.sekolah-asal', [
            'schools' => \DB::table('schools')
                ->get(),
        ]);
    }
}
