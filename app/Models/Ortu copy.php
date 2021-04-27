<?php

namespace App\Models;

use App\Models\Student;
use App\Models\Pekerjaan;
use App\Models\Pendidikan;
use App\Models\Penghasilan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ortu extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function penghasilan_ayah()
    {
        return $this->belongsTo(Penghasilan::class, 'ayah_penghasilan');
    }

    public function pekerjaan_ayah()
    {
        return $this->belongsTo(Pekerjaan::class, 'ayah_pekerjaan');
    }

    public function pendidikan_ayah()
    {
        return $this->belongsTo(Pendidikan::class, 'ayah_pendidikan');
    }

    public function penghasilan_ibu()
    {
        return $this->belongsTo(Penghasilan::class, 'ibu_penghasilan');
    }

    public function pekerjaan_ibu()
    {
        return $this->belongsTo(Pekerjaan::class, 'ibu_pekerjaan');
    }

    public function pendidikan_ibu()
    {
        return $this->belongsTo(Pendidikan::class, 'ibu_pendidikan');
    }

    public function penghasilan_wali()
    {
        return $this->belongsTo(Penghasilan::class, 'wali_penghasilan');
    }

    public function pekerjaan_wali()
    {
        return $this->belongsTo(Pekerjaan::class, 'wali_pekerjaan');
    }

    public function pendidikan_wali()
    {
        return $this->belongsTo(Pendidikan::class, 'wali_pendidikan');
    }

}
