<div>

    <x-jet-button wire:click="create" wire:loading.attr="disabled" class="ml-4">
        {{ __('Tambah Pembayaran') }}
    </x-jet-button>

    <!-- Delete User Confirmation Modal -->
    <x-jet-dialog-modal maxWidth="4xl" wire:model="paymentCreate">
        <x-slot name="title">
            <div class="flex items-center justify-between mt-4">
                <h1 class="font-semibold font-3xl">
                    {{ __('Tambah Akun Pendaftar Baru') }}
                </h1>
                <x-button-icon wire:click="$toggle('paymentCreate')">
                    <x-icon-x-circle />
                </x-button-icon>
            </div>
        </x-slot>

        <x-slot name="content">
            <div class="grid grid-cols-6 gap-6">

                <!-- Pilihan Kelas -->
                <div class="col-span-6 sm:col-span-3">
                    <x-jet-label for="pilihan_kelas" :value="__('Pilihan Kelas')" />

                    <x-select wire:model="pilihan_kelas" id="pilihan_kelas" name="pilihan_kelas" autocomplete="pilihan_kelas" class="block w-full px-3 mt-1" required>
                        <option value="">{{ __('-- Pilih salah-satu') }}</option>
                        <option value="0">{{ __('Regular') }}</option>
                        <option value="1">{{ __('Boarding') }}</option>
                    </x-select>
                    <x-jet-input-error for="pilihan_kelas" class="mt-2" />

                </div>

                <!-- Name -->
                <div class="col-span-6 sm:col-span-4">
                    <x-jet-label for="name" :value="__('Nama Lengkap')" />
                    <x-jet-input wire:model="name" id="name" class="block w-full mt-1" type="text" name="name" :value="old('name')" required />
                    <x-jet-input-error for="name" class="mt-2" />
                </div>

                <!-- Jenis Kelamin -->
                <div class="col-span-6 sm:col-span-2">
                    <x-jet-label for="jk" :value="__('Jenis Kelamin')" />
                    <x-select wire:model="jk" id="jk" name="jk" autocomplete="jk" class="block w-full px-3 mt-1" required>
                        <option value="">{{ __('-- Pilih salah-satu') }}</option>
                        <option value="L">{{ __('Laki-laki') }}</option>
                        <option value="P">{{ __('Perempuan') }}</option>
                    </x-select>
                    <x-jet-input-error for="jk" class="mt-2" />
                </div>


                <!-- NO HP / Whatsapp -->
                <div class="col-span-6 sm:col-span-3">
                    <x-jet-label for="phone" :value="__('Nomor HP/Whatsapp')" />
                    <x-jet-input maxlength="13" id="phone" wire:model="phone" class="block w-full mt-1" type="text" name="phone" :value="old('phone')" required />
                    <x-jet-input-error for="phone" class="mt-2" />
                </div>

                <!-- NISN -->
                <div class="col-span-6 sm:col-span-2">
                    <x-jet-label for="nisn" :value="__('NISN')" />
                    <x-jet-input maxlength="10" wire:model="nisn" id="nisn" class="block w-full mt-1" type="text" name="nisn" :value="old('nisn')" />
                    <x-jet-input-error for="nisn" class="mt-2" />
                </div>

                <!-- NIK -->
                <div class="col-span-6 sm:col-span-2">
                    <x-jet-label for="nik" :value="__('Nomor Induk Kependudukan')" />
                    <x-jet-input maxlength="16" wire:model="nik" id="nik" class="block w-full mt-1" type="text" name="nik" :value="old('nik')" />
                    <x-jet-input-error for="nik" class="mt-2" />
                </div>

                <!-- No. KK -->
                <div class="col-span-6 sm:col-span-2">
                    <x-jet-label for="kk" :value="__('Nomor Kartu Keluarga')" />
                    <x-jet-input maxlength="16" wire:model="kk" id="kk" class="block w-full mt-1" type="text" name="kk" :value="old('kk')" />
                    <x-jet-input-error for="kk" class="mt-2" />
                </div>

                <!-- Tempat Lahir -->
                <div class="col-span-6 sm:col-span-3">
                    <x-jet-label for="birthplace" :value="__('Tempat Lahir')" />
                    <x-jet-input id="birthplace" wire:model="birthplace" class="block w-full mt-1" type="text" name="birthplace" :value="old('birthplace')" required />
                    <x-jet-input-error for="birthplace" class="mt-2" />
                </div>

                <!-- Tanggal Lahir -->
                <div class="col-span-6 sm:col-span-3">
                    <x-jet-label for="birthdate" :value="__('Tanggal Lahir')" />
                    <x-jet-input id="birthdate" wire:model="birthdate" class="block w-full mt-1" type="date" name="birthdate" :value="old('birthdate')" required />
                    <x-jet-input-error for="birthdate" class="mt-2" />
                </div>

                <!-- Nama Ayah -->
                <div class="col-span-6 sm:col-span-3">
                    <x-jet-label for="ayah_nama" :value="__('Nama Ayah Kandung')" />
                    <x-jet-input wire:model="ayah_nama" id="ayah_nama" class="block w-full mt-1" type="text" name="ayah_nama" :value="old('ayah_nama')" required />
                    <x-jet-input-error for="ayah_nama" class="mt-2" />
                </div>

                <!-- Nama Ibu -->
                <div class="col-span-6 sm:col-span-3">
                    <x-jet-label for="ibu_nama" :value="__('Nama Ibu Kandung')" />
                    <x-jet-input wire:model="ibu_nama" id="ibu_nama" class="block w-full mt-1" type="text" name="ibu_nama" :value="old('ibu_nama')" required />
                    <x-jet-input-error for="ibu_nama" class="mt-2" />
                </div>

                <!-- Alamat -->
                <div class="col-span-6 sm:col-span-4">
                    <x-jet-label for="address" :value="__('Alamat Kampung / Jalan')" />
                    <x-jet-input wire:model="address" id="address" class="block w-full mt-1" type="text" name="address" :value="old('address')" required />
                    <x-jet-input-error for="address" class="mt-2" />
                </div>

                <!-- Rt -->
                <div class="col-span-6 sm:col-span-1">
                    <x-jet-label for="rt" :value="__('RT')" />
                    <x-jet-input wire:model="rt" id="rt" class="block w-full mt-1" type="number" name="rt" :value="old('rt')" required />
                    <x-jet-input-error for="rt" class="mt-2" />
                </div>

                <!-- Rw -->
                <div class="col-span-6 sm:col-span-1">
                    <x-jet-label for="rw" :value="__('RW')" />
                    <x-jet-input wire:model="rw" id="rw" class="block w-full mt-1" type="number" name="rw" :value="old('rw')" required />
                    <x-jet-input-error for="rw" class="mt-2" />
                </div>

                <!-- Desa -->
                <div class="col-span-6 sm:col-span-2">
                    <x-jet-label for="desa" :value="__('Desa')" />
                    <x-jet-input wire:model="desa" id="desa" class="block w-full mt-1" type="text" name="desa" :value="old('desa')" required />
                    <x-jet-input-error for="desa" class="mt-2" />
                </div>

                <!-- Kecamatan -->
                <div class="col-span-6 sm:col-span-2">
                    <x-jet-label for="kecamatan" :value="__('Kecamatan')" />
                    <x-jet-input wire:model="kecamatan" id="kecamatan" class="block w-full mt-1" type="text" name="kecamatan" :value="old('kecamatan')" required />
                    <x-jet-input-error for="kecamatan" class="mt-2" />
                </div>

                <!-- Kabupaten -->
                <div class="col-span-6 sm:col-span-2">
                    <x-jet-label for="kab" :value="__('Kabupaten')" />
                    <x-jet-input wire:model="kab" id="kab" class="block w-full mt-1" type="text" name="kab" :value="old('kab')" required />
                    <x-jet-input-error for="kab" class="mt-2" />
                </div>

                <!-- Provinsi -->
                <div class="col-span-6 sm:col-span-2">
                    <x-jet-label for="prov" :value="__('Provinsi')" />
                    <x-jet-input wire:model="prov" id="prov" class="block w-full mt-1" type="text" name="prov" :value="old('prov')" required />
                    <x-jet-input-error for="prov" class="mt-2" />
                </div>

                <!-- Kode Pos -->
                <div class="col-span-6 sm:col-span-2">
                    <x-jet-label for="kode_pos" :value="__('Kode Pos')" />
                    <x-jet-input wire:model="kode_pos" id="kode_pos" class="block w-full mt-1" type="number" name="kode_pos" :value="old('kode_pos')" required />
                    <x-jet-input-error for="kode_pos" class="mt-2" />
                </div>

            </div>

        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('paymentCreate')" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>

            <x-jet-button class="ml-2" wire:click="store" wire:loading.attr="disabled">
                {{ __('Simpan') }}
            </x-jet-button>
        </x-slot>

    </x-jet-dialog-modal>
</div>