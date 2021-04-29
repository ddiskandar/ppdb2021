<x-jet-form-section submit="update">
    <x-slot name="title">
        {{ __('Penerimaan Peserta Didik Baru') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Mengenai motivasi peserta didik') }}
    </x-slot>

    <x-slot name="form">

        <!-- Pilihan Kelas -->
        <div class="col-span-6">
            <x-jet-label for="desc_student" :value="__('Apa motivasi ananda melanjutkan pendidikan di SMK dan memilih SMK Plus Al-Farhan ?')" />
            <x-textarea wire:model="desc_student" id="desc_student" rows="5" class="block w-full mt-1" maxlength=512></x-textarea>
            <x-jet-input-error for="desc_student" class="mt-2" />
        </div>

        <!-- Pilihan Kelas -->
        <div class="col-span-6">
            <x-jet-label for="desc_student" :value="__('Apa motivasi ananda memilih jurusan dan apa yang ananda ketahui mengenai pilihan jurusannya?')" />
            <x-textarea wire:model="desc_student" id="desc_student" rows="5" class="block w-full mt-1" maxlength=512></x-textarea>
            <x-jet-input-error for="desc_student" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="state.pdu" :value="__('Apakah ananda ada alat elektronik yang bisa digunakan?')" />
            <x-select wire:model="state.pdu" id="state.pdu" name="state.pdu" autocomplete="state.pdu" class="block w-full px-3 mt-1">
                <option value="">-- Pilih salah satu</option>
                <option value="1">Tidak ada sama sekali</option>
                <option value="2">Belum ada, namun mempunyai rencana untuk membeli</option>
                <option value="3">Ada HP</option>
                <option value="4">Ada HP dan Kamera</option>
                <option value="5">Ada Komputer PC/Laptop</option>
                <option value="6">Ada HP, Kamera, Komputer PC/Laptop</option>
            </x-select>
            <x-jet-input-error for="state.pdu" class="mt-2" />
        </div>
        
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="state.pdu" :value="__('Pertamakali mendapat info SMK Plus Al-Farhan dari')" />
            <x-select wire:model="state.pdu" id="state.pdu" name="state.pdu" autocomplete="state.pdu" class="block w-full px-3 mt-1">
                <option value="">-- Pilih salah satu</option>
                <option value="1">Media Sosial Facebook, Instagram, Youtube</option>
                <option value="1">Baligho/Spanduk/Brosur</option>
                <option value="2">Ajakan teman</option>
                <option value="3">Ajakan wali kelas di sekolah SMP/MTs</option>
                <option value="4">Keinginan sendiri</option>
            </x-select>
            <x-jet-input-error for="state.pdu" class="mt-2" />
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