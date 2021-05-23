<?php

namespace App\Http\Livewire\Student;

use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use Livewire\WithFileUploads;

use App\Models\Document;
use App\Models\Student;

class DokumenKesejahteraan extends Component
{
    use WithFileUploads;

    public $document;

    public $kks;
    public $kip;
    public $kis;
    public $pkh;
    public $no_kks;
    public $no_kip;
    public $no_kis;
    public $no_pkh;

    protected $rules = [
        'kks' => 'nullable|image|max:2048',
        'kip' => 'nullable|image|max:2048',
        'kis' => 'nullable|image|max:2048',
        'pkh' => 'nullable|image|max:2048',
        'no_kks' => 'nullable|string|max:16',
        'no_kip' => 'nullable|string|max:16',
        'no_kis' => 'nullable|string|max:16',
        'no_pkh' => 'nullable|string|max:16',
    ];

    protected $validationAttributes = [
        'kks' => 'Kartu KKS',
        'kip' => 'Kartu KIP',
        'kis' => 'Kartu KIS',
        'pkh' => 'Kartu PKH',
        'no_kks' => 'Nomor KKS',
        'no_kip' => 'Nomor KIP',
        'no_kis' => 'Nomor KIS',
        'no_pkh' => 'Nomor PKH',
    ];

    public function mount(Student $student)
    {
        $student = $student;

        $this->document = Document::where('student_id', $student->id)
            ->with(
                'student:user_id',
                'student.user:id,username,name'
            )->first();

        $this->no_kks = $this->document->no_kks;
        $this->no_kip = $this->document->no_kip;
        $this->no_kis = $this->document->no_kis;
        $this->no_pkh = $this->document->no_pkh;
    }

    public function hydrate()
    {
        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function updatedKks($value)
    {
        $validator = Validator::make(
            ['kks' => $this->kks],
            ['kks' => $this->rules['kks']],
        );

        if ($validator->fails()) {
            $this->reset('kks');
            $this->setErrorBag($validator->getMessageBag());
        }
    }

    public function updatedKis($value)
    {
        $validator = Validator::make(
            ['kis' => $this->kis],
            ['kis' => $this->rules['kis']],
        );

        if ($validator->fails()) {
            $this->reset('kis');
            $this->setErrorBag($validator->getMessageBag());
        }
    }

    public function updatedKip($value)
    {
        $validator = Validator::make(
            ['kip' => $this->kip],
            ['kip' => $this->rules['kip']],
        );

        if ($validator->fails()) {
            $this->reset('kip');
            $this->setErrorBag($validator->getMessageBag());
        }
    }

    public function updatedPkh($value)
    {
        $validator = Validator::make(
            ['pkh' => $this->pkh],
            ['pkh' => $this->rules['pkh']],
        );

        if ($validator->fails()) {
            $this->reset('pkh');
            $this->setErrorBag($validator->getMessageBag());
        }
    }

    public function submit()
    {
        $this->validate();


        $fileName = $this->document->student->user->username
            . '.';

        $this->document->update([
            'kks' => $this->kks
                ? $this->kks
                ->storeAs(
                    'kks',
                    $fileName . $this->kks->extension(),
                    'public'
                )
                : $this->document->kks ?? null,

            'kip' => $this->kip
                ? $this->kip
                ->storeAs(
                    'kip',
                    $fileName . $this->kip->extension(),
                    'public'
                )
                : $this->document->kip ?? null,

            'kis' => $this->kis
                ? $this->kis
                ->storeAs(
                    'kis',
                    $fileName . $this->kis->extension(),
                    'public'
                )
                : $this->document->kis ?? null,

            'pkh' => $this->pkh
                ? $this->pkh
                ->storeAs(
                    'pkh',
                    $fileName . $this->pkh->extension(),
                    'public'
                )
                : $this->document->pkh ?? null,

            'no_kks' => $this->no_kks,
            'no_kip' => $this->no_kip,
            'no_kis' => $this->no_kis,
            'no_pkh' => $this->no_pkh,
        ]);

        $this->emit('saved');

        $this->reset('kks', 'kip', 'kis', 'pkh');
    }

    public function render()
    {
        return view('livewire.student.dokumen-kesejahteraan');
    }
}
