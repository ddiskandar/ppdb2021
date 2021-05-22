<x-jet-form-section submit="save">
    <x-slot name="title">
        {{ __('Pas Photo') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Mengenakan seragam asal sekolah') }}
    </x-slot>

    <x-slot name="form">

        <div class="col-span-4 sm:col-span-3">
            <div class="">
                @empty($student->user->photo)
                <img src="/images/default-photo.png" class="object-cover w-48 rounded shadow h-60" />
                @else
                <img src="{{ asset('storage/' . $student->user->photo) }}" class="object-cover w-48 rounded shadow h-60" />
                @endempty
            </div>
            <input wire:model.defer="photo" class="block w-full mt-4" type="file" />
            <x-jet-input-error for="photo" class="mt-2" />
            <x-jet-label wire:loading.remove wire.target="photo" for="photo" :value="__('Photo JPG, PNG. maksimal 1MB')" class="mt-2" />
            <x-jet-label wire:loading wire:target="photo" class="mt-2" :value="__('Uploading...')" />

        </div>


    </x-slot>

    <x-slot name="actions">
        <x-jet-action-message class="mr-3" on="saved">
            {{ __('Berhasil disimpan.') }}
        </x-jet-action-message>

        <x-dirty-message class="mr-3" target="">
            {{ __('Belum disimpan!') }}
        </x-dirty-message>

        <x-jet-button>
            {{ __('Simpan') }}
        </x-jet-button>
    </x-slot>
</x-jet-form-section>