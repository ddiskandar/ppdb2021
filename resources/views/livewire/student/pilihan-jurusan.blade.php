<x-jet-form-section submit="update">
    <x-slot name="title">
        {{ __('Pilihan Kelas dan Jurusan') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Pilihan kelas, jurusan pertama dan kedua') }}
    </x-slot>

    <x-slot name="form">

        <!-- Pilihan Kelas -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="pilihan_kelas" :value="__('Pilihan Kelas')" />
            <x-select wire:model="pilihan_kelas" id="pilihan_kelas" name="pilihan_kelas" autocomplete="pilihan_kelas" class="block w-full px-3 mt-1" required>
                <option value="">{{ __('-- Pilih salah-satu') }}</option>
                <option value="0">Regular</option>
                <option value="1">Boarding / Pesantren</option>
            </x-select>
            <x-jet-input-error for="pilihan_kelas" class="mt-2" />
        </div>

        <!-- Pilihan Kelas -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="pilihan_satu" :value="__('Pilihan Jurusan Pertama')" />
            <x-select wire:model="pilihan_satu" id="pilihan_satu" name="pilihan_satu" autocomplete="pilihan_satu" class="block w-full px-3 mt-1" required>
                <option value="">{{ __('-- Pilih salah-satu') }}</option>
                <option value="1">Multimedia</option>
                <option value="2">Bisnis Daring dan Pemasaran</option>
                <option value="3">Agribisnis Pengolahan Hasil Pertanian</option>
            </x-select>
            <x-jet-input-error for="pilihan_satu" class="mt-2" />
        </div>

        <!-- Pilihan Kelas -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="pilihan_dua" :value="__('Pilihan Jurusan Kedua')" />
            <x-select wire:model="pilihan_dua" id="pilihan_dua" name="pilihan_dua" autocomplete="pilihan_dua" class="block w-full px-3 mt-1" required>
                <option value="">{{ __('-- Pilih salah-satu') }}</option>
                <option value="1">Multimedia</option>
                <option value="2">Bisnis Daring dan Pemasaran</option>
                <option value="3">Agribisnis Pengolahan Hasil Pertanian</option>
            </x-select>
            <x-jet-input-error for="pilihan_dua" class="mt-2" />
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