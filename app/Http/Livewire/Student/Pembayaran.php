<?php

namespace App\Http\Livewire\Student;

use App\Models\Payment;
use App\Models\Student;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Validator;

class Pembayaran extends Component
{
    use WithFileUploads;

    public $student;

    public $payment;

    public $amount = 200000;
    public $date;
    public $attachment;

    protected $rules = [
        'amount' => 'required|numeric|max:150021',
        'date' => 'required',
        'attachment' => 'required|image|max:1024',
    ];

    protected $listeners = [
        'saved' => '$refresh',
    ];

    public function mount(Student $student)
    {
        $this->student = $student;
        $this->payment = Payment::where('student_id', $this->student->id)->first();
    }

    public function updatedAttachment($value)
    {
        $validator = Validator::make(
            ['attachment' => $this->attachment],
            ['attachment' => $this->rules['attachment']],
        );

        if ($validator->fails()) {
            $this->reset('attachment');
            $this->setErrorBag($validator->getMessageBag());
        }
    }

    public function hydrate()
    {
        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function save()
    {
        $this->validate();

        Payment::where('student_id', $this->student->id)
            ->create([
                'student_id' => $this->student->id,
                'amount' => $this->amount,
                'date' => $this->date,
                'attachment' => $this->attachment->store('pembayaran', 'public'),
            ]);

        $this->reset('amount', 'date', 'attachment');

        $this->payment = Payment::where('student_id', $this->student->id)->first();

    }

    public function render()
    {
        return view('livewire.student.pembayaran');
    }
}
