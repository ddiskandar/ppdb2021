<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\Document;
use App\Models\Ortu;
use App\Models\Ppdb;
use App\Models\Student;
use App\Models\Periode;
use App\Models\School;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

use Livewire\Component;

class RegistrationForm extends Component
{
    public $hasRegisteredMessage = '';

    public $state = [];

    protected $rules = [
        'state.pilihan_kelas' => 'required|in:0,1',
        'state.name' => 'required|string|max:124',
        'state.jk' => 'required|string|in:L,P',
        'state.nisn' => 'nullable|string|max:10|min:10',
        'state.phone' => 'required|string|max:13',
        'state.school_id' => 'required',
        'state.ibu_nama' => 'required|string|max:124',
        'state.password' => 'required|string|confirmed|min:6',
    ];

    protected $validationAttributes = [
        'state.pilihan_kelas' => 'Pilihan kelas',
        'state.name' => 'Nama lengkap',
        'state.jk' => 'Jenis Kelamin',
        'state.nisn' => 'NISN',
        'state.phone' => 'Nomor HP/WA',
        'state.school_id' => 'Asal sekolah',
        'state.ibu_nama' => 'Nama ibu kandung',
        'state.password' => 'Kata sandi',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function submit()
    {
        $this->validate();

        DB::transaction(function () {

            $user = User::factory()->create([
                'name' => $this->state['name'],
                'password' => Hash::make($this->state['password']),
            ]);

            $user['username'] = $user->username;

            $student = Student::create([
                'user_id' => $user->id,
                'school_id' => $this->state['school_id'],
                'jk' => $this->state['jk'],
                'nisn' => $this->state['nisn'] ?? NULL,
                'phone' => $this->state['phone'],
            ]);

            $periode = Periode::where('active', true)->first();

            $this->state['student_id'] = $student->id;
            $this->state['periode_id'] = $periode->id;
            $this->ref_payment_amount = $periode->ref_payment_amount;

            Ppdb::create([
                'student_id' => $student->id,
                'periode_id' => $periode->id,
                'pilihan_kelas' => $this->state['pilihan_kelas'],
                'payment_amount' => $periode->ref_payment_amount,
            ]);

            Ortu::create([
                'student_id' => $student->id,
                'ibu_nama' => $this->state['ibu_nama'],
            ]);

            Document::create([
                'student_id' => $student->id,
            ]);

            $user->assignRole('student');

            Auth::login($user);

            $this->state = [];

            return redirect()->route('home');
        });
    }

    public function render()
    {
        return view('livewire.registration-form', [
            'schools' => School::get(),
        ]);
    }
}
