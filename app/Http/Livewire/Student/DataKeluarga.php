<?php

namespace App\Http\Livewire\Student;

use App\Models\Ortu;
use App\Models\Student;
use Livewire\Component;

class DataKeluarga extends Component
{
    public $ortu;
    public $state = [];

    protected $rules = [
        'state.phone_ortu' => 'nullable|string|max:13',
        'state.ayah_nama' => 'required|string|min:2|max:52',
        'state.ayah_nik' => 'nullable|string|min:16|max:16',
        'state.ayah_lahir' => 'nullable|numeric|max:1999',
        'state.ayah_pendidikan' => 'required',
        'state.ayah_pekerjaan' => 'required',
        'state.ayah_penghasilan' => 'required',

        'state.ibu_nama' => 'required|string|min:2|max:52',
        'state.ibu_nik' => 'nullable|string|min:16|max:16',
        'state.ibu_lahir' => 'nullable|numeric|max:1999',
        'state.ibu_pendidikan' => 'required',
        'state.ibu_pekerjaan' => 'required',
        'state.ibu_penghasilan' => 'required',

        'state.wali_nama' => 'nullable|string|min:2|max:52',
        'state.wali_nik' => 'nullable|string|min:16|max:16',
        'state.wali_lahir' => 'nullable|numeric|max:1999',
        'state.wali_pendidikan' => 'nullable',
        'state.wali_pekerjaan' => 'nullable',
        'state.wali_penghasilan' => 'nullable',
    ];

    protected $validationAttributes = [
        'state.phone_ortu' => 'Nomor HP/Wa ortu',
        'state.ayah_nama' => 'Nama ayah',
        'state.ayah_nik' => 'Nomor NIK ayah',
        'state.ayah_lahir' => 'Tahun lahir ayah',
        'state.ayah_pendidikan' => 'Pendidikan ayah',
        'state.ayah_pekerjaan' => 'Pekerjaan ayah',
        'state.ayah_penghasilan' => 'Penghasilan',

        'state.ibu_nama' => 'Nama ibu',
        'state.ibu_nik' => 'Nomor NIK ibu',
        'state.ibu_lahir' => 'Tahun lahir ibu',
        'state.ibu_pendidikan' => 'Pendidikan ibu',
        'state.ibu_pekerjaan' => 'Pekerjaan ibu',
        'state.ibu_penghasilan' => 'Penghasilan',

        'state.wali_nama' => 'Nama wali',
        'state.wali_nik' => 'Nomor NIK wali',
        'state.wali_lahir' => 'Tahun lahir wali',
        'state.wali_pendidikan' => 'Pendidikan wali',
        'state.wali_pekerjaan' => 'Pekerjaan wali',
        'state.wali_penghasilan' => 'Penghasilan',
    ];

    public function mount(Student $student)
    {
        $ortu = Ortu::query()
            ->where('student_id', $student->id)->first();

        $this->state = $ortu->toArray();
        $this->ortu = $ortu;
    }

    public function update()
    {
        $this->validate();

        $this->ortu->update($this->state);
        
        $this->emit('saved');
    }

    public function render()
    {
        return view('livewire.student.data-keluarga', [
            'pendidikans' => \DB::table('pendidikans')->get(),
            'pekerjaans' => \DB::table('pekerjaans')->get(),
            'penghasilans' => \DB::table('penghasilans')->get(),
        ]);
    }
}
