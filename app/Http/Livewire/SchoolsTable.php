<?php

namespace App\Http\Livewire;

use App\Models\School;
use Livewire\Component;
use Livewire\WithPagination;

class SchoolsTable extends Component
{
    use WithPagination;

    public $search;
    public $perPage = 7;

    public $schoolId;
    public $name;
    public $npsn;
    public $address;
    public $last_students = 0;

    protected $rules = [
        'name' => 'required|string|max:52',
        'npsn' => 'required|string|max:52',
        'address' => 'required|string|max:52',
        'last_students' => 'nullable|numeric|max:52',
    ];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingPerPage()
    {
        $this->resetPage();
    }

    public function edit($id)
    {
        $school = School::find($id);
        $this->schoolId = $school->id;
        $this->name = $school->name;
        $this->npsn = $school->npsn;
        $this->address = $school->address;
        $this->last_students = $school->last_students;
    }

    public function submitForm()
    {
        $this->validate();

        School::UpdateOrCreate(
            [
                'id' => $this->schoolId,
            ],
            [
                'npsn' => $this->npsn,
                'name' => $this->name,
                'address' => $this->address,
                'last_students' => $this->last_students,
            ]
        );
        $this->resetForm();
    }

    public function resetForm()
    {
        $this->name = '';
        $this->npsn = '';
        $this->address = '';
        $this->last_students = '';
    }

    public function render()
    {
        return view('livewire.schools-table', [
            'schools' => School::where('name', 'like', '%' . $this->search . '%')
                ->paginate($this->perPage)
        ]);
    }
}
