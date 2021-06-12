<?php

namespace App\Models;

use App\Models\Student;
use App\Models\Jurusan;
use App\Models\Tool;
use App\Models\Info;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ppdb extends Model
{
    use HasFactory;

    protected $table = 'ppdb';
    protected $guarded = [];

    protected $casts = [
        'join_wa' => 'boolean',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class);
    }

    public function pilihan_satu()
    {
        return $this->hasOne(Jurusan::class, 'pilihan_satu');
    }

    public function pilihan_dua()
    {
        return $this->hasOne(Jurusan::class, 'pilihan_dua');
    }

    public function pilihan_lulus()
    {
        return $this->hasOne(Jurusan::class, 'pilihan_lulus');
    }

    public function interviewer()
    {
        return $this->belongsTo(User::class, 'interview_by')->select(['name']);
    }

    public function tool()
    {
        return $this->belongsTo(Tool::class, 'tool_id');
    }

}
