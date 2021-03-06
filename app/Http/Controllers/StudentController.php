<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Exports\StudentsExport;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

use PDF;

class StudentController extends Controller
{
    public function export()
    {
        return Excel::download(new StudentsExport, 'ppdb2022 - pendaftar.csv');
    }

    public function card(Student $student)
    {
        if (auth()->user()->cannot('process card')) {
            abort_if($student->user_id != auth()->id(), 403);
        }

        $img = \Image::make('images/bg-kartu.jpg')->encode('jpg');

        $img->text(strtoupper($student->user->name), 30, 190, function ($font) {
            $font->file(public_path('/fonts/Roboto/Roboto-Black.ttf'));
            $font->size(20);
        });

        $img->text($student->asal_sekolah ?? '-', 30, 265, function ($font) {
            $font->file(public_path('/fonts/Roboto/Roboto-Black.ttf'));
            $font->size(20);
        });

        $img->text($student->user->username, 30, 340, function ($font) {
            $font->file(public_path('/fonts/Roboto/Roboto-Black.ttf'));
            $font->size(20);
        });

        $name = 'images/card_temp/'
        . 'ppdb2022-alfarhan-'
        . $student->user->username
            . '-'
            . $student->user->name
            . '.jpg';

        $img->save($name);

        return response()->download($name)->deleteFileAfterSend();
    }

    public function print(Student $student)
    {
        if (auth()->user()->cannot('print student')) {
            abort_if($student->user_id != auth()->id(), 404);
        }

        $pdf = PDF::loadView('pdf.biodata', [
            'student' => $student,
        ]);

        return $pdf->stream(
            'ppdb2022-alfarhan-biodata-'
            . $student->user->username
            . '-'
            . $student->user->name
            . '.pdf'
        );
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
