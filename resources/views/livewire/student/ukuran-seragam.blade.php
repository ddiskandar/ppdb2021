<x-jet-form-section submit="update">
    <x-slot name="title">
        {{ __('Ukuran Seragam') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Seragam PDU, Olahraga, dan Almamater') }}
    </x-slot>

    <x-slot name="form">

        <!-- PDU -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="state.pdu" :value="__('Ukuran seragam PDU')" />
            <x-select wire:model.defer="state.pdu" id="state.pdu" name="state.pdu" autocomplete="state.pdu" class="block w-full px-3 mt-1">
                <option value="">-- Pilih salah satu</option>
                <option value="S">S</option>
                <option value="M">M</option>
                <option value="L">L</option>
                <option value="XL">XL</option>
                <option value="XXL">XXL</option>
                <option value="XXXL">XXXL</option>
            </x-select>
            <x-jet-input-error for="state.pdu" class="mt-2" />
        </div>

        <!-- PDU -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="state.olahraga" :value="__('Ukuran seragam olahraga')" />
            <x-select wire:model.defer="state.olahraga" id="state.olahraga" name="state.olahraga" autocomplete="state.olahraga" class="block w-full px-3 mt-1">
                <option value="">-- Pilih salah satu</option>
                <option value="S">S</option>
                <option value="M">M</option>
                <option value="L">L</option>
                <option value="XL">XL</option>
                <option value="XXL">XXL</option>
                <option value="XXXL">XXXL</option>
            </x-select>
            <x-jet-input-error for="state.olahraga" class="mt-2" />
        </div>

        <!-- PDU -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="state.jas" :value="__('Ukuran seragam Jas Almamater')" />
            <x-select wire:model.defer="state.jas" id="state.jas" name="state.jas" autocomplete="state.jas" class="block w-full px-3 mt-1">
                <option value="">-- Pilih salah satu</option>
                <option value="S">S</option>
                <option value="M">M</option>
                <option value="L">L</option>
                <option value="XL">XL</option>
                <option value="XXL">XXL</option>
                <option value="XXXL">XXXL</option>
            </x-select>
            <x-jet-input-error for="state.jas" class="mt-2" />
        </div>

    </x-slot>

    <x-slot name="actions">
        <x-jet-action-message class="mr-3" on="saved">
            {{ __('Berhasil disimpan.') }}
        </x-jet-action-message>

        <x-dirty-message class="mr-3" target="state.pdu, state.olahraga, state.jas">
            {{ __('Belum disimpan!') }}
        </x-dirty-message>

        <x-jet-button>
            {{ __('Simpan') }}
        </x-jet-button>
    </x-slot>
</x-jet-form-section>