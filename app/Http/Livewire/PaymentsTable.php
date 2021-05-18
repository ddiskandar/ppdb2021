<?php

namespace App\Http\Livewire;

use App\Models\Ppdb;
use App\Models\Student;

use Livewire\Component;
use Livewire\WithPagination;

class PaymentsTable extends Component
{
    use WithPagination;

    public $search = '';

    public $perPage = 4;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $students = Student::select([
            'id', 'user_id', 'school_id', 'school_temp', 'address', 'kecamatan', 'kab',
        ])->whereHas('user', function ($query) {
            $query->where('name', 'like', '%' . $this->search . '%');
        })->orderByDesc('created_at')
        ->with(
            'user:id,name,username',
            'ppdb:student_id,periode_id,pilihan_kelas,join_wa'
        )
        ->paginate($this->perPage);

        return view('livewire.payments-table', [
            'students' => $students,
        ]);
    }
}
