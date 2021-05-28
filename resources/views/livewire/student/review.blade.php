<x-jet-form-section submit="update">
    <x-slot name="title">
        {{ __('Review') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Data lengkap peserta didik') }}
    </x-slot>

    <x-slot name="form">

        <!-- Pilihan Kelas -->
        <div class="col-span-6">
        
            <img src="{!! $student->user->photo ? Storage::url($student->user->photo) : '/images/default-photo.png' !!}" class="object-cover w-48 rounded shadow h-60" />

            <dl class="mt-6">
                <x-dt value="Nama Lengkap / Panggilan" />
                <x-dd value="{!! $student->user->name !!} / {!! $student->panggilan ?? '-' !!}" />

                <x-dt class="mt-6" value="Asal Sekolah" />
                <x-dd value="{{ $student->school_temp ?? $student->school->name }}" />

                <x-dt class="mt-6" value="Alamat lengkap" />
                <x-dd value="{{ $student->fullAddress ?? '-' }}" />

                <x-dt class="mt-6" value="Nama ayah / ibu / Wali" />
                <x-dd value="{{ $student->ortu->ayah_nama ?? '-' }} / {{ $student->ortu->ibu_nama ?? '-' }} / {{ $student->ortu->wali_nama ?? '-' }}" />

                <x-dt class="mt-6" value="Kelayakan PIP / Deskripsi keluarga" />
                <x-dd value="{{ $student->pip->name ?? '-' }} / {{ $student->desc_keluarga ?? '-' }}" />

                <x-dt class="mt-6" value="Tempat tinggal / Moda transportasi" />
                <x-dd value="{{ $student->tinggal->name ?? '-' }} / {{ $student->transportasi->name ?? '-' }}" />

                <x-dt class="mt-6" value="Hobby / Cita-cita" />
                <x-dd value="{{ $student->hobby->name ?? '-' }} / {{ $student->ideals->name ?? '-' }}" />

                <x-dt class="mt-6" value="Prestasi yang pernah diraih" />
                <x-dd value=" {{ $student->prestasi ?? '-' }}" />

                <x-dt class="mt-6" value="Deskripsi peserta didik" />
                <x-dd value="{{ $student->desc_student ?? '-' }}" />

                <x-dt class="mt-6" value="Motivasi melanjutkan SMK" />
                <x-dd value="{{ $student->ppdb->motivasi_smk ?? '-' }}" />

                <x-dt class="mt-6" value="Motivasi Jurusan" />
                <x-dd value="{{ $student->ppdb->motivasi_jurusan ?? '-' }}" />

                <x-dt class="mt-6" value="Alat Elektronik" />
                <x-dd value="{{ $student->ppdb->tool->name ?? '-' }}" />

                <x-dt class="mt-6" value="TPA / Menggambar / Baca Quran / Tulis Quran / Bacaan Shalat" />
                <x-dd value="{{ $student->ppdb->tpa ?? '-' }} / {{ $student->ppdb->gambar ?? '-' }} / {{ $student->ppdb->baca_quran ?? '-' }} / {{ $student->ppdb->tulis_quran ?? '-' }} / {{ $student->ppdb->bacaan_quran ?? '-' }}" />

                <x-dt class="mt-6" value="Pilihan Kelas / Jurusan Pertama / Jurusan Kedua" />
                <x-dd value="{{ pilihan_kelas_slug($student->ppdb->pilihan_kelas) }} / {{ pilihan_jurusan_slug($student->ppdb->pilihan_satu) ?? '-' }} / {{ pilihan_jurusan_slug($student->ppdb->pilihan_dua) ?? '-' }}" />

            </dl>
        </div>

    </x-slot>

</x-jet-form-section>