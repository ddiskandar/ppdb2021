<x-jet-form-section submit="update">
    <x-slot name="title">
        {{ __('Pleno') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Hasil pleno jurusan lulus untuk siswa') }}
    </x-slot>

    <x-slot name="form">

        <!-- Pilihan Kelas -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="state.pilihan_lulus" :value="__('Lulus pada jurusan ')" />
            <x-select wire:model.defer="state.pilihan_lulus" id="state.pilihan_lulus" name="state.pilihan_lulus" autocomplete="state.pilihan_lulus" class="block w-full px-3 mt-1" required>
                <option value="">{{ __('-- Pilih salah-satu') }}</option>
                <option value="1">Multimedia</option>
                <option value="2">Bisnis Daring dan Pemasaran</option>
                <option value="3">Agribisnis Pengolahan Hasil Pertanian</option>
            </x-select>
            <x-jet-input-error for="state.pilihan_lulus" class="mt-2" />

        </div>

    </x-slot>

    <x-slot name="actions">
        <x-jet-action-message class="mr-3" on="saved">
            {{ __('Berhasil disimpan.') }}
        </x-jet-action-message>

        <x-dirty-message class="mr-3" target="state.pilihan_kelas, state.pilihan_lulus, state.pilihan_dua">
            {{ __('Belum disimpan!') }}
        </x-dirty-message>

        <x-jet-button>
            {{ __('Simpan') }}
        </x-jet-button>
    </x-slot>
</x-jet-form-section>