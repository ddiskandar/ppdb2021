<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Ortu;

class Pendidikan extends Model
{
    use HasFactory;

    public function pendidikan_ayah()
    {
        return $this->hasMany(Ortu::class, 'ayah_pendidikan');
    }

    public function pendidikan_ibu()
    {
        return $this->hasMany(Ortu::class, 'ibu_pendidikan');
    }

    public function pendidikan_wali()
    {
        return $this->hasMany(Ortu::class, 'wali_pendidikan');
    }
    
}
