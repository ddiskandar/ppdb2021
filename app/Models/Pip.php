<?php

namespace App\Models;

use App\Models\Student;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pip extends Model
{
    use HasFactory;

    public function students()
    {
        return $this->hasMany(Student::class);
    }
}
