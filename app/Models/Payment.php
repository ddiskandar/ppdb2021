<?php

namespace App\Models;

use App\Models\Student;
use App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function verificator()
    {
        return $this->belongsTo(User::class, 'verified_by');
    }

    public function scopeApproved($query)
    {
        return $query->where('status', true);
    }

}
