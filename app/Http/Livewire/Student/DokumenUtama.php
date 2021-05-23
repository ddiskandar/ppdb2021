<?php

namespace App\Http\Livewire\Student;

use Livewire\Component;
use Livewire\WithFileUploads;

use Illuminate\Support\Facades\Validator;

use App\Models\Document;
use App\Models\Student;
use App\Models\User;

class DokumenUtama extends Component
{
    use WithFileUploads;

    public $document;

    public $kartu_keluarga;
    public $akta;
    public $skl;
    public $ijazah;
    public $nomor_ijazah;

    protected $rules = [
        'kartu_keluarga' => 'nullable|image|max:2048',
        'akta' => 'nullable|image|max:2048',
        'skl' => 'nullable|image|max:2048',
        'ijazah' => 'nullable|image|max:2048',
        'nomor_ijazah' => 'nullable|string|max:16',
    ];

    protected $validationAttributes = [
        'kartu_keluarga' => 'Kartu keluarga',
        'akta' => 'Akta kelahiran',
        'skl' => 'Surat Keterangan',
        'ijazah' => 'Ijazah',
        'nomor_ijazah' => 'Ijazah',
        
    ];

    public function mount(Student $student)
    {
        $student = $student;

        $this->document = Document::where('student_id', $student->id)
            ->with(
                'student:user_id',
                'student.user:id,username,name'
            )->first();

        $this->nomor_ijazah = $this->document->nomor_ijazah;

    }

    public function updatedKartuKeluarga($value)
    {
        $validator = Validator::make(
            ['kartu_keluarga' => $this->kartu_keluarga],
            ['kartu_keluarga' => $this->rules['kartu_keluarga']],
        );

        if ($validator->fails()) {
            $this->reset('kartu_keluarga');
            $this->setErrorBag($validator->getMessageBag());
        }
    }

    public function updatedSkl($value)
    {
        $validator = Validator::make(
            ['skl' => $this->skl],
            ['skl' => $this->rules['skl']],
        );

        if ($validator->fails()) {
            $this->reset('skl');
            $this->setErrorBag($validator->getMessageBag());
        }
    }

    public function updatedIjazah($value)
    {
        $validator = Validator::make(
            ['ijazah' => $this->ijazah],
            ['ijazah' => $this->rules['ijazah']],
        );

        if ($validator->fails()) {
            $this->reset('ijazah');
            $this->setErrorBag($validator->getMessageBag());
        }
    }

    public function hydrate()
    {
        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function submit()
    {
        $this->validate();


        $fileName = $this->document->student->user->username
            . '.';

        $this->document->update([
            'kartu_keluarga' => $this->kartu_keluarga
                ? $this->kartu_keluarga
                ->storeAs(
                    'kartu_keluarga',
                    $fileName . $this->kartu_keluarga->extension(),
                    'public'
                )
                : $this->document->kartu_keluarga ?? null,

            'akta' => $this->akta
                ? $this->akta
                ->storeAs(
                    'akta',
                    $fileName . $this->akta->extension(),
                    'public'
                )
                : $this->document->akta ?? null,

            'skl' => $this->skl
                ? $this->skl
                ->storeAs(
                    'skl',
                    $fileName . $this->skl->extension(),
                    'public'
                )
                : $this->document->skl ?? null,

            'ijazah' => $this->ijazah
                ? $this->ijazah
                ->storeAs(
                    'ijazah',
                    $fileName . $this->ijazah->extension(),
                    'public'
                )
                : $this->document->ijazah ?? null,

            'nomor_ijazah' => $this->nomor_ijazah,
        ]);

        $this->emit('saved');
        
        $this->reset('kartu_keluarga', 'akta', 'skl', 'ijazah' );
    }

    public function render()
    {
        return view('livewire.student.dokumen-utama');
    }
}
