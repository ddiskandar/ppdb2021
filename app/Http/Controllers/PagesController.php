<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use App\Models\Periode;
use App\Models\Ppdb;
use App\Models\Student;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\School;

class PagesController extends Controller
{
    public function dashboard()
    {
        $students = DB::table('students')->select('id', 'jk', 'baca_quran', 'tulis_quran', 'bacaan_shalat', 'pdu', 'olahraga', 'jas')->get();
        $ppdb = Ppdb::select('pilihan_lulus', 'info_id')->get();
        $schools = School::withCount('students')->orderByDesc('last_students')->get();
        $jurusans = Jurusan::withCount('students')->get();
        $periode = DB::table('periodes')->whereActive(true)->first();
        $card = [
            'pendaftar' => $students->count(),
            'boarding' =>  DB::table('ppdb')->where('pilihan_kelas', 1)->count(),
            'yatim' =>  DB::table('ortus')->where('ayah_pekerjaan', '16')->count(),
            'pembayaran' =>  DB::table('payments')->count(),
        ];
        $jk = [
            'male' => $students->where('jk', 'L')->count(),
            'female' => $students->where('jk', 'P')->count(),
        ];
        $jumlah_jurusan = [
            'mm' => $ppdb->where('pilihan_lulus', 1)->count(),
            'bdp' => $ppdb->where('pilihan_lulus', 2)->count(),
            'aphp' => $ppdb->where('pilihan_lulus', 3)->count(),
        ];
        $btq = [
            'baca_quran' => [
                'S' => $students->where('baca_quran', 'S')->count(),
                'A' => $students->where('baca_quran', 'A')->count(),
                'B' => $students->where('baca_quran', 'B')->count(),
                'C' => $students->where('baca_quran', 'C')->count(),
                'D' => $students->where('baca_quran', 'D')->count(),
                'E' => $students->where('baca_quran', 'E')->count(),
            ],
            'tulis_quran' => [
                'S' => $students->where('tulis_quran', 'S')->count(),
                'A' => $students->where('tulis_quran', 'A')->count(),
                'B' => $students->where('tulis_quran', 'B')->count(),
                'C' => $students->where('tulis_quran', 'C')->count(),
                'D' => $students->where('tulis_quran', 'D')->count(),
                'E' => $students->where('tulis_quran', 'E')->count(),
            ],
            'bacaan_shalat' => [
                'S' => $students->where('bacaan_shalat', 'S')->count(),
                'A' => $students->where('bacaan_shalat', 'A')->count(),
                'B' => $students->where('bacaan_shalat', 'B')->count(),
                'C' => $students->where('bacaan_shalat', 'C')->count(),
                'D' => $students->where('bacaan_shalat', 'D')->count(),
                'E' => $students->where('bacaan_shalat', 'E')->count(),
            ],
        ];
        $seragam = [
            'pdu' => [
                'S' => $students->where('pdu', 'S')->count(),
                'M' => $students->where('pdu', 'M')->count(),
                'L' => $students->where('pdu', 'L')->count(),
                'XL' => $students->where('pdu', 'XL')->count(),
                'XXL' => $students->where('pdu', 'XXL')->count(),
                'XXXL' => $students->where('pdu', 'XXXL')->count(),
            ],
            'olahraga' => [
                'S' => $students->where('olahraga', 'S')->count(),
                'M' => $students->where('olahraga', 'M')->count(),
                'L' => $students->where('olahraga', 'L')->count(),
                'XL' => $students->where('olahraga', 'XL')->count(),
                'XXL' => $students->where('olahraga', 'XXL')->count(),
                'XXXL' => $students->where('olahraga', 'XXXL')->count(),
            ],
            'jas' => [
                'S' => $students->where('jas', 'S')->count(),
                'M' => $students->where('jas', 'M')->count(),
                'L' => $students->where('jas', 'L')->count(),
                'XL' => $students->where('jas', 'XL')->count(),
                'XXL' => $students->where('jas', 'XXL')->count(),
                'XXXL' => $students->where('jas', 'XXXL')->count(),
            ],
        ];
        $info = [
            'medsos' => $ppdb->where('info_id', 2)->count(),
            'brosur' => $ppdb->where('info_id', 3)->count(),
            'teman' => $ppdb->where('info_id', 4)->count(),
            'walikelas' => $ppdb->where('info_id', 5)->count(),
            'sendiri' => $ppdb->where('info_id', 6)->count(),
        ];

        return view('pages.dashboard', compact('students', 'ppdb', 'schools', 'jurusans', 'periode', 'card', 'jk', 'jumlah_jurusan', 'btq', 'seragam', 'info'));
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

        return view('pages.home', [
            'periode' => $periode,
            'student' => $student,
        ]);
    }

    public function seleksi()
    {
        return view('pages.seleksi');
    }

    public function pendaftaran()
    {
        return view('pages.pendaftaran');
    }

    public function pembayaran()
    {
        return view('pages.pembayaran');
    }

    public function master()
    {
        return view('pages.master');
    }
}
