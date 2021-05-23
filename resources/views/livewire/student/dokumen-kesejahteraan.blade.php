<x-jet-form-section submit="submit">
    <x-slot name="title">
        {{ __('Dokumen Kesejahteraan') }}
    </x-slot>

    <x-slot name="description">
        {{ __('File Photo JPG, PNG. ukuran maksimal 2 MB') }}
    </x-slot>

    <x-slot name="form">

        <div class="col-span-6 md:col-span-3">
            <div class="flex items-center justify-start">
                <x-jet-label :value="__('Kartu Keluarga Sejahtera')" />
                @if($document->kks)
                <a href="{{ asset('storage/' . $document->kks) }}" target="_blank" class="flex items-center ml-2 text-sm font-semibold text-green-600">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span class="ml-1">Sudah diunggah</span>
                </a>
                @else
                <div class="flex items-center ml-2 text-sm font-semibold text-red-600">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span class="ml-1">Belum diunggah</span>
                </div>
                @endif
            </div>

            <input wire:model.defer="kks" class="block w-full mt-4" type="file" />
            <x-jet-input-error for="kks" class="mt-2" />
            <x-jet-label :value="__('Nomor KKS')" class="mt-4" />
            <x-jet-input wire:model.defer="no_kks" class="block w-full mt-2" type="text" />
            <x-jet-input-error for="no_kks" class="mt-2" />

        </div>

        <div class="col-span-6 md:col-span-3">
            <x-jet-label wire:loading wire:target="kks" :value="__('Uploading...')" />
            @if ($kks)
            <x-jet-label wire:loading.remove wire:target="kks" :value="__('Preview')" />
            <img wire:loading.remove wire:target="kks" src="{{ $kks->temporaryUrl() }}" class="mt-4" />
            @endif
        </div>

        <div class="col-span-6">
            <x-jet-section-border />
        </div>

        <div class="col-span-6 md:col-span-3">
            <div class="flex items-center justify-start">
                <x-jet-label :value="__('Kartu Indonesia Pintar')" />
                @if($document->kip)
                <a href="{{ asset('storage/' . $document->kip) }}" target="_blank" class="flex items-center ml-2 text-sm font-semibold text-green-600">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span class="ml-1">Sudah diunggah</span>
                </a>
                @else
                <div class="flex items-center ml-2 text-sm font-semibold text-red-600">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span class="ml-1">Belum diunggah</span>
                </div>
                @endif
            </div>

            <input wire:model.defer="kip" class="block w-full mt-4" type="file" />
            <x-jet-input-error for="kip" class="mt-2" />
            <x-jet-label :value="__('Nomor KIP')" class="mt-4" />
            <x-jet-input wire:model.defer="no_kip" class="block w-full mt-2" type="text" />
            <x-jet-input-error for="no_kip" class="mt-2" />

        </div>

        <div class="col-span-6 md:col-span-3">
            <x-jet-label wire:loading wire:target="kip" :value="__('Uploading...')" />
            @if ($kip)
            <x-jet-label wire:loading.remove wire:target="kip" :value="__('Preview')" />
            <img wire:loading.remove wire:target="kip" src="{{ $kip->temporaryUrl() }}" class="mt-4" />
            @endif
        </div>

        <div class="col-span-6">
            <x-jet-section-border />
        </div>

        <div class="col-span-6 md:col-span-3">
            <div class="flex items-center justify-start">
                <x-jet-label :value="__('Kartu Indonesia Sehat')" />
                @if($document->kis)
                <a href="{{ asset('storage/' . $document->kis) }}" target="_blank" class="flex items-center ml-2 text-sm font-semibold text-green-600">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span class="ml-1">Sudah diunggah</span>
                </a>
                @else
                <div class="flex items-center ml-2 text-sm font-semibold text-red-600">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span class="ml-1">Belum diunggah</span>
                </div>
                @endif
            </div>

            <input wire:model.defer="kis" class="block w-full mt-4" type="file" />
            <x-jet-input-error for="kis" class="mt-2" />
            <x-jet-label :value="__('Nomor KIS')" class="mt-4" />
            <x-jet-input wire:model.defer="no_kis" class="block w-full mt-2" type="text" />
            <x-jet-input-error for="no_kis" class="mt-2" />

        </div>

        <div class="col-span-6 md:col-span-3">
            <x-jet-label wire:loading wire:target="kis" :value="__('Uploading...')" />
            @if ($kis)
            <x-jet-label wire:loading.remove wire:target="kis" :value="__('Preview')" />
            <img wire:loading.remove wire:target="kis" src="{{ $kis->temporaryUrl() }}" class="mt-4" />
            @endif
        </div>

        <div class="col-span-6">
            <x-jet-section-border />
        </div>

        <div class="col-span-6 md:col-span-3">
            <div class="flex items-center justify-start">
                <x-jet-label :value="__('Kartu Program Keluarga Harapan')" />
                @if($document->pkh)
                <a href="{{ asset('storage/' . $document->pkh) }}" target="_blank" class="flex items-center ml-2 text-sm font-semibold text-green-600">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span class="ml-1">Sudah diunggah</span>
                </a>
                @else
                <div class="flex items-center ml-2 text-sm font-semibold text-red-600">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span class="ml-1">Belum diunggah</span>
                </div>
                @endif
            </div>

            <input wire:model.defer="pkh" class="block w-full mt-4" type="file" />
            <x-jet-input-error for="pkh" class="mt-2" />
            <x-jet-label :value="__('Nomor PKH')" class="mt-4" />
            <x-jet-input wire:model.defer="no_pkh" class="block w-full mt-2" type="text" />
            <x-jet-input-error for="no_pkh" class="mt-2" />

        </div>

        <div class="col-span-6 md:col-span-3">
            <x-jet-label wire:loading wire:target="pkh" :value="__('Uploading...')" />
            @if ($pkh)
            <x-jet-label wire:loading.remove wire:target="pkh" :value="__('Preview')" />
            <img wire:loading.remove wire:target="pkh" src="{{ $pkh->temporaryUrl() }}" class="mt-4" />
            @endif
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