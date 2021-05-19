<?php

namespace App\Http\Livewire;

use App\Models\Payment;
use App\Models\Ppdb;
use App\Models\Periode;
use App\Models\Student;
use Livewire\Component;

use Livewire\WithPagination;

class PaymentsTable extends Component
{
    use WithPagination;
    public $perPage = 4;

    public $verifyMode = false;

    public $search = '';
    public $payment;

    public $payment_amount = 150000;
    public $amount = 150000;
    public $name, $username, $status, $date, $note;

    public $student_id;

    protected $rules = [
        'payment.payment_amount' => 'required',
        'payment.amount' => 'required',
    ];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function newPayment()
    {
        $this->reset();
        $this->verifyMode = false;
    }

    public function getVerified($id)
    {
        $this->verifyMode = true;

        $this->payment = Payment::where('id', $id)
            ->with('student', 'student.school', 'student.ppdb')
            ->first();

        $this->name = $this->payment->student->user->name;
        $this->username = $this->payment->student->user->username;
        $this->amount = $this->payment->amount;
        $this->payment_amount = $this->payment->student->ppdb->payment_amount;
        $this->date = $this->payment->date;
        $this->note = $this->payment->note;
    }

    public function updatePayment()
    {
        Payment::where('id', $this->payment->id)
            ->update([
                'verified_by' => auth()->id(),
                'amount' => $this->amount,
                'note' => $this->note,
                'date' => $this->date,
                'status' => true,
            ]);
    }

    public function addPayment()
    {
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

        $this->reset();
    }

    public function render()
    {
        return view('livewire.payments-table', [
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
