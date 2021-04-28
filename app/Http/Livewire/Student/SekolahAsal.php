<?php

namespace App\Http\Livewire\Student;

use App\Models\Ppdb;
use App\Models\Student;
use Livewire\Component;

class SekolahAsal extends Component
{
    public $schoolId;
    public $studentId;
    public $ppdbId;

    public $pilihan_kelas;
    public $pilihan_satu;
    public $pilihan_dua;

    public $school_temp;

    protected $rules = [
        'schoolId' => 'required',
        'pilihan_kelas' => 'required|in:1,2,3',
        'pilihan_satu' => 'required|in:1,2,3',
        'pilihan_dua' => 'required|in:1,2,3',
        'school_temp' => 'nullable|max:52',
    ];

    protected $validationAttributes = [
        'school_id' => 'Asal Sekolah',
        'pilihan_kelas' => 'Pilihan Kelas',
        'pilihan_satu' => 'Pilihan pertama',
        'pilihan_dua' => 'Pilihan kedua',
        'school_temp' => 'Nama asal sekolah',
    ];

    public function mount(Student $student)
    {
        $this->schoolId = $student->school_id;
        $this->studentId = $student->id;
        $ppdb = Ppdb::where('student_id', $student->id)->first();
        $this->ppdbId = $ppdb->id;
        $this->pilihan_kelas = $ppdb->pilihan_kelas;
        $this->pilihan_satu = $ppdb->pilihan_satu;
        $this->pilihan_dua = $ppdb->pilihan_dua;
    }

    public function updatedSchoolId()
    {

    }

    public function update()
    {
        $this->validate();

        Ppdb::query()
            ->where('id', $this->ppdbId)
            ->update([
                'pilihan_kelas' => $this->pilihan_kelas,
                'pilihan_satu' => $this->pilihan_satu,
                'pilihan_dua' => $this->pilihan_dua,
            ]);
        
        Student::query()
            ->where('id', $this->studentId)
            ->update([
                'school_id' => $this->schoolId,
            ]);
        
        $this->emit('saved');
    }

    public function render()
    {
        return view('livewire.student.sekolah-asal', [
            'schools' => \DB::table('schools')
                ->orderByDesc('last_students')
                ->get(),
        ]);
    }
}
