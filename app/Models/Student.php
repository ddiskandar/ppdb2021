<?php

namespace App\Models;

use App\Models\User;
use App\Models\Document;
use App\Models\Jurusan;
use App\Models\Payment;
use App\Models\Ppdb;
use App\Models\School;
use App\Models\Agama;
use App\Models\Pip;
use App\Models\Tinggal;
use App\Models\Transportasi;
use App\Models\Ortu;
use App\Models\Hobby;
use App\Models\Ideals;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function school()
    {
        return $this->belongsTo(School::class);
    }

    public function hobby()
    {
        return $this->belongsTo(Hobby::class);
    }

    public function ideals()
    {
        return $this->belongsTo(Ideals::class);
    }

    public function ppdb()
    {
        return $this->hasOne(Ppdb::class);
    }

    public function ortu()
    {
        return $this->hasOne(Ortu::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    public function document()
    {
        return $this->hasOne(Document::class);
    }

    public function agama()
    {
        return $this->belongsTo(Agama::class);
    }

    public function pip()
    {
        return $this->belongsTo(Pip::class);
    }

    public function tinggal()
    {
        return $this->belongsTo(Tinggal::class);
    }

    public function transportasi()
    {
        return $this->belongsTo(Transportasi::class);
    }

    public function getTempatTanggalLahirAttribute()
    {
        return $this->birthdate 
            ? $this->birthplace . ', ' . format_tanggal_indo($this->birthdate) 
            : '-';
    }

    public function getFullAddressAttribute()
    {
        return $this->address 
            ? $this->address . ' Rt. ' . $this->rt . '/' . $this->rw . ' Ds. ' . $this->desa . ' Kec. ' . $this->kecamatan . ' ' . $this->kab . ' ' . $this->prov 
            : '-';
    }

    public function getShortAddressAttribute()
    {
        return $this->address ? $this->address . ', ' . $this->kecamatan . ', ' . $this->kab : '-';
    }

    public function getAsalSekolahAttribute()
    {
        return $this->school_id !== 1
            ? $this->school->name
            : $this->school_temp;
    }

    public function getAlurCompletedAttribute()
    {
        return 
        
        // sudah memilih jurusan
        $this->ppdb->pilihan_satu

        // sudah gabung grup wa
        && $this->ppdb->join_wa

        // biodata pribadi sudah lengkap
        && $this->data_completed

        // pembayaran sudah lunas
        && $this->payment_completed

        // upload dokumen sudah cukup
        && $this->document_completed;
    }

    public function getDocumentCompletedAttribute()
    {
        return isset($this->document->kartu_keluarga);
    }

    public function getDataCompletedAttribute()
    {
        return isset(
            $this->panggilan,
            $this->jk,
            $this->nisn,
            $this->nik,
            $this->kk,
            $this->birthplace,
            $this->birthdate,
            $this->akta,
            $this->address,
            $this->rt,
            $this->rw,
            $this->desa,
            $this->kecamatan,
            $this->kab,
            $this->prov,
            $this->phone,
        );
    }

    public function getPaidAmountAttribute()
    {
        return $this->payments
            ->where('status', true)
            ->sum('amount');
    }

    public function getPaymentCompletedAttribute()
    {
        return $this->paid_amount >= ( ! empty($this->ppdb )
            ? $this->ppdb->payment_amount
            : Periode::whereActive(true)->first()->ref_payment_amount 
        );
    }

}
