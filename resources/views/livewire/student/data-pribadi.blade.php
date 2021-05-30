<x-jet-form-section submit="update">
    <x-slot name="title">
        {{ __('Data Pribadi') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Pastikan data sesuai dengan dokumen.') }}
    </x-slot>

    <x-slot name="form">
        <!-- Nama Lengkap -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="name" :value="__('Nama Lengkap')" />
            <x-jet-input wire:model.defer="state.user.name" id="name" class="block w-full mt-1 uppercase" type="text" name="name" :value="old('name')" required />
            <x-jet-input-error for="state.user.name" class="mt-2" />
        </div>

        <!-- Nama Panggilan -->
        <div class="col-span-6 sm:col-span-3">
            <x-jet-label for="panggilan" :value="__('Panggilan')" />
            <x-jet-input wire:model.defer="state.panggilan" id="panggilan" class="block w-full mt-1 uppercase" type="text" name="panggilan" :value="old('panggilan')" />
            <x-jet-input-error for="state.panggilan" class="mt-2" />
        </div>

        <!-- Jenis Kelamin -->
        <div class="col-span-6 sm:col-span-3">
            <x-jet-label for="jk" :value="__('Jenis Kelamin')" />
            <x-select wire:model.defer="state.jk" id="jk" name="jk" autocomplete="jk" class="block w-full px-3 mt-1">
                <option value="">{{ __('-- Pilih salah-satu') }}</option>
                <option value="L">{{ __('Laki-laki') }}</option>
                <option value="P">{{ __('Perempuan') }}</option>
            </x-select>
            <x-jet-input-error for="state.jk" class="mt-2" />
        </div>

        <!-- NISN -->
        <div class="col-span-6 sm:col-span-3">
            <x-jet-label for="nisn" :value="__('NISN')" />
            <x-jet-input maxlength="10" wire:model.defer="state.nisn" id="nisn" class="block w-full mt-1" type="text" name="nisn" :value="old('nisn')" />
            <x-jet-input-error for="state.nisn" class="mt-2" />
        </div>

        <!-- NIK -->
        <div class="col-span-6 sm:col-span-3">
            <x-jet-label for="nik" :value="__('Nomor Induk Kependudukan')" />
            <x-jet-input maxlength="16" wire:model.defer="state.nik" id="nik" class="block w-full mt-1" type="text" name="nik" :value="old('nik')" />
            <x-jet-input-error for="state.nik" class="mt-2" />
        </div>

        <!-- No. KK -->
        <div class="col-span-6 sm:col-span-3">
            <x-jet-label for="kk" :value="__('Nomor Kartu Keluarga')" />
            <x-jet-input maxlength="16" wire:model.defer="state.kk" id="kk" class="block w-full mt-1" type="text" name="kk" :value="old('kk')" />
            <x-jet-input-error for="state.kk" class="mt-2" />
        </div>

        <!-- No. reg Akta Lahir -->
        <div class="col-span-6 sm:col-span-3">
            <x-jet-label for="akta" :value="__('Nomor Reg Akta Lahir')" />
            <x-jet-input maxlength="21" wire:model.defer="state.akta" id="akta" class="block w-full mt-1" type="text" name="akta" :value="old('akta')" />
            <x-jet-input-error for="state.akta" class="mt-2" />
        </div>

        <!-- Tempat Lahir -->
        <div class="col-span-6 sm:col-span-3">
            <x-jet-label for="birthplace" :value="__('Tempat Lahir')" />
            <x-jet-input id="birthplace" wire:model.defer="state.birthplace" class="block w-full mt-1" type="text" name="birthplace" :value="old('birthplace')" />
            <x-jet-input-error for="state.birthplace" class="mt-2" />
        </div>

        <!-- Tanggal Lahir -->
        <div class="col-span-6 sm:col-span-3">
            <x-jet-label for="birthdate" :value="__('Tanggal Lahir')" />
            <x-jet-input id="birthdate" wire:model.defer="state.birthdate" class="block w-full mt-1" type="date" name="birthdate" :value="old('birthdate')" />
            <x-jet-input-error for="state.birthdate" class="mt-2" />
        </div>

        <!-- Alamat -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="address" :value="__('Alamat Kampung / Jalan')" />
            <x-jet-input wire:model.defer="state.address" id="address" class="block w-full mt-1" type="text" name="address" :value="old('address')" />
            <x-jet-input-error for="state.address" class="mt-2" />
        </div>

        <!-- Rt -->
        <div class="col-span-6 sm:col-span-1">
            <x-jet-label for="rt" :value="__('RT')" />
            <x-jet-input wire:model.defer="state.rt" id="rt" class="block w-full mt-1" type="number" name="rt" :value="old('rt')" />
            <x-jet-input-error for="state.rt" class="mt-2" />
        </div>

        <!-- Rw -->
        <div class="col-span-6 sm:col-span-1">
            <x-jet-label for="rw" :value="__('RW')" />
            <x-jet-input wire:model.defer="state.rw" id="rw" class="block w-full mt-1" type="number" name="rw" :value="old('rw')" />
            <x-jet-input-error for="state.rw" class="mt-2" />
        </div>

        <!-- Desa -->
        <div class="col-span-6 sm:col-span-2">
            <x-jet-label for="desa" :value="__('Desa')" />
            <x-jet-input wire:model.defer="state.desa" id="desa" class="block w-full mt-1" type="text" name="desa" :value="old('desa')" />
            <x-jet-input-error for="state.desa" class="mt-2" />
        </div>

        <!-- Kecamatan -->
        <div class="col-span-6 sm:col-span-2">
            <x-jet-label for="kecamatan" :value="__('Kecamatan')" />
            <x-jet-input wire:model.defer="state.kecamatan" id="kecamatan" class="block w-full mt-1" type="text" name="kecamatan" :value="old('kecamatan')" />
            <x-jet-input-error for="state.kecamatan" class="mt-2" />
        </div>

        <!-- Kabupaten -->
        <div class="col-span-6 sm:col-span-2">
            <x-jet-label for="kab" :value="__('Kabupaten')" />
            <x-jet-input wire:model.defer="state.kab" id="kab" class="block w-full mt-1" type="text" name="kab" :value="old('kab')" />
            <x-jet-input-error for="state.kab" class="mt-2" />
        </div>

        <!-- Provinsi -->
        <div class="col-span-6 sm:col-span-2">
            <x-jet-label for="prov" :value="__('Provinsi')" />
            <x-jet-input wire:model.defer="state.prov" id="prov" class="block w-full mt-1" type="text" name="prov" :value="old('prov')" />
            <x-jet-input-error for="state.prov" class="mt-2" />
        </div>

        <!-- Kode Pos -->
        <div class="col-span-6 sm:col-span-2">
            <x-jet-label for="kode_pos" :value="__('Kode Pos')" />
            <x-jet-input wire:model.defer="state.kode_pos" id="kode_pos" class="block w-full mt-1" type="number" name="kode_pos" :value="old('kode_pos')" />
            <x-jet-input-error for="state.kode_pos" class="mt-2" />
        </div>

        <!-- Lintang -->
        <div class="col-span-6 sm:col-span-3">
            <x-jet-label for="lintang" :value="__('Lintang')" />
            <x-jet-input id="lintang" wire:model.defer="state.lintang" class="block w-full mt-1" type="text" name="lintang" :value="old('lintang')" placeholder="Misal.. 15,23456" />
            <x-jet-input-error for="state.lintang" class="mt-2" />
        </div>

        <!-- Lintang -->
        <div class="col-span-6 sm:col-span-3">
            <x-jet-label for="bujur" :value="__('Bujur')" />
            <x-jet-input id="bujur" wire:model.defer="state.bujur" class="block w-full mt-1" type="text" name="bujur" :value="old('bujur')" placeholder="Misal.. -30,67890" />
            <x-jet-input-error for="state.bujur" class="mt-2" />
        </div>

        <!-- Tempat tinggal -->
        <div class="col-span-6 sm:col-span-3">
            <x-jet-label for="tinggal_id" :value="__('Tempat tinggal')" />
            <x-select wire:model.defer="state.tinggal_id" id="tinggal_id" name="tinggal_id" autocomplete="tinggal_id" class="block w-full px-3 mt-1">
                <option value="">{{ __('-- Pilih salah-satu') }}</option>
                @foreach($tinggals as $tinggal)
                <option value="{{ $tinggal->id }}">{{ $tinggal->name }}</option>
                @endforeach
            </x-select>
            <x-jet-input-error for="state.tinggal_id" class="mt-2" />
        </div>

        <!-- Transportasi -->
        <div class="col-span-6 sm:col-span-3">
            <x-jet-label for="transportasi_id" :value="__('Moda Transportasi')" />
            <x-select wire:model.defer="state.transportasi_id" id="transportasi_id" name="transportasi_id" autocomplete="transportasi_id" class="block w-full px-3 mt-1">
                <option value="">{{ __('-- Pilih salah-satu') }}</option>
                @foreach($transportasis as $transportasi)
                <option value="{{ $transportasi->id }}">{{ $transportasi->name }}</option>
                @endforeach
            </x-select>
            <x-jet-input-error for="state.transportasi_id" class="mt-2" />
        </div>

        <!-- Anak ke -->
        <div class="col-span-6 sm:col-span-3">
            <x-jet-label for="anak_ke" :value="__('Anak Ke (Berdasarkan KK)')" />
            <x-jet-input maxlength="13" id="anak_ke" wire:model.defer="state.anak_ke" class="block w-full mt-1" type="number" name="anak_ke" :value="old('anak_ke')" />
            <x-jet-input-error for="state.anak_ke" class="mt-2" />
        </div>

        <!-- Saudara -->
        <div class="col-span-6 sm:col-span-3">
            <x-jet-label for="saudara" :value="__('Jumlah Saudara Kandung')" />
            <x-jet-input maxlength="13" id="saudara" wire:model.defer="state.saudara" class="block w-full mt-1" type="number" name="saudara" :value="old('saudara')" />
            <x-jet-input-error for="state.saudara" class="mt-2" />
        </div>

    </x-slot>

    <x-slot name="actions">
        <x-jet-action-message class="mr-3" on="saved">
            {{ __('Berhasil disimpan.') }}
        </x-jet-action-message>

        <x-dirty-message class="mr-3"
            target="state.user, state.panggilan, state.jk, state.nisn, state.nik, state.kk, state.akta, state.birthplace, state.birthdate, state.address, state.rt, state.rw, state.desa, state.kecamatan, state.kab, state.prov, state.kode_pos, state.lintang, state.bujur, state.tinggal_id, state.transportasi_id, state.anak_ke, state.saudara, state.phone">
            {{ __('Belum disimpan!') }}
        </x-dirty-message>

        <x-jet-button>
            {{ __('Simpan') }}
        </x-jet-button>
    </x-slot>
</x-jet-form-section>