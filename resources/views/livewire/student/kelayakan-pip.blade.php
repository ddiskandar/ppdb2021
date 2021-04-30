<x-jet-form-section submit="update">
    <x-slot name="title">
        {{ __('Kelayakan PIP') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Deskripsi Keluarga dan Kelayakan PIP') }}
    </x-slot>

    <x-slot name="form">

        <!-- Pilihan Kelas -->
        <div class="col-span-6">
            <x-jet-label for="desc_keluarga" :value="__('Deskripsi Keluarga')" />
            <x-textarea wire:model.defer="desc_keluarga" id="desc_keluarga" rows="5" class="block w-full mt-1" maxlength=512></x-textarea>
            <x-jet-input-error for="desc_keluarga" class="mt-2" />
        </div>

        <!-- Pilihan Kelas -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="pip_id" :value="__('Pilihan Kelas')" />
            <x-select wire:model.defer="pip_id" id="pip_id" name="pip_id" autocomplete="pip_id" class="block w-full px-3 mt-1" required>
                @foreach($pips as $pip)
                <option value="{{ $pip->id }}">{{ $pip->name }}</option>
                @endforeach
            </x-select>
            <x-jet-input-error for="pip_id" class="mt-2" />
        </div>

    </x-slot>

    <x-slot name="actions">
        <x-jet-action-message class="mr-3" on="saved">
            {{ __('Berhasil disimpan.') }}
        </x-jet-action-message>

        <x-dirty-message class="mr-3" 
            target="desc_keluarga, pip_id" 
        />

        <x-jet-button>
            {{ __('Simpan') }}
        </x-jet-button>
    </x-slot>
</x-jet-form-section>