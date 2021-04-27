<div>

    <x-jet-button wire:click="create" wire:loading.attr="disabled" class="ml-4">
        {{ __('Tambah Pendaftar') }}
    </x-jet-button>

    <!-- Delete User Confirmation Modal -->
    <x-jet-dialog-modal maxWidth="4xl" wire:model="studentCreate">
        <x-slot name="title">
            {{ __('Tambah Pendaftar') }}
        </x-slot>

        <form wire:submit.prevent="addNewStudent" method="POST">
            @csrf
            <x-slot name="content">
                <div class="grid grid-cols-6 gap-6">

                    <!-- Pilihan Kelas -->
                    <div class="col-span-6 sm:col-span-4">
                        <x-jet-label for="pilihan_kelas" :value="__('Pilihan Kelas')" />

                        <x-select wire:model.defer="pilihan_kelas" id="pilihan_kelas" name="pilihan_kelas" autocomplete="pilihan_kelas" class="block w-full px-3 mt-1" required>
                            <option value="">{{ __('-- Pilih salah-satu') }}</option>
                            <option value="0">{{ __('Regular') }}</option>
                            <option value="1">{{ __('Boarding') }}</option>
                        </x-select>
                    </div>

                    <!-- Name -->
                    <div class="col-span-6 sm:col-span-4">
                        <x-jet-label for="name" :value="__('Name')" />

                        <x-jet-input wire:model.defer="name" id="name" class="block w-full mt-1" type="text" name="name" :value="old('name')" required autofocus />
                    </div>

                    <!-- Jenis Kelamin -->
                    <div class="col-span-6 sm:col-span-2">
                        <x-jet-label for="jk" :value="__('Jenis Kelamin')" />

                        <x-select wire:model.defer="jk" id="jk" name="jk" autocomplete="jk" class="block w-full px-3 mt-1" required>
                            <option value="">{{ __('-- Pilih salah-satu') }}</option>
                            <option value="L">{{ __('Laki-laki') }}</option>
                            <option value="P">{{ __('Perempuan') }}</option>
                        </x-select>
                    </div>

                    <!-- Email Address -->
                    <div class="col-span-6 sm:col-span-3">
                        <x-jet-label for="nisn" :value="__('NISN')" />
                        <x-jet-input wire:model.defer="nisn" id="nisn" class="block w-full mt-1" type="text" name="nisn" :value="old('nisn')" />
                    </div>

                    <!-- Email Address -->
                    <div class="col-span-6 sm:col-span-3">
                        <x-jet-label for="phone" :value="__('Nomor HP/Whatsapp')" />
                        <x-jet-input id="phone" wire:model.defer="phone" class="block w-full mt-1" type="text" name="phone" :value="old('phone')" required />
                    </div>

                    <!-- Asal Sekolah -->
                    <div class="col-span-6 sm:col-span-4">
                        <x-jet-label for="school_id" :value="__('Asal Sekolah')" />
                        <select wire:model.defer="school_id" id="school_id" name="school_id" class="block w-full mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 " required>
                            <option value="">{{ __('-- Pilih salah satu') }}</option>
                            @foreach ($schools as $school )
                            <option value={{ $school->id }}>{{ $school->name }}</option>
                            @endforeach
                        </select>

                    </div>

                    <!-- Email Address -->
                    <div class="col-span-6 sm:col-span-3">
                        <x-jet-label for="ayah_nama" :value="__('Nama Ayah Kandung')" />
                        <x-jet-input wire:model.defer="ayah_nama" id="ayah_nama" class="block w-full mt-1" type="text" name="ayah_nama" :value="old('ayah_nama')" required />
                    </div>

                    <!-- Email Address -->
                    <div class="col-span-6 sm:col-span-3">
                        <x-jet-label for="ibu_nama" :value="__('Nama Ibu Kandung')" />
                        <x-jet-input wire:model.defer="ibu_nama" id="ibu_nama" class="block w-full mt-1" type="text" name="ibu_nama" :value="old('ibu_nama')" required />
                    </div>

                    <!-- Email Address -->
                    <div class="col-span-6 sm:col-span-4">
                        <x-jet-label for="address" :value="__('Alamat Kampung / Jalan')" />
                        <x-jet-input wire:model.defer="address" id="address" class="block w-full mt-1" type="text" name="address" :value="old('address')" required />
                    </div>

                    <!-- Email Address -->
                    <div class="col-span-6 sm:col-span-2">
                        <x-jet-label for="rt" :value="__('RT')" />
                        <x-jet-input wire:model.defer="rt" id="rt" class="block w-full mt-1" type="text" name="rt" :value="old('rt')" required />
                    </div>

                    <!-- Email Address -->
                    <div class="col-span-6 sm:col-span-2">
                        <x-jet-label for="rw" :value="__('RW')" />
                        <x-jet-input wire:model.defer="rw" id="rw" class="block w-full mt-1" type="text" name="rw" :value="old('rw')" required />
                    </div>

                    <!-- Email Address -->
                    <div class="col-span-6 sm:col-span-2">
                        <x-jet-label for="desa" :value="__('Desa')" />
                        <x-jet-input wire:model.defer="desa" id="desa" class="block w-full mt-1" type="text" name="desa" :value="old('desa')" required />
                    </div>

                    <!-- Email Address -->
                    <div class="col-span-6 sm:col-span-2">
                        <x-jet-label for="kecamatan" :value="__('Kecamatan')" />
                        <x-jet-input wire:model.defer="kecamatan" id="kecamatan" class="block w-full mt-1" type="text" name="kecamatan" :value="old('kecamatan')" required />
                    </div>

                    <!-- Email Address -->
                    <div class="col-span-6 sm:col-span-2">
                        <x-jet-label for="kab" :value="__('Kabupaten')" />
                        <x-jet-input wire:model.defer="kab" id="kab" class="block w-full mt-1" type="text" name="kab" :value="old('kab')" required />
                    </div>

                    <!-- Email Address -->
                    <div class="col-span-6 sm:col-span-2">
                        <x-jet-label for="prov" :value="__('Provinsi')" />
                        <x-jet-input wire:model.defer="prov" id="prov" class="block w-full mt-1" type="text" name="prov" :value="old('prov')" required />
                    </div>

                </div>

            </x-slot>

            <x-slot name="footer">
                <x-jet-secondary-button wire:click="$toggle('studentCreate')" wire:loading.attr="disabled">
                    {{ __('Cancel') }}
                </x-jet-secondary-button>

                <x-jet-button class="ml-2" wire:click="store" wire:loading.attr="disabled">
                    {{ __('Simpan') }}
                </x-jet-button>
            </x-slot>

        </form>
    </x-jet-dialog-modal>
</div>