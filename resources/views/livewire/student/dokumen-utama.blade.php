<x-jet-form-section submit="submit">
    <x-slot name="title">
        {{ __('Dokumen Utama') }}
    </x-slot>

    <x-slot name="description">
        {{ __('File Photo JPG, PNG. ukuran maksimal 2 MB') }}
    </x-slot>

    <x-slot name="form">

        <div class="col-span-6 md:col-span-3">
            <div class="flex items-center justify-start">
                <x-jet-label :value="__('Kartu Keluarga')" />
                @if($document->kartu_keluarga)
                <a href="{{ asset('storage/' . $document->kartu_keluarga) }}" target="_blank" class="flex items-center ml-2 text-sm font-semibold text-green-600">
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

            <input wire:model.defer="kartu_keluarga" class="block w-full mt-4" type="file" />
            <x-jet-input-error for="kartu_keluarga" class="mt-2" />
        </div>

        <div class="col-span-6 md:col-span-3">
            <x-jet-label wire:loading wire:target="kartu_keluarga" :value="__('Uploading...')" />
            @if ($kartu_keluarga)
            <x-jet-label wire:loading.remove wire:target="kartu_keluarga" :value="__('Preview')" />
            <img wire:loading.remove wire:target="kartu_keluarga" src="{{ $kartu_keluarga->temporaryUrl() }}" class="mt-4" />
            @endif
        </div>

        <div class="col-span-6">
            <x-jet-section-border />
        </div>

        <div class="col-span-6 md:col-span-3">
            <div class="flex items-center justify-start">
                <x-jet-label :value="__('Akta Kelahiran')" />
                @if($document->akta)
                <a href="{{ asset('storage/' . $document->akta) }}" target="_blank" class="flex items-center ml-2 text-sm font-semibold text-green-600">
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

            <input wire:model.defer="akta" class="block w-full mt-4" type="file" />
            <x-jet-input-error for="akta" class="mt-2" />
        </div>

        <div class="col-span-6 md:col-span-3">
            <x-jet-label wire:loading wire:target="akta" :value="__('Uploading...')" />
            @if ($akta)
            <x-jet-label wire:loading.remove wire:target="akta" :value="__('Preview')" />
            <img wire:loading.remove wire:target="akta" src="{{ $akta->temporaryUrl() }}" class="mt-4" />
            @endif
        </div>

        <div class="col-span-6">
            <x-jet-section-border />
        </div>

        <div class="col-span-6 md:col-span-3">
            <div class="flex items-center justify-start">
                <x-jet-label :value="__('Surat Keterangan Lulus')" />
                @if($document->skl)
                <a href="{{ asset('storage/' . $document->skl) }}" target="_blank" class="flex items-center ml-2 text-sm font-semibold text-green-600">
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

            <input wire:model.defer="skl" class="block w-full mt-4" type="file" />
            <x-jet-input-error for="skl" class="mt-2" />
        </div>

        <div class="col-span-6 md:col-span-3">
            <x-jet-label wire:loading wire:target="skl" :value="__('Uploading...')" />
            @if ($skl)
            <x-jet-label wire:loading.remove wire:target="skl" :value="__('Preview')" />
            <img wire:loading.remove wire:target="skl" src="{{ $skl->temporaryUrl() }}" class="mt-4" />
            @endif
        </div>

        <div class="col-span-6">
            <x-jet-section-border />
        </div>

        <div class="col-span-6 md:col-span-3">
            <div class="flex items-center justify-start">
                <x-jet-label :value="__('Ijazah')" />
                @if($document->ijazah)
                <a href="{{ asset('storage/' . $document->ijazah) }}" target="_blank" class="flex items-center ml-2 text-sm font-semibold text-green-600">
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

            <input wire:model.defer="ijazah" class="block w-full mt-4" type="file" />
            <x-jet-input-error for="ijazah" class="mt-2" />
            <x-jet-label :value="__('Nomor Ijazah')" class="mt-4" />
            <x-jet-input wire:model.defer="nomor_ijazah" class="block w-full mt-2" type="text" />
            <x-jet-input-error for="nomor_ijazah" class="mt-2" />

        </div>

        <div class="col-span-6 md:col-span-3">
            <x-jet-label wire:loading wire:target="ijazah" :value="__('Uploading...')" />
            @if ($ijazah)
            <x-jet-label wire:loading.remove wire:target="ijazah" :value="__('Preview')" />
            <img wire:loading.remove wire:target="ijazah" src="{{ $ijazah->temporaryUrl() }}" class="mt-4" />
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