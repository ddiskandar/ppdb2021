<x-jet-form-section submit="update">
    <x-slot name="title">
        {{ __('Data Sekolah Asal') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Pastikan memilih sekolah sesuai daftar. bila tidak ada pilih Lainnya') }}
    </x-slot>

    <x-slot name="form">

        <!-- Asal Sekolah -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="schoolId" :value="__('Asal Sekolah')" />
            <x-select wire:model.defer="schoolId" id="schoolId" name="schoolId" autocomplete="schoolId" class="block w-full px-3 mt-1" required>
                <option value="">{{ __('-- Pilih salah-satu') }}</option>
                @foreach($schools as $school)
                <option value="{{ $school->id }}">{{ $school->name }}</option>
                @endforeach
            </x-select>
            <x-jet-input-error for="schoolId" class="mt-2" />
        </div>

        @if($schoolId == '1')
        <!-- Nama Asal sekolah temp-->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="school_temp" :value="__('Nama Asal Sekolah')" />
            <x-jet-input wire:model.defer="school_temp" id="school_temp" class="block w-full mt-1" type="text" name="school_temp" :value="old('school_temp')" required />
            <x-jet-input-error for="school_temp" class="mt-2" />
        </div>
        @endif

    </x-slot>

    <x-slot name="actions">
        <x-jet-action-message class="mr-3" on="saved">
            {{ __('Berhasil disimpan.') }}
        </x-jet-action-message>

        <x-dirty-message class="mr-3" target="schoolId, school_temp">
            {{ __('Belum disimpan!') }}
        </x-dirty-message>

        <x-jet-button>
            {{ __('Simpan') }}
        </x-jet-button>
    </x-slot>
</x-jet-form-section>