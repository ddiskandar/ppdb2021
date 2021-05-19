<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\School;
use App\Models\Jurusan;

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
}
