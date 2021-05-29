<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Student;
use App\Models\Ppdb;

class Jurusan extends Model
{
    use HasFactory;
    
    public function students()
    {
        return $this->hasManyThrough(
            Student::class, 
            Ppdb::class, 
            'pilihan_lulus',
            'id'
            );
    }

    public function ppdb()
    {  
        return $this->hasOne(Ppdb::class);
    }
}
