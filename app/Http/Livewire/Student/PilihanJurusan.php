<?php

namespace App\Http\Livewire\Student;

use App\Models\Ppdb;
use App\Models\Student;
use Livewire\Component;

class PilihanJurusan extends Component
{
    public $ppdbId;

    public $pilihan_kelas;
    public $pilihan_satu;
    public $pilihan_dua;

    protected $rules = [
        'pilihan_kelas' => 'required|in:0,1',
        'pilihan_satu' => 'required|in:1,2,3',
        'pilihan_dua' => 'required|in:1,2,3',
    ];

    protected $validationAttributes = [
        'pilihan_kelas' => 'Pilihan Kelas',
        'pilihan_satu' => 'Pilihan pertama',
        'pilihan_dua' => 'Pilihan kedua',
    ];

    public function mount(Student $student)
    {
        $ppdb = Ppdb::where('student_id', $student->id)->first();

        $this->ppdbId = $ppdb->id;
        
        $this->pilihan_kelas = $ppdb->pilihan_kelas;
        $this->pilihan_satu = $ppdb->pilihan_satu;
        $this->pilihan_dua = $ppdb->pilihan_dua;
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

        $this->emit('saved');
    }

    public function render()
    {
        return view('livewire.student.pilihan-jurusan');
    }
}
