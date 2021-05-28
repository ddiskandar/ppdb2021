<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Ortu;

class Pekerjaan extends Model
{
    use HasFactory;

    public function pekerjaan_ayah()
    {
        return $this->hasMany(Ortu::class, 'ayah_pekerjaan');
    }

    public function pekerjaan_ibu()
    {
        return $this->hasMany(Ortu::class, 'ibu_pekerjaan');
    }

    public function pekerjaan_wali()
    {
        return $this->hasMany(Ortu::class, 'wali_pekerjaan');
    }

}
