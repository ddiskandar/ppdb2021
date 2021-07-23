<table>
    <thead>
        <tr>
            <th>No. Registrasi</th>

            <th>Pilihan Kelas</th>
            <th>Pilihan Jurusan 1</th>
            <th>Pilihan Jurusan 2</th>
            <th>Jurusan Lulus</th>

            <th>Asal Sekolah</th>
            <th>NPSN</th>
            <th>Sekolah Temp</th>

            <th>Nama Lengkap</th>
            <th>Nama Panggilan</th>
            <th>JK</th>
            <th>NIK</th>
            <th>NISN</th>
            <th>Nomor Akta Kelahiran</th>
            <th>Nomor Kartu Keluarga</th>
            <th>Tempat Lahir</th>
            <th>Tanggal Lahir</th>

            <th>Alamat Kampung/Jalan</th>
            <th>RT</th>
            <th>RW</th>
            <th>Desa</th>
            <th>Kecamatan</th>
            <th>Kabupaten</th>
            <th>Provinsi</th>
            <th>Kode Pos</th>
            <th>No. Handphone</th>

            <th>Anak Ke</th>
            <th>Jumlah Saudara Kandung</th>
            <th>Tempat tinggal </th>
            <th>Moda Transportasi</th>
            <th>Jarak ke sekolah</th>
            <th>Waktu tempuh</th>

            <th>Hobby</th>
            <th>Cita-cita</th>

            <th>Tinggi</th>
            <th>Berat</th>
            <th>Lingkar Kepala</th>

            <th>Jarak</th>
            <th>Waktu</th>
            <th>PDU</th>
            <th>Olahraga</th>
            <th>Jas</th>
            <th>Prestasi yang pernah diraih</th>
            <th>Baca Quran</th>
            <th>Tulis Quran</th>
            <th>Bacaan Shalat</th>
            <th>TPA</th>
            <th>Menggambar</th>
            
            <th>Nomor HP Orang tua</th>

            <th>Nama Ayah</th>
            <th>NIK Ayah</th>
            <th>Tahun Lahir Ayah</th>
            <th>Pendidikan Terakhir Ayah</th>
            <th>Pekerjaan Ayah</th>
            <th>Penghasilan Ayah</th>

            <th>Nama Ibu</th>
            <th>NIK Ibu</th>
            <th>Tahun Lahir Ibu</th>
            <th>Pendidikan Terakhir Ibu</th>
            <th>Pekerjaan Ibu</th>
            <th>Penghasilan Ibu</th>

            <th>Nama Wali</th>
            <th>NIK Wali</th>
            <th>Tahun Lahir Wali</th>
            <th>Pendidikan Terakhir Wali</th>
            <th>Pekerjaan Wali</th>
            <th>Penghasilan Wali</th>

            <th>Nomor Ijazah</th>

            <th>Nomor KKS</th>
            <th>Nomor KPS/PKH</th>
            <th>Nomor KIP</th>
            <th>Nomor KIS</th>

            <th>Deskripsi Peserta Didik</th>
            <th>Deskripsi Keluarga</th>
            <th>Catatan Tambahan</th>
            <th>Layak PIP</th>

            <th>Interviewer</th>
            <th>Motivasi SMK</th>
            <th>Motivasi Jurusan</th>
            <th>Kepemilikan Alat</th>
        </tr>
    </thead>
    <tbody>
        @foreach($students as $student)
        <tr>
            <td>{{ $student->user->username }}</td>

            <td>{{ pilihan_kelas_slug($student->ppdb->pilihan_kelas) }}</td>
            <td>{{ pilihan_jurusan_slug($student->ppdb->pilihan_satu) }}</td>
            <td>{{ pilihan_jurusan_slug($student->ppdb->pilihan_dua) }}</td>
            <td>{{ pilihan_jurusan_slug($student->ppdb->pilihan_lulus) }}</td>

            <td>{{ $student->school->name }}</td>
            <td>{{ $student->school->npsn }}</td>
            <td>{{ $student->school_temp }}</td>

            <td>{{ $student->user->name }}</td>
            <td>{{ $student->panggilan }}</td>
            <td>{{ $student->jk }}</td>
            <td>{{ $student->nik }}</td>
            <td>{{ $student->nisn }}</td>
            <td>{{ $student->akta }}</td>
            <td>{{ $student->kk }}</td>
            <td>{{ $student->birthplace }}</td>
            <td>{{ $student->birthdate }}</td>

            <td>{{ $student->address }}</td>
            <td>{{ $student->rt }}</td>
            <td>{{ $student->rw }}</td>
            <td>{{ $student->desa }}</td>
            <td>{{ $student->kec }}</td>
            <td>{{ $student->kab }}</td>
            <td>{{ $student->prov }}</td>
            <td>{{ $student->kode_pos }}</td>
            <td>{{ $student->phone }}</td>

            <td>{{ $student->anak_ke }}</td>
            <td>{{ $student->saudara }}</td>
            <td>{{ $student->tinggal->name }}</td>
            <td>{{ $student->transportasi->name }}</td>
            <td>{{ $student->jarak }}</td>
            <td>{{ $student->waktu }}</td>

            <td>{{ $student->hobby->name }}</td>
            <td>{{ $student->ideals->name }}</td>

            <td>{{ $student->tinggi }}</td>
            <td>{{ $student->berat }}</td>
            <td>{{ $student->lingkar_kepala }}</td>

            <td>{{ $student->jarak }}</td>
            <td>{{ $student->waktu }}</td>
            <td>{{ $student->pdu }}</td>
            <td>{{ $student->olahraga }}</td>
            <td>{{ $student->jas }}</td>
            <td>{{ $student->prestasi }}</td>
            <td>{{ $student->baca_quran }}</td>
            <td>{{ $student->tulis_quran }}</td>
            <td>{{ $student->bacaan_shalat }}</td>
            <td>{{ $student->tpa }}</td>
            <td>{{ $student->gambar }}</td>

            <td>{{ $student->ortu->phone_ortu }}</td>

            <td>{{ $student->ortu->ayah_nama }}</td>
            <td>{{ $student->ortu->ayah_nik }}</td>
            <td>{{ $student->ortu->ayah_lahir }}</td>
            <td>{{ $student->ortu->pendidikan_ayah->name }}</td>
            <td>{{ $student->ortu->pekerjaan_ayah->name }}</td>
            <td>{{ $student->ortu->penghasilan_ayah->name }}</td>

            <td>{{ $student->ortu->ibu_nama }}</td>
            <td>{{ $student->ortu->ibu_nik }}</td>
            <td>{{ $student->ortu->ibu_lahir }}</td>
            <td>{{ $student->ortu->pendidikan_ibu->name }}</td>
            <td>{{ $student->ortu->pekerjaan_ibu->name }}</td>
            <td>{{ $student->ortu->penghasilan_ibu->name }}</td>

            <td>{{ $student->ortu->wali_nama }}</td>
            <td>{{ $student->ortu->wali_nik }}</td>
            <td>{{ $student->ortu->wali_lahir }}</td>
            <td>{{ $student->ortu->pendidikan_wali->name }}</td>
            <td>{{ $student->ortu->pekerjaan_wali->name }}</td>
            <td>{{ $student->ortu->penghasilan_wali->name }}</td>

            <td>{{ $student->document->nomor_ijazah }}</td>

            <td>{{ $student->document->no_kks }}</td>
            <td>{{ $student->document->no_pkh }}</td>
            <td>{{ $student->document->no_kip }}</td>
            <td>{{ $student->document->no_kis }}</td>

            <td>{{ $student->desc_student }}</td>
            <td>{{ $student->desc_keluarga }}</td>
            <td>{{ $student->catatan }}</td>
            <td>{{ $student->pip->name }}</td>

            <td>{{ $student->ppdb->interviewer->name ?? '' }}</td>
            <td>{{ $student->ppdb->motivasi_smk }}</td>
            <td>{{ $student->ppdb->motivasi_jurusan }}</td>
            <td>{{ $student->ppdb->tool->name }}</td>
        </tr>
        @endforeach
    </tbody>
</table>