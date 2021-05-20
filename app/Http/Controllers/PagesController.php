<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use App\Models\Periode;
use App\Models\Ppdb;
use App\Models\Student;

use Illuminate\Http\Request;
use App\Models\School;

class PagesController extends Controller
{
    public function dashboard()
    {
        $students = \DB::table('students')->get();

        return view('admin.dashboard', [
            'schools' => School::withCount('students')->orderByDesc('last_students')->get(),
            'jurusans' => Jurusan::all(),
            'periode' => \DB::table('periodes')->where('active', true)->first(),
            'pendaftar' => $students->count(),
            'boarding' => \DB::table('ppdb')->where('pilihan_kelas', true)->count(),
            'yatim' => \DB::table('ortus')->where('ayah_pekerjaan', '16')->count(),
            'pembayaran' => \DB::table('payments')->count(),
            'male' => $students->where('jk', 'L')->count(),
            'female' => $students->where('jk', 'P')->count(),
        ]);
    }

    public function welcome()
    {
        return view('welcome');
    }

    public function home()
    {
        $periode = Periode::where('active', true)
        ->select([
            'id', 'ref_payment_amount', 'name', 'desc'
        ])
            ->first();

        $student = Student::where('user_id', auth()->id())
        ->select([
            'id', 'user_id', 'panggilan', 'jk', 'nisn', 'nik', 'kk', 'birthplace', 'birthdate', 'akta', 'address', 'rt', 'rw', 'desa', 'kecamatan', 'kab', 'prov', 'kode_pos', 'tinggal_id', 'transportasi_id', 'school_id', 'phone', 'address', 'nisn', 'name_verified'
        ])
        ->with(
            'ortu:student_id,ibu_nama',
            'user:id,name,username,photo',
            'school:id,name',
            'ppdb:id,student_id,periode_id,pilihan_satu,join_wa,payment_amount',
            'payments:id,student_id,status,amount,verified_by',
            'document:id,student_id,kartu_keluarga'
        )
        ->first();

        return view('student.home', [
            'periode' => $periode,
            'student' => $student,
        ]);
    }
}
