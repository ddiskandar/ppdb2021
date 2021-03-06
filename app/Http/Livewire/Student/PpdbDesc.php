<?php

namespace App\Http\Livewire\Student;

use App\Models\Ppdb;
use App\Models\Student;
use Livewire\Component;

class PpdbDesc extends Component
{
    public $ppdb;

    public $state = [];

    protected $rules = [
        'state.motivasi_smk' => 'nullable|string|max:512',
        'state.motivasi_jurusan' => 'nullable|string|max:512',
        'state.tool_id' => 'required',
        'state.info_id' => 'required',
    ];

    protected $validationAttributes = [

    ];

    public function mount(Student $student)
    {
        $ppdb = Ppdb::whereStudentId($student->id)->first();

        $this->ppdb = $ppdb;

        $this->state = $ppdb->toArray();
    }

    public function update()
    {
        $this->validate();

        $this->ppdb->update([
            'motivasi_smk' => $this->state['motivasi_smk'],
            'motivasi_jurusan' => $this->state['motivasi_jurusan'],
            'tool_id' => $this->state['tool_id'],
            'info_id' => $this->state['info_id'],
            'interview_by' => auth()->id(),
        ]);

        $this->emit('saved');
    }

    public function render()
    {
        return view('livewire.student.ppdb-desc', [
            'tools' => \DB::table('tools')->get(),
            'infos' => \DB::table('infos')->get(),
        ]);
    }
}
