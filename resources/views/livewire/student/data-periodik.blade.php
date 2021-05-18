<x-jet-form-section submit="update">
    <x-slot name="title">
        {{ __('Data Periodik') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Tinggi badan, berat badan, jarak') }}
    </x-slot>

    <x-slot name="form">

        <div class="col-span-6 sm:col-span-2">
            <x-jet-label for="state.tinggi" :value="__('Tinggi badan')" />
            <div class="relative">
                <x-jet-input wire:model.defer="state.tinggi" id="state.tinggi" class="block w-full mt-1" type="number" name="state.tinggi" :value="old('state.tinggi')" />
                <span class="absolute inset-y-0 right-0 inline-flex items-center mr-4 text-sm text-gray-600">
                    cm
                </span>
            </div>
            <x-jet-input-error for="state.tinggi" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-2">
            <x-jet-label for="state.berat" :value="__('Berat badan')" />
            <div class="relative">
                <x-jet-input wire:model.defer="state.berat" id="state.berat" class="block w-full mt-1" type="number" name="state.berat" :value="old('state.berat')" />
                <span class="absolute inset-y-0 right-0 inline-flex items-center mr-4 text-sm text-gray-600">
                    Kg
                </span>

            </div>
            <x-jet-input-error for="state.berat" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-2">
            <x-jet-label for="state.lingkar_kepala" :value="__('Lingkar kepala')" />
            <x-jet-input wire:model.defer="state.lingkar_kepala" id="state.lingkar_kepala" class="block w-full mt-1" type="number" name="state.lingkar_kepala" :value="old('state.lingkar_kepala')" />
            <x-jet-input-error for="state.lingkar_kepala" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-3">
            <x-jet-label for="state.jarak" :value="__('Jarak tempat tinggal ke sekolah')" />
            <div class="relative">
                <x-jet-input wire:model.defer="state.jarak" id="state.jarak" class="block w-full mt-1" type="number" name="state.jarak" :value="old('state.jarak')" />
                <span class="absolute inset-y-0 right-0 inline-flex items-center mr-4 text-sm text-gray-600">
                    Km
                </span>
            </div>
            <x-jet-input-error for="state.jarak" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-3">
            <x-jet-label for="state.waktu" :value="__('Waktu tempuh ke sekolah')" />
            <div class="relative">
                <x-jet-input wire:model.defer="state.waktu" id="state.waktu" class="block w-full mt-1" type="number" name="state.waktu" :value="old('state.waktu')" />
                <span class="absolute inset-y-0 right-0 inline-flex items-center mr-4 text-sm text-gray-600">
                    menit
                </span>
            </div>
            <x-jet-input-error for="state.waktu" class="mt-2" />
        </div>

    </x-slot>

    <x-slot name="actions">
        <x-jet-action-message class="mr-3" on="saved">
            {{ __('Berhasil disimpan.') }}
        </x-jet-action-message>

        <x-dirty-message class="mr-3" target="state.waktu, state.jarak, state.lingkar_kepala, state.berat, state.tinggi">
            {{ __('Belum disimpan!') }}
        </x-dirty-message>

        <x-jet-button>
            {{ __('Simpan') }}
        </x-jet-button>
    </x-slot>
</x-jet-form-section>