<?php

namespace App\Http\Livewire;

use App\Models\Ppdb;
use App\Models\Student;
use App\Models\User;

use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use Livewire\WithPagination;

class PendaftarTable extends Component
{
    use WithPagination;

    public $panelStudentDetail = false;

    public $confirmingResetPassword = false;

    public $studentDetail;

    public $studentResetPassword;

    public $search = '';

    public $perPage = 4;
    public $filterKelas;
    public $filterSchool;
    public $filterGabung;

    public $join_wa;

    protected $listeners = [
        'studentAdded',
    ];

    public function confirmResetPassword($id)
    {
        $this->resetErrorBag();
        $this->studentResetPassword = User::where('id', $id)->first();

        $this->dispatchBrowserEvent('confirming-reset-password');

        $this->confirmingResetPassword = true;
    }

    public function resetPassword()
    {
        User::where('id', $this->studentResetPassword->id)
            ->update([
                'password' => Hash::make('12345678'),
            ]);

        $this->confirmingResetPassword = false;

        $this->emit('reseted');
    }

    public function studentAdded()
    {
        session()->flash('flash.banner', 'Yay, Pendaftar berhasil ditambah!');
        return $this->redirect(route('pendaftaran'));
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }
    public function updatingFilterSchool()
    {
        $this->resetPage();
    }
    public function updatingPerPage()
    {
        $this->resetPage();
    }

    public function updatedJoinWA()
    {
        $ppdb = Ppdb::where('student_id', $this->studentDetail->id)->first();
        $ppdb->update([
            'join_wa' => $this->join_wa,
        ]);
    }

    public function showStudentDetail(Student $student)
    {
        $this->reset(['join_wa']);
        $this->panelStudentDetail = true;
        $this->studentDetail = $student;
        $this->join_wa = $student->ppdb->join_wa;
    }

    public function render()
    {
        $students = Student::select([
            'id', 'user_id', 'school_id', 'school_temp', 'address', 'kecamatan', 'kab',
        ])->whereHas('user', function ($query) {
            $query->where('name', 'like', '%' . $this->search . '%');
        })->whereHas('school', function ($query) {
            $query->where('name', 'like', '%' . $this->filterSchool . '%');
        })->whereHas('ppdb', function ($query) {
            $query->where('pilihan_kelas', 'like', '%' . $this->filterKelas . '%');
        })->whereHas('ppdb', function ($query) {
            $query->where('join_wa', 'like', '%' . $this->filterGabung);
        })->orderByDesc('created_at')
            ->with(
                'school:id,name',
                'user:id,name,username',
                'ppdb:student_id,periode_id,pilihan_kelas,join_wa'
            )
            ->paginate($this->perPage);

        return view('livewire.pendaftar-table', [
            'students' => $students,

            'schools' => \DB::table('schools')->select(['id', 'name'])->orderByDesc('last_students')->get(),

        ]);
    }
}
