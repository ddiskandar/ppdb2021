<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Ortu;

class Penghasilan extends Model
{
    use HasFactory;

    public function penghasilan_ayah()
    {
        return $this->hasMany(Ortu::class, 'ayah_penghasilan');
    }

    public function penghasilan_ibu()
    {
        return $this->hasMany(Ortu::class, 'ibu_penghasilan');
    }

    public function penghasilan_wali()
    {
        return $this->hasMany(Ortu::class, 'wali_penghasilan');
    }

}
