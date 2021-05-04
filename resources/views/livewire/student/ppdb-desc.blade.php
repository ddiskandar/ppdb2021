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
            <x-jet-label for="state.motivasi_smk" :value="__('Apa motivasi ananda melanjutkan pendidikan di SMK dan memilih SMK Plus Al-Farhan ?')" />
            <x-textarea wire:model.defer="state.motivasi_smk" id="state.motivasi_smk" rows="5" class="block w-full mt-1" maxlength=512></x-textarea>
            <x-jet-input-error for="state.motivasi_smk" class="mt-2" />
        </div>

        <!-- Pilihan Kelas -->
        <div class="col-span-6">
            <x-jet-label for="state.motivasi_jurusan" :value="__('Apa motivasi ananda memilih jurusan dan apa yang ananda ketahui mengenai pilihan jurusannya?')" />
            <x-textarea wire:model.defer="state.motivasi_jurusan" id="state.motivasi_jurusan" rows="5" class="block w-full mt-1" maxlength=512></x-textarea>
            <x-jet-input-error for="state.motivasi_jurusan" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="state.tool_id" :value="__('Apakah ananda ada alat elektronik yang bisa digunakan?')" />
            <x-select wire:model.defer="state.tool_id" id="state.tool_id" name="state.tool_id" autocomplete="state.tool_id" class="block w-full px-3 mt-1">
                @foreach($tools as $tool)
                <option value="{{ $tool->id }}">{{ $tool->name }}</option>
                @endforeach
            </x-select>
            <x-jet-input-error for="state.tool_id" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="state.info_id" :value="__('Pertamakali mendapat info SMK Plus Al-Farhan dari')" />
            <x-select wire:model.defer="state.info_id" id="state.info_id" name="state.info_id" autocomplete="state.info_id" class="block w-full px-3 mt-1">
                @foreach($infos as $info)
                <option value="{{ $info->id }}">{{ $info->name }}</option>
                @endforeach
            </x-select>
            <x-jet-input-error for="state.info_id" class="mt-2" />
        </div>

    </x-slot>

    <x-slot name="actions">
        <x-jet-action-message class="mr-3" on="saved">
            {{ __('Berhasil disimpan.') }}
        </x-jet-action-message>

        <x-dirty-message class="mr-3" target="state.motivasi_smk, state.motivasi_jurusan, state.tool_id, state.info_id">
            {{ __('Belum disimpan!') }}
        </x-dirty-message>

        <x-jet-button>
            {{ __('Simpan') }}
        </x-jet-button>
    </x-slot>
</x-jet-form-section>