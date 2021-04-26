<?php

namespace App\Models;

use App\Models\Student;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $guarded = [];

    public function students()
    {
        return $this->hasMany(Student::class);
    }

    public function grow()
    {
        if ($this->students()->count() > $this->last_students) {
            return 'increase';
        } elseif ($this->students()->count() == $this->last_students) {
            return 'same';
        } else {
            return 'decrease';
        }
    }
}
