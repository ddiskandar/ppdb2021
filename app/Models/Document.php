<?php

namespace App\Models;

use App\Models\Student;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

    protected $guarded = []; 
    
    public function student()
    {  
        return $this->belongsTo(Student::class);
    }
}
