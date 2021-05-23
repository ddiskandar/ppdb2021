<?php

namespace App\Http\Livewire;

use App\Models\Document;
use App\Models\User;
use App\Models\Student;
use App\Models\Ortu;
use App\Models\Periode;
use App\Models\Ppdb;
use App\Models\Payment;

use Livewire\Component;

class PaymentCreate extends Component
{
    public $paymentCreate = false;

    public $search;

    public $payment_amount = 150000;
    public $amount = 150000;
    public $name, $username, $status, $date, $note;

    public $student_id;

    protected $rules = [
        'student_id' => 'required',
        'date' => 'required',
        'payment_amount' => 'required',
        'amount' => 'required',
        'note' => 'nullable',
    ];

    protected $validationAttributes = [
        
    ];

    public function store()
    {
        $this->validate();

        Payment::Create([
            'id' => isset($this->payment) ?? $this->payment->id,
            'student_id' => isset($this->student_id) ? $this->student_id : $this->payment->student_id,
            'verified_by' => auth()->id(),
            'amount' => $this->amount,
            'note' => $this->note,
            'date' => $this->date,
            'status' => true,
        ]);

        $ppdb = Ppdb::where('student_id', $this->student_id)->first();

        if (!empty($ppdb)) {
            $ppdb->update([
                'payment_amount' => $this->payment_amount,
            ]);
        } else {
            Ppdb::create([
                'student_id' => isset($this->student_id) ? $this->student_id : $this->payment->student_id,
                'periode_id' => Periode::where('active', true)->first()->id,
                'payment_amount' => $this->payment_amount,
            ]);
        }

        $this->paymentCreate = false;

        $this->emit('paymentAdded');
    }

    public function create()
    {
        $this->paymentCreate = true;
    }

    public function render()
    {
        return view('livewire.payment-create', [
            'payments' => Payment::select([
                'id', 'student_id', 'attachment', 'amount', 'verified_by', 'date', 'note'
            ])->WhereHas('student.user', function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%');
            })->with(
                'student:id,user_id',
                'student.user:id,name,username',
                'verificator',
                'student.ppdb:id,student_id,payment_amount'
            )->latest()->paginate(5),

            'students' => Student::select(['id', 'user_id'])
                ->with(
                    'user:id,username,name',
                    'payments:id,student_id,status,amount',
                    'ppdb:id,student_id,payment_amount'
                )->get()
                ->sortBy(function ($query) {
                    return $query->user->name;
                }),
        ]);
    }
}
