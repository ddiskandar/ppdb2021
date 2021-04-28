<x-jet-form-section submit="update">
    <x-slot name="title">
        {{ __('Data Keluarga') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Data Ayah kandung dan Ibu kandung atau Wali') }}
    </x-slot>

    <x-slot name="form">

        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="state.phone_ortu" :value="__('Nomor HP/WA orang tua')" />
            <x-jet-input wire:model.lazy="state.phone_ortu" maxlength="13" id="state.phone_ortu" class="block w-full mt-1" type="text" name="state.phone_ortu" :value="old('state.phone_ortu')" />
            <x-jet-input-error for="state.phone_ortu" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="state.ayah_nama" :value="__('Nama ayah')" />
            <x-jet-input wire:model.lazy="state.ayah_nama" id="state.ayah_nama" class="block w-full mt-1" type="text" nama="state.ayah_nama" :value="old('state.ayah_nama')" required />
            <x-jet-input-error for="state.ayah_nama" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-3">
            <x-jet-label for="state.ayah_nik" :value="__('Nomor NIK ayah')" />
            <x-jet-input wire:model.lazy="state.ayah_nik" maxlength="16" id="state.ayah_nik" class="block w-full mt-1" type="text" name="state.ayah_nik" :value="old('state.ayah_nik')" />
            <x-jet-input-error for="state.ayah_nik" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-2">
            <x-jet-label for="state.ayah_lahir" :value="__('Tahun lahir ayah')" />
            <x-jet-input wire:model.lazy="state.ayah_lahir" maxlength="4" id="state.ayah_lahir" class="block w-full mt-1" type="text" name="state.ayah_lahir" :value="old('state.ayah_lahir')" />
            <x-jet-input-error for="state.ayah_lahir" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-3">
            <x-jet-label for="state.ayah_pendidikan" :value="__('Pendidikan terakhir ayah')" />
            <x-select wire:model.lazy="state.ayah_pendidikan" id="state.ayah_pendidikan" name="state.ayah_pendidikan" autocomplete="state.ayah_pendidikan" class="block w-full px-3 mt-1">
                @foreach($pendidikans as $pendidikan)
                <option value="{{ $pendidikan->id }}">{{ $pendidikan->name }}</option>
                @endforeach
            </x-select>
            <x-jet-input-error for="state.ayah_pendidikan" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-3">
            <x-jet-label for="state.ayah_pekerjaan" :value="__('Pekerjaan ayah')" />
            <x-select wire:model.lazy="state.ayah_pekerjaan" id="state.ayah_pekerjaan" name="state.ayah_pekerjaan" autocomplete="state.ayah_pekerjaan" class="block w-full px-3 mt-1">
                @foreach($pekerjaans as $pekerjaan)
                <option value="{{ $pekerjaan->id }}">{{ $pekerjaan->name }}</option>
                @endforeach
            </x-select>
            <x-jet-input-error for="state.ayah_pekerjaan" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-3">
            <x-jet-label for="state.ayah_penghasilan" :value="__('Penghasilan ayah')" />
            <x-select wire:model.lazy="state.ayah_penghasilan" id="state.ayah_penghasilan" name="state.ayah_penghasilan" autocomplete="state.ayah_penghasilan" class="block w-full px-3 mt-1">
                @foreach($penghasilans as $penghasilan)
                <option value="{{ $penghasilan->id }}">{{ $penghasilan->name }}</option>
                @endforeach
            </x-select>
            <x-jet-input-error for="state.ayah_penghasilan" class="mt-2" />
        </div>

        <!-- Ibu -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="state.ibu_nama" :value="__('Nama ibu')" />
            <x-jet-input wire:model.lazy="state.ibu_nama" id="state.ibu_nama" class="block w-full mt-1" type="text" nama="state.ibu_nama" :value="old('state.ibu_nama')" required />
            <x-jet-input-error for="state.ibu_nama" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-3">
            <x-jet-label for="state.ibu_nik" :value="__('Nomor NIK ibu')" />
            <x-jet-input wire:model.lazy="state.ibu_nik" maxlength="16" id="state.ibu_nik" class="block w-full mt-1" type="text" name="state.ibu_nik" :value="old('state.ibu_nik')" />
            <x-jet-input-error for="state.ibu_nik" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-2">
            <x-jet-label for="state.ibu_lahir" :value="__('Tahun lahir ibu')" />
            <x-jet-input wire:model.lazy="state.ibu_lahir" maxlength="4" id="state.ibu_lahir" class="block w-full mt-1" type="text" name="state.ibu_lahir" :value="old('state.ibu_lahir')" />
            <x-jet-input-error for="state.ibu_lahir" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-3">
            <x-jet-label for="state.ibu_pendidikan" :value="__('Pendidikan terakhir ibu')" />
            <x-select wire:model.lazy="state.ibu_pendidikan" id="state.ibu_pendidikan" name="state.ibu_pendidikan" autocomplete="state.ibu_pendidikan" class="block w-full px-3 mt-1">
                @foreach($pendidikans as $pendidikan)
                <option value="{{ $pendidikan->id }}">{{ $pendidikan->name }}</option>
                @endforeach
            </x-select>
            <x-jet-input-error for="state.ibu_pendidikan" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-3">
            <x-jet-label for="state.ibu_pekerjaan" :value="__('Pekerjaan ibu')" />
            <x-select wire:model.lazy="state.ibu_pekerjaan" id="state.ibu_pekerjaan" name="state.ibu_pekerjaan" autocomplete="state.ibu_pekerjaan" class="block w-full px-3 mt-1">
                @foreach($pekerjaans as $pekerjaan)
                <option value="{{ $pekerjaan->id }}">{{ $pekerjaan->name }}</option>
                @endforeach
            </x-select>
            <x-jet-input-error for="state.ibu_pekerjaan" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-3">
            <x-jet-label for="state.ibu_penghasilan" :value="__('Penghasilan ibu')" />
            <x-select wire:model.lazy="state.ibu_penghasilan" id="state.ibu_penghasilan" name="state.ibu_penghasilan" autocomplete="state.ibu_penghasilan" class="block w-full px-3 mt-1">
                @foreach($penghasilans as $penghasilan)
                <option value="{{ $penghasilan->id }}">{{ $penghasilan->name }}</option>
                @endforeach
            </x-select>
            <x-jet-input-error for="state.ibu_penghasilan" class="mt-2" />
        </div>

        <!-- Wali -->

        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="state.wali_nama" :value="__('Nama wali')" />
            <x-jet-input wire:model.lazy="state.wali_nama" id="state.wali_nama" class="block w-full mt-1" type="text" nama="state.wali_nama" :value="old('state.wali_nama')" />
            <x-jet-input-error for="state.wali_nama" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-3">
            <x-jet-label for="state.wali_nik" :value="__('Nomor NIK wali')" />
            <x-jet-input wire:model.lazy="state.wali_nik" maxlength="16" id="state.wali_nik" class="block w-full mt-1" type="text" name="state.wali_nik" :value="old('state.wali_nik')" />
            <x-jet-input-error for="state.wali_nik" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-2">
            <x-jet-label for="state.wali_lahir" :value="__('Tahun lahir wali')" />
            <x-jet-input wire:model.lazy="state.wali_lahir" maxlength="4" id="state.wali_lahir" class="block w-full mt-1" type="text" name="state.wali_lahir" :value="old('state.wali_lahir')" />
            <x-jet-input-error for="state.wali_lahir" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-3">
            <x-jet-label for="state.wali_pendidikan" :value="__('Pendidikan terakhir wali')" />
            <x-select wire:model.lazy="state.wali_pendidikan" id="state.wali_pendidikan" name="state.wali_pendidikan" autocomplete="state.wali_pendidikan" class="block w-full px-3 mt-1">
                @foreach($pendidikans as $pendidikan)
                <option value="{{ $pendidikan->id }}">{{ $pendidikan->name }}</option>
                @endforeach
            </x-select>
            <x-jet-input-error for="state.wali_pendidikan" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-3">
            <x-jet-label for="state.wali_pekerjaan" :value="__('Pekerjaan wali')" />
            <x-select wire:model.lazy="state.wali_pekerjaan" id="state.wali_pekerjaan" name="state.wali_pekerjaan" autocomplete="state.wali_pekerjaan" class="block w-full px-3 mt-1">
                @foreach($pekerjaans as $pekerjaan)
                <option value="{{ $pekerjaan->id }}">{{ $pekerjaan->name }}</option>
                @endforeach
            </x-select>
            <x-jet-input-error for="state.wali_pekerjaan" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-3">
            <x-jet-label for="state.wali_penghasilan" :value="__('Penghasilan wali')" />
            <x-select wire:model.lazy="state.wali_penghasilan" id="state.wali_penghasilan" name="state.wali_penghasilan" autocomplete="state.wali_penghasilan" class="block w-full px-3 mt-1">
                @foreach($penghasilans as $penghasilan)
                <option value="{{ $penghasilan->id }}">{{ $penghasilan->name }}</option>
                @endforeach
            </x-select>
            <x-jet-input-error for="state.wali_penghasilan" class="mt-2" />
        </div>

    </x-slot>

    <x-slot name="actions">
        <x-jet-action-message class="mr-3" on="saved">
            {{ __('Berhasil disimpan.') }}
        </x-jet-action-message>

        <x-jet-button>
            {{ __('Simpan') }}
        </x-jet-button>
    </x-slot>
</x-jet-form-section>