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

    public $panelPaymentDetail = false;

    public $paymentDetail;

    public $filterStatus;

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

    protected $listeners = [
        'paymentAdded',
    ];

    public function paymentAdded()
    {
        session()->flash('flash.banner', 'Yay, Pembayaran berhasil ditambah!');
        return $this->redirect(route('pembayaran'));
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function showPaymentDetail(Payment $payment)
    {
        $this->payment = $payment;
        $this->panelPaymentDetail = true;
        $this->paymentDetail = $payment;
        $this->date = $this->paymentDetail->date;
        $this->amount = $this->paymentDetail->amount;
        $this->note = $this->paymentDetail->note;
    }

    public function update()
    {
        Payment::where('id', $this->payment->id)
            ->update([
                'verified_by' => auth()->id(),
                'amount' => $this->amount,
                'note' => $this->note,
                'date' => $this->date,
                'status' => true,
            ]);
        
        $this->emit('saved');
    }

    public function render()
    {
        return view('livewire.payments-table', [
            'payments' => Payment::select([
                'id', 'student_id', 'attachment', 'amount', 'verified_by', 'date', 'note'
            ])->whereHas('student.user', function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%')
                    ->orWhere('username', 'like', '%' . $this->search . '%');
            })->with(
                'student:id,user_id',
                'student.user:id,name,username',
                'verificator',
                'student.ppdb:id,student_id,payment_amount'
            )->latest()->paginate($this->perPage),

            'students' => Student::query()
                ->select(['id', 'user_id'])
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
