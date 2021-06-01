<?php

namespace App\Http\Livewire;

use App\Models\Ppdb;
use App\Models\Student;

use Livewire\Component;
use Livewire\WithPagination;

class SeleksiTable extends Component
{
    use WithPagination;

    public $panelStudentDetail = false;

    public $studentDetail;

    public $search = '';
    public $sortField = 'id';
    public $sortAsc = false;

    public $perPage = 4;
    public $filterKelas = '';
    public $filterSchool = '';
    public $filterLulus = '';

    public $join_wa;

    protected $queryString = [
        'search' => ['except' => ''],
        'page' => ['except' => 1],
        'filterKelas' => ['except' => ''],
        'filterSchool' => ['except' => ''],
        'filterLulus' => ['except' => ''],
        'sortField' => ['except' => 'id'],
        'sortAsc' => ['except' => false],
        'perPage' => ['except' => 4],
    ]; 

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortAsc = ! $this->sortAsc;
        } else {
            $this->sortAsc = false;
        }

        $this->sortField = $field;
    }

    public function updatingPerPage()
    {
        $this->resetPage();
    }
    public function updatingSearch()
    {
        $this->resetPage();
    }
    public function updatingFilterSchool()
    {
        $this->resetPage();
    }
    public function updatingFilterLulus()
    {
        $this->resetPage();
    }
    public function updatingFilterKelas()
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
            'id', 'user_id', 'school_id', 'school_temp', 'address', 'kecamatan', 'kab', 'baca_quran', 'tulis_quran', 'bacaan_shalat', 'gambar', 'tpa'
        ])->whereHas('user', function ($query) {
            $query->where('name', 'like', '%' . $this->search . '%')
                ->orWhere('username', 'like', '%' . $this->search . '%');
        })->whereHas('school', function ($query) {
            $query->where('name', 'like', '%' . $this->filterSchool . '%');
        })->whereHas('ppdb', function ($query) {
            $query->where('pilihan_kelas', 'like', '%' . $this->filterKelas . '%');
        })->whereHas('ppdb', function ($query) {
            $query->where('pilihan_lulus', 'like', '%' . $this->filterLulus);
        })->with(
            'school:id,name',
            'user:id,name,username',
            'ppdb:student_id,periode_id,pilihan_kelas,pilihan_satu,pilihan_dua,pilihan_lulus,join_wa,interview_by'
        )
        ->orderBy($this->sortField, $this->sortAsc ? 'ASC' : 'DESC')
        ->paginate($this->perPage);

        return view('livewire.seleksi-table', [
            'students' => $students,

            'schools' => \DB::table('schools')->select(['id', 'name'])->orderByDesc('last_students')->get(),

        ]);
    }

}
