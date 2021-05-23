<x-jet-form-section submit="update">
    <x-slot name="title">
        {{ __('Gabung Grup') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Segera bergabung dengan menggunakan link untuk Info PPDB lainnya') }}
    </x-slot>

    <x-slot name="form">

        <!-- Pilihan Kelas -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="join_wa" :value="__('Pilihan Kelas')" />
            <x-select wire:model.defer="join_wa" id="join_wa" name="join_wa" autocomplete="join_wa" class="block w-full px-3 mt-1" required>
                <option value="0">Belum, saya belum gabung</option>
                <option value="1">Sudah, saya sudah gabung</option>
            </x-select>
            <x-jet-input-error for="join_wa" class="mt-2" />
        </div>

    </x-slot>

    <x-slot name="actions">
        <x-jet-action-message class="mr-3" on="saved">
            {{ __('Berhasil disimpan.') }}
        </x-jet-action-message>

        <x-dirty-message class="mr-3" target="join_wa">
            {{ __('Belum disimpan!') }}
        </x-dirty-message>

        <x-jet-button>
            {{ __('Simpan') }}
        </x-jet-button>
    </x-slot>
</x-jet-form-section>