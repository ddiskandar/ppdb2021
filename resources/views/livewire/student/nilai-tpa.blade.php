<x-jet-form-section submit="update">
    <x-slot name="title">
        {{ __('Test Potensi Akademik') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Ujian Tulis dan Menggambar') }}
    </x-slot>

    <x-slot name="form">

        <!-- Nama Lengkap -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="state.tpa" :value="__('Nilai Hasil Test Tulis')" />
            <x-jet-input wire:model.defer="state.tpa" id="state.tpa" class="block w-full mt-1 uppercase" type="number" name="name" :value="old('state.tpa')" />
            <x-jet-input-error for="state.tpa" class="mt-2" />
        </div>

        <!-- Asal Sekolah -->
        <div class="col-span-6 sm:col-span-5">
            <x-jet-label for="state.gambar" :value="__('Menggambar')" />
            <x-select wire:model.defer="state.gambar" id="state.gambar" name="state.gambar" autocomplete="state.gambar" class="block w-full px-3 mt-1">
                <option value="">{{ __('-- Pilih salah satu') }}</option>
                <option value="S">{{ __('(S)') }}</option>
                <option value="A">{{ __('(A)') }}</option>
                <option value="B">{{ __('(B)') }}</option>
                <option value="C">{{ __('(C)') }}</option>
                <option value="D">{{ __('(D)') }}</option>
                <option value="E">{{ __('(E)') }}</option>
            </x-select>
            <x-jet-input-error for="state.gambar" class="mt-2" />
        </div>

    </x-slot>

    <x-slot name="actions">
        <x-jet-action-message class="mr-3" on="saved">
            {{ __('Berhasil disimpan.') }}
        </x-jet-action-message>

        <x-dirty-message class="mr-3" target="state.gambar">
            {{ __('Belum disimpan!') }}
        </x-dirty-message>

        <x-jet-button>
            {{ __('Simpan') }}
        </x-jet-button>
    </x-slot>
</x-jet-form-section>