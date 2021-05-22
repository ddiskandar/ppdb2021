<?php

namespace App\Http\Livewire\Student;

use App\Models\Payment;
use App\Models\Student;

use Livewire\Component;
use Livewire\WithFileUploads;

class Pembayaran extends Component
{
    use WithFileUploads;

    public $successMessage;

    public $amount = 150000;
    public $date;
    public $attachment;

    protected $rules = [
        'amount' => 'required',
        'date' => 'required',
        'attachment' => 'required',
    ];

    public function submitKonfirmasi()
    {
        $this->validate();

        $student = Student::where('user_id', auth()->id())->first(['id']);

        Payment::where('student_id', $student->id)
            ->create([
                'student_id' => $student->id,
                'amount' => $this->amount,
                'date' => $this->date,
                'attachment' => $this->attachment->store('pembayaran', 'public'),
            ]);

        $this->resetForm();

        $this->successMessage = 'Konfirmasi pembayaran berhasil diunggah!';
    }

    public function resetForm()
    {
        $this->amount = '';
        $this->date = '';
        $this->attachment = '';
    }

    public function render()
    {
        return view('livewire.student.pembayaran');
    }
}
