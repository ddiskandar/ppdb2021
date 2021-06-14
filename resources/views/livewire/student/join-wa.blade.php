<x-jet-form-section submit="update">
    <x-slot name="title">
        {{ __('Gabung Grup') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Segera bergabung dengan menggunakan link untuk Info PPDB lainnya') }}
    </x-slot>

    <x-slot name="form">

        <!-- NO HP / Whatsapp -->
        <div class="col-span-6 sm:col-span-3">
            <x-jet-label for="phone" :value="__('Nomor HP/Whatsapp')" />
            <x-jet-input maxlength="13" id="phone" wire:model.defer="phone" class="block w-full mt-1" type="text" name="phone" :value="old('phone')" />
            <x-jet-input-error for="phone" class="mt-2" />
        </div>

        @role('student')
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="" :value="__('Link Grup WA')" />
            <a href="https://chat.whatsapp.com/GBq6KDPq1MBDYDSKGtr67O" target="_blank">
                <x-jet-secondary-button class="mt-2">
                    Klik disini untuk bergabung
                </x-jet-secondary-button>
            </a>
        </div>
        @endrole

        <!-- Pilihan Kelas -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="join_wa" :value="__('Gabung Grup')" />
            <x-select wire:model.defer="join_wa" id="join_wa" name="join_wa" autocomplete="join_wa" class="block w-full px-3 mt-1" required>
                <option value=false>Belum</option>
                <option value=true>Sudah</option>
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