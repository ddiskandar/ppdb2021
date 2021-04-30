<?php

namespace App\Http\Livewire\Student;

use App\Models\Student;
use Livewire\Component;

class DataPribadi extends Component
{
    public $state = [];

    public $student;
    public $user;

    protected $rules = [
        'state.user.name' => 'required|string|max:52',
        'state.panggilan' => 'nullable|max:20',
        'state.jk' => 'required|in:L,P',
        'state.nisn' => 'nullable|string|min:10|max:10',
        'state.nik' => 'nullable|string|min:16|max:16',
        'state.kk' => 'nullable|string|min:16|max:16',
        'state.akta' => 'nullable|string|max:22',
        'state.birthplace' => 'required|string|max:32',
        'state.birthdate' => 'required|date',
        'state.address' => 'required|string:max:52',
        'state.rt' => 'required|numeric|max:99',
        'state.rw' => 'required|numeric|max:99',
        'state.desa' => 'required|string|max:32',
        'state.kecamatan' => 'required|string|max:32',
        'state.kab' => 'required|string|max:32',
        'state.prov' => 'required|string|max:32',
        'state.kode_pos' => 'nullable|string|max:5',
        'state.lintang' => 'nullable|string|max:32',
        'state.bujur' => 'nullable|string|max:32',
        'state.tinggal_id' => 'required',
        'state.transportasi_id' => 'required',
        'state.anak_ke' => 'nullable|numeric|max:20',
        'state.saudara' => 'nullable|numeric|max:20',
        'state.phone' => 'required|string|max:13',
    ];

    protected $validationAttributes = [
        'state.user.name' => 'Nama lengkap',
        'state.panggilan' => 'Nama panggilan',
        'state.jk' => 'Jenis kelamin',
        'state.nisn' => 'NISN',
        'state.nik' => 'NIK',
        'state.kk' => 'KK',
        'state.akta' => 'Akta',
        'state.birthplace' => 'Tempat lahir',
        'state.birthdate' => 'Tanggal lahir',
        'state.address' => 'Alamat',
        'state.rt' => 'RT',
        'state.rw' => 'RW',
        'state.desa' => 'Desa',
        'state.kecamatan' => 'Kecamatan',
        'state.kab' => 'Kabupaten',
        'state.prov' => 'Provinsi',
        'state.kode_pos' => 'Kode pos',
        'state.lintang' => 'Lintang',
        'state.bujur' => 'Bujur',
        'state.tinggal_id' => 'Tempat tinggal',
        'state.transportasi_id' => 'Moda Transportasi',
        'state.anak_ke' => 'Anak ke',
        'state.saudara' => 'Jumlah saudara',
        'state.phone' => 'No. HP/WA',
    ];

    public function mount(Student $student)
    {
        $this->student = $student;
        $this->user = $student->user;
        $this->state = $student->toArray();
    }

    public function update()
    {
        $this->validate();

        $this->user->update([
                'name' => $this->state['user']['name'],
            ]);

        $this->student->update([
                'panggilan' => $this->state['panggilan'],
                'jk' => $this->state['jk'],
                'nisn' => $this->state['nisn'],
                'nik' => $this->state['nik'],
                'kk' => $this->state['kk'],
                'akta' => $this->state['akta'],
                'birthplace' => $this->state['birthplace'],
                'birthdate' => $this->state['birthdate'],
                'address' => $this->state['address'],
                'rt' => $this->state['rt'],
                'rw' => $this->state['rw'],
                'desa' => $this->state['desa'],
                'kecamatan' => $this->state['kecamatan'],
                'kab' => $this->state['kab'],
                'prov' => $this->state['prov'],
                'kode_pos' => $this->state['kode_pos'],
                'lintang' => $this->state['lintang'],
                'bujur' => $this->state['bujur'],
                'tinggal_id' => $this->state['tinggal_id'],
                'transportasi_id' => $this->state['transportasi_id'],
                'anak_ke' => $this->state['anak_ke'],
                'saudara' => $this->state['saudara'],
                'phone' => $this->state['phone'],
            ]);

        $this->emit('saved');

        if(isset($this->state['user']['name'])) {
            $this->emit('nameUpdated');
        }

        $this->resetErrorBag();

    }

    public function render()
    {
        return view('livewire.student.data-pribadi', [
            'tinggals' => \DB::table('tinggals')->get(),
            'transportasis' => \DB::table('transportasis')->get(),
        ]);
    }
}
