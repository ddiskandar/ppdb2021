<x-jet-form-section submit="submitBerkas">
    <x-slot name="title">
        {{ __('Dokumen') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Akta kelahiran, Kartu keluarga, Surat Keterangan Lulus, Ijazah') }}
    </x-slot>

    <x-slot name="form">
        <div class="col-span-4">
            <div class="relative block overflow-hidden ">
                <div class="flex items-center pb-4">
                    <x-jet-label for="akta" value="{{ __('Akta Kelahiran') }}" class="mr-3" content="required" />
                </div>

            </div>

            <div class="">
                <input wire:model.defer="akta" id="akta" type="file" class="" />
                <x-jet-input-error for="akta" class="mt-2" />
            </div>

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