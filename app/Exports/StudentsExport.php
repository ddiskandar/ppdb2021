<?php

namespace App\Exports;

use App\Models\Student;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class StudentsExport implements FromView, ShouldAutoSize
{
    public function view(): View
    {
        return view('exports.students', [
            'students' => Student::with('user', 'ortu')->get()->sortBy(function ($query) {
                return $query->user->name;
            })
        ]);
    }
}
