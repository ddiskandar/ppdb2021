<?php

namespace App\Http\Livewire;

use Livewire\Component;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

use App\Models\Document;
use App\Models\User;
use App\Models\Student;
use App\Models\Ortu;
use App\Models\Periode;
use App\Models\Ppdb;

class StudentCreate extends Component
{
    public $studentCreate = false;

    public $pilihan_kelas;
    public $name;
    public $jk;
    public $nisn;
    public $phone;
    public $school_id;
    public $birthdate;
    public $birthplace;
    public $ayah_nama;
    public $ibu_nama;
    public $address;
    public $rt;
    public $rw;
    public $desa;
    public $kecamatan;
    public $kab;
    public $prov;

    protected $rules = [
        'name' => 'required',
        'pilihan_kelas' => 'required',
        'school_id' => 'required',
        'jk' => 'required',
        'nisn' => 'nullable',
        'birthplace' => 'required',
        'birthdate' => 'required',
        'phone' => 'required',
        'address' => 'required',
        'rt' => 'required',
        'rw' => 'required',
        'desa' => 'required',
        'kecamatan' => 'required',
        'kab' => 'required',
        'prov' => 'required',
        'ayah_nama' => 'required',
        'ibu_nama' => 'required',
    ];

    protected $validationAttributes = [
        'pilihan_kelas' => 'Pilihan kelas',
        'name' => 'Nama Lengkap',
        'birthplace' => 'Tempat lahir',
        'birthdate' => 'Tanggal lahir',
    ];

    public function create()
    {
        $this->studentCreate = true;
    }

    public function store()
    {
        $this->validate();

        DB::transaction(function () {

            $user = User::factory()->create([
                'name' => $this->name,
                'password' => Hash::make('12345678'),
            ]);

            $student = Student::create([
                'user_id' => $user->id,
                'school_id' => $this->school_id,
                'jk' => $this->jk,
                'nisn' => $this->nisn,
                'birthplace' => $this->birthplace,
                'birthdate' => $this->birthdate,
                'phone' => $this->phone,
                'address' => $this->address,
                'rt' => $this->rt,
                'rw' => $this->rw,
                'desa' => $this->desa,
                'kecamatan' => $this->kecamatan,
                'kab' => $this->kab,
                'prov' => $this->prov,
            ]);

            $periode = Periode::where('active', true)->first();

            Ppdb::create([
                'student_id' => $student->id,
                'periode_id' => $periode->id,
                'pilihan_kelas' => $this->pilihan_kelas,
                'payment_amount' => $periode->ref_payment_amount,
            ]);

            Ortu::create([
                'student_id' => $student->id,
                'ibu_nama' => $this->ibu_nama,
                'ayah_nama' => $this->ayah_nama,
            ]);

            Document::create([
                'student_id' => $student->id,
            ]);

            $user->assignRole('student');

            $this->reset([
                'pilihan_kelas', 'name', 'jk', 'nisn', 'phone', 'school_id', 'ayah_nama', 'ibu_nama', 'address', 'rt', 'rw', 'desa', 'kecamatan', 'kab', 'prov',
            ]);

        });

        $this->studentCreate = false;

        $this->emit('saved');
    }

    public function render()
    {
        return view('livewire.student-create', [
            'schools' => \DB::table('schools')->get(),
        ]);
    }
}
