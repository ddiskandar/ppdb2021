<x-jet-form-section submit="update">
    <x-slot name="title">
        {{ __('Deskripsi Peserta Didik') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Deskripsi mengenai peserta didik') }}
    </x-slot>

    <x-slot name="form">

        <!-- Pilihan Kelas -->
        <div class="col-span-6">
            <x-jet-label for="desc_student" :value="__('Deskripsi peserta didik')" />
            <x-textarea wire:model="desc_student" id="desc_student" rows="5" class="block w-full mt-1" maxlength=512></x-textarea>
            <x-jet-input-error for="desc_student" class="mt-2" />
        </div>

    </x-slot>

    <x-slot name="actions">
        <x-jet-action-message class="mr-3" on="saved">
            {{ __('Berhasil disimpan.') }}
        </x-jet-action-message>

        <x-jet-button>
            {{ __('Simpan') }}
        </x-jet-button>
    </x-slot>
</x-jet-form-section>