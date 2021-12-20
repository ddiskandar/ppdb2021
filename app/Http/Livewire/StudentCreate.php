<?php

namespace App\Http\Livewire;

use Livewire\Component;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

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
    public $school_id;
    public $phone;
    public $nisn;
    public $nik;
    public $kk;
    public $birthplace;
    public $birthdate;
    public $ayah_nama;
    public $ibu_nama;
    public $address;
    public $rt;
    public $rw;
    public $desa;
    public $kecamatan;
    public $kab;
    public $prov;
    public $kode_pos;

    protected $rules = [
        'pilihan_kelas' => 'required',
        'name' => 'required|string|max:52',
        'jk' => 'required|in:L,P',
        'school_id' => 'required',
        'phone' => 'required|string|max:13',
        'nisn' => 'nullable|string|min:10|max:10',
        'nik' => 'nullable|string|min:16:max:16',
        'kk' => 'nullable|string|min:16|max:16',
        'birthplace' => 'required|string|max:32',
        'birthdate' => 'required|date',
        'ayah_nama' => 'required|string:max:32',
        'ibu_nama' => 'required|string:max:32',
        'address' => 'required|string:max:52',
        'rt' => 'required|numeric|max:99',
        'rw' => 'required|numeric|max:99',
        'desa' => 'required|string|max:32',
        'kecamatan' => 'required|string|max:32',
        'kab' => 'required|string|max:32',
        'prov' => 'required|string|max:32',
        'kode_pos' => 'nullable|string|max:5',
    ];

    protected $validationAttributes = [
        'pilihan_kelas' => 'Pilihan Kelas',
        'name' => 'Nama Lengkap',
        'jk' => 'Jenis Kelamin',
        'school_id' => 'Asal Sekolah',
        'phone' => 'Nomor HP/WA',
        'nisn' => 'NISN',
        'nik' => 'NIK',
        'kk' => 'No KK',
        'birthplace' => 'Tempat lahir',
        'birthdate' => 'Tanggal lahir',
        'ayah_nama' => 'Nama ayah',
        'ibu_nama' => 'Nama ibu',
        'address' => 'Alamat',
        'rt' => 'RT',
        'rw' => 'RW',
        'desa' => 'Desa',
        'kecamatan' => 'Kecamatan',
        'kab' => 'Kabupaten',
        'prov' => 'Provinsi',
        'kode_pos' => 'Kode pos',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function create()
    {
        $this->studentCreate = true;
    }

    public function store()
    {
        $this->validate();

        DB::transaction(function () {

            $periode = Periode::where('active', true)->first()->name;


            $user = User::create([
                'username' => '2223.' . $periode . '.' . rand(1000, 9999),
                'name' => $this->name,
                'password' => Hash::make('12345678'),
                'remember_token' => Str::random(10),
            ]);

            $student = Student::create([
                'user_id' => $user->id,
                'jk' => $this->jk,
                'school_id' => $this->school_id,
                'phone' => $this->phone,
                'nisn' => $this->nisn,
                'nik' => $this->nik,
                'kk' => $this->kk,
                'birthplace' => $this->birthplace,
                'birthdate' => $this->birthdate,
                'address' => $this->address,
                'rt' => $this->rt,
                'rw' => $this->rw,
                'desa' => $this->desa,
                'kecamatan' => $this->kecamatan,
                'kab' => $this->kab,
                'prov' => $this->prov,
                'kode_pos' => $this->kode_pos,
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

        $this->emit('studentAdded');
    }

    public function render()
    {
        return view('livewire.student-create', [
            'schools' => \DB::table('schools')->orderByDesc('last_students')->get(),
        ]);
    }
}
