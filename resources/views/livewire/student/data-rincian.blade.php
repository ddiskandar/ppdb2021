<x-jet-form-section submit="update">
    <x-slot name="title">
        {{ __('Data Rincian') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Hobi, Cita-cita, dan Prestasi yang pernah diraih') }}
    </x-slot>

    <x-slot name="form">

        <!-- Hobby -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="state.hobby_id" :value="__('Hobby')" />
            <x-select wire:model.defer="state.hobby_id" id="state.hobby_id" name="state.hobby_id" autocomplete="state.hobby_id" class="block w-full px-3 mt-1" required>
                @foreach($hobbies as $hobby)
                <option value="{{ $hobby->id }}">{{ $hobby->name }}</option>
                @endforeach
            </x-select>
            <x-jet-input-error for="state.hobby_id" class="mt-2" />
        </div>

        <!-- Cita-cita -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="state.ideals_id" :value="__('Cita-cita')" />
            <x-select wire:model.defer="state.ideals_id" id="state.ideals_id" name="state.ideals_id" autocomplete="state.ideals_id" class="block w-full px-3 mt-1" required>
                @foreach($ideals as $ideal)
                <option value="{{ $ideal->id }}">{{ $ideal->name }}</option>
                @endforeach
            </x-select>
            <x-jet-input-error for="state.ideals_id" class="mt-2" />
        </div>

        <!-- Pilihan Kelas -->
        <div class="col-span-6">
            <x-jet-label for="state.prestasi" :value="__('Prestasi yang pernah diraih')" />
            <x-textarea wire:model.defer="state.prestasi" id="state.prestasi" rows="5" class="block w-full mt-1" maxlength=512></x-textarea>
            <x-jet-input-error for="state.prestasi" class="mt-2" />
        </div>

    </x-slot>

    <x-slot name="actions">
        <x-jet-action-message class="mr-3" on="saved">
            {{ __('Berhasil disimpan.') }}
        </x-jet-action-message>

        <x-dirty-message class="mr-3" target="state.hobby_id, state.ideals_id, state.prestasi">
            {{ __('Belum disimpan!') }}
        </x-dirty-message>

        <x-jet-button>
            {{ __('Simpan') }}
        </x-jet-button>
    </x-slot>
</x-jet-form-section>