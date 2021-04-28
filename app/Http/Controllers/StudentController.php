<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Exports\StudentsExport;
use Maatwebsite\Excel\Facades\Excel;

use PDF;

class StudentController extends Controller
{
    public function export()
    {
        return Excel::download(new StudentsExport, 'ppdb2021 - pendaftar.xlsx');
    }

    public function pdf(Student $student)
    {
        $pdf = PDF::loadView('pdf.biodata', [
            'student' => $student,
        ]);
        return $pdf->stream($student->user->username . '.pdf');
    }

    public function show(Student $student)
    {
        return view('student.show', [
            'student' => $student,
        ]);
    }
}
