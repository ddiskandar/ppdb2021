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

    public function print(Student $student)
    {
        abort_if($student->user_id != auth()->id(), 404);

        $pdf = PDF::loadView('pdf.biodata', [
            'student' => $student,
        ]);
        return $pdf->stream($student->user->username . '.pdf');
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
        abort_if( $student->user_id != auth()->id(), 404 );

        return view('pages.student', [
            'student' => $student,
        ]);
    }

    public function edit(Student $student)
    {
        return view('pages.student', [
            'student' => $student,
        ]);
    }

    public function interview(Student $student)
    {
        return view('student.interview', [
            'student' => $student,
        ]);
    }

    public function btq(Student $student)
    {
        return view('student.btq', [
            'student' => $student,
        ]);
    }

    public function tpa(Student $student)
    {
        return view('student.tpa', [
            'student' => $student,
        ]);
    }

    public function pleno(Student $student)
    {
        return view('student.pleno', [
            'student' => $student,
        ]);
    }

}
