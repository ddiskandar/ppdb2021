<x-jet-form-section submit="update">
    <x-slot name="title">
        {{ __('BTQ dan Bacaan Shalat') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Baca dan Tulis Al-Quran, Bacaan Shalat') }}
    </x-slot>

    <x-slot name="form">

        <!-- Asal Sekolah -->
        <div class="col-span-6 sm:col-span-5">
            <x-jet-label for="state.baca_quran" :value="__('Baca Al-Quran')" />
            <x-select wire:model.defer="state.baca_quran" id="state.baca_quran" name="state.baca_quran" autocomplete="state.baca_quran" class="block w-full px-3 mt-1">
                <option value="">{{ __('-- Pilih salah satu') }}</option>
                <option value="S">{{ __('(S) Lancar membaca, serta Istimewa dalam Lagam, Tajwid dan Makhrajnya') }}</option>
                <option value="A">{{ __('(A) Lancar membaca, serta baik dalam Tajwid dan Makhrajnya') }}</option>
                <option value="B">{{ __('(B) Lancar membaca, tapi kurang dalam Tajwid ATAU Makhrajnya') }}</option>
                <option value="C">{{ __('(C) Lancar membaca, tapi kurang dalam Tajwid DAN Makhrajnya') }}</option>
                <option value="D">{{ __('(D) Terbata-bata membaca') }}</option>
                <option value="E">{{ __('(E) Tidak bisa membaca') }}</option>

            </x-select>
            <x-jet-input-error for="state.baca_quran" class="mt-2" />
        </div>

        <!-- Asal Sekolah -->
        <div class="col-span-6 sm:col-span-5">
            <x-jet-label for="state.tulis_quran" :value="__('Tulis Al-Quran')" />
            <x-select wire:model.defer="state.tulis_quran" id="state.tulis_quran" name="state.tulis_quran" autocomplete="state.tulis_quran" class="block w-full px-3 mt-1">
                <option value="">{{ __('-- Pilih salah satu') }}</option>
                <option value="S">{{ __('(S) Istimewa, menguasai kaligrafi') }}</option>
                <option value="A">{{ __('(A) Rapi dan tepat menulis huruf, serta baik dalam sambungan serta syakalnya') }}</option>
                <option value="B">{{ __('(B) Rapi dan tepat menulis huruf, tapi kurang dalam sambungan ATAU syakalnya') }}</option>
                <option value="C">{{ __('(C) Rapi dan tepat menulis huruf, tapi kurang dalam sambungan DAN syakalnya') }}</option>
                <option value="D">{{ __('(D) Kurang rapi dan kurang tepat dalam menulis huruf') }}</option>
                <option value="E">{{ __('(E) Tidak bisa menulis') }}</option>
            </x-select>
            <x-jet-input-error for="state.tulis_quran" class="mt-2" />
        </div>

        <!-- Asal Sekolah -->
        <div class="col-span-6 sm:col-span-5">
            <x-jet-label for="state.bacaan_shalat" :value="__('Bacaan Shalat')" />
            <x-select wire:model.defer="state.bacaan_shalat" id="state.bacaan_shalat" name="state.bacaan_shalat" autocomplete="state.bacaan_shalat" class="block w-full px-3 mt-1">
                <option value="">{{ __('-- Pilih salah satu') }}</option>
                <option value="S">{{ __('(S) Istimewa') }}</option>
                <option value="A">{{ __('(A) Baik dalam bacaan, memahami hukum, dan gerakan shalat') }}</option>
                <option value="B">{{ __('(B) Baik dalam bacaan, tapi kurang memahami dalam hukum ATAU gerakan shalat') }}</option>
                <option value="C">{{ __('(C) Baik dalam bacaan, tapi tidak memahami hukum DAN gerakan shalat') }}</option>
                <option value="D">{{ __('(D) Kurang baik dalam bacaan shalat') }}</option>
                <option value="E">{{ __('(E) Tidak bisa bacaan shalat') }}</option>
            </x-select>
            <x-jet-input-error for="state.bacaan_shalat" class="mt-2" />
        </div>

    </x-slot>

    <x-slot name="actions">
        <x-jet-action-message class="mr-3" on="saved">
            {{ __('Berhasil disimpan.') }}
        </x-jet-action-message>

        <x-dirty-message class="mr-3" target="state.baca_quran, state.tulis_quran">
            {{ __('Belum disimpan!') }}
        </x-dirty-message>

        <x-jet-button>
            {{ __('Simpan') }}
        </x-jet-button>
    </x-slot>
</x-jet-form-section>