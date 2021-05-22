<?php

namespace App\Http\Livewire\Student;

use Livewire\Component;
use Livewire\WithFileUploads;

use App\Models\Document;
use App\Models\Student;

class Berkas extends Component
{
    use WithFileUploads;

    public $successMessage;
    public $successMessageKesejahteraan;

    public $document;

    public $akta;
    public $kartu_keluarga;
    public $skl;
    public $ijazah;

    public $kks;
    public $kip;
    public $kis;
    public $pkh;

    protected $rules = [

        'document.nomor_ijazah' => '',

        'document.no_kks' => '',
        'document.no_kip' => '',
        'document.no_kis' => '',
        'document.no_pkh' => '',

    ];

    public function updatedAkta()
    {
        $this->validate([
            'akta' => 'image|max:4024',
        ]);
    }
    public function updatedKartuKeluarga()
    {
        $this->validate([
            'kartu_keluarga' => 'image|max:4024',
        ]);
    }
    public function updatedSkl()
    {
        $this->validate([
            'skl' => 'image|max:4024',
        ]);
    }
    public function updatedIjazah()
    {
        $this->validate([
            'ijazah' => 'image|max:4024',
        ]);
    }
    public function updatedKks()
    {
        $this->validate([
            'kks' => 'image|max:4024',
        ]);
    }
    public function updatedKip()
    {
        $this->validate([
            'kip' => 'image|max:4024',
        ]);
    }
    public function updatedKis()
    {
        $this->validate([
            'kis' => 'image|max:4024',
        ]);
    }
    public function updatedPkh()
    {
        $this->validate([
            'pkh' => 'image|max:4024',
        ]);
    }

    public function mount()
    {
        $student = Student::where('user_id', auth()->id())->first(['id']);

        $this->document = Document::where('student_id', $student->id)
            ->with(
                'student:user_id',
                'student.user:id,username,name'
            )->first();
    }

    public function submitBerkas()
    {
        $fileName = $this->document->student->user->username
            . '-' .
            $this->document->student->user->name
            . '.';

        $this->document->update([
            'akta' => $this->akta
                ? $this->akta
                ->storeAs(
                    'akta',
                    $fileName . $this->akta->extension(),
                    'public'
                )
                : $this->document->akta ?? null,

            'kartu_keluarga' => $this->kartu_keluarga
                ? $this->kartu_keluarga
                ->storeAs(
                    'kartu_keluarga',
                    $fileName . $this->kartu_keluarga->extension(),
                    'public'
                )
                : $this->document->kartu_keluarga ?? null,

            'skl' => $this->skl
                ? $this->skl
                ->storeAs(
                    'skl',
                    $fileName . $this->skl->extension(),
                    'public'
                )
                : $this->document->skl ?? null,

            'nomor_ijazah' => $this->document->nomor_ijazah,

            'ijazah' => $this->ijazah
                ? $this->ijazah
                ->storeAs(
                    'ijazah',
                    $fileName . $this->ijazah->extension(),
                    'public'
                )
                : $this->document->ijazah ?? null,

        ]);

        $this->successMessage = 'Berkas berhasil diunggah!';

        $this->akta = null;
        $this->kartu_keluarga = null;
        $this->skl = null;
        $this->ijazah = null;
    }

    public function submitKesejahteraan()
    {
        $fileName = $this->document->student->user->username
            . '-' .
            $this->document->student->user->name
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

        ]);


        $this->successMessageKesejahteraan = 'Berkas Kartu Kesejahteraan berhasil diunggah!';
    }
    
    public function render()
    {
        return view('livewire.student.berkas');
    }
}
