<x-jet-form-section submit="update">
    <x-slot name="title">
        {{ __('Ukuran Seragam') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Seragam PDU, Olahraga, dan Almamater') }}
    </x-slot>

    <x-slot name="form">

        <!-- PDU -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="state.pdu" :value="__('Ukuran seragam PDU')" />
            @can ('edit ukuran seragam')
            <x-select wire:model.defer="state.pdu" id="state.pdu" name="state.pdu" autocomplete="state.pdu" class="block w-full px-3 mt-1">
                <option value="">-- Pilih salah satu</option>
                <option value="S">S</option>
                <option value="M">M</option>
                <option value="L">L</option>
                <option value="XL">XL</option>
                <option value="XXL">XXL</option>
                <option value="XXXL">XXXL</option>
            </x-select>
            <x-jet-input-error for="state.pdu" class="mt-2" />
            @else

            @if ($state['pdu'])
            <span class="inline-flex items-center px-2 text-xs font-semibold leading-5 text-green-800 bg-green-100 rounded-full">
                <span class="w-2 h-2 mr-2 bg-green-600 rounded-full"></span>
                <span>{{ $state['pdu'] }}</span>
            </span>
            @else
            <span class="inline-flex items-center px-2 text-xs font-semibold leading-5 text-red-800 bg-red-100 rounded-full">
                <span class="w-2 h-2 mr-2 bg-red-600 rounded-full"></span>
                <span>Belum pengukuran</span>
            </span>
            @endif

            @endcan
        </div>

        <!-- PDU -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="state.olahraga" :value="__('Ukuran seragam olahraga')" />
            @can ('edit ukuran seragam')
            <x-select wire:model.defer="state.olahraga" id="state.olahraga" name="state.olahraga" autocomplete="state.olahraga" class="block w-full px-3 mt-1">
                <option value="">-- Pilih salah satu</option>
                <option value="S">S</option>
                <option value="M">M</option>
                <option value="L">L</option>
                <option value="XL">XL</option>
                <option value="XXL">XXL</option>
                <option value="XXXL">XXXL</option>
            </x-select>
            <x-jet-input-error for="state.olahraga" class="mt-2" />
            @else

            @if ($state['olahraga'])
            <span class="inline-flex items-center px-2 text-xs font-semibold leading-5 text-green-800 bg-green-100 rounded-full">
                <span class="w-2 h-2 mr-2 bg-green-600 rounded-full"></span>
                <span>{{ $state['olahraga'] }}</span>
            </span>
            @else
            <span class="inline-flex items-center px-2 text-xs font-semibold leading-5 text-red-800 bg-red-100 rounded-full">
                <span class="w-2 h-2 mr-2 bg-red-600 rounded-full"></span>
                <span>Belum pengukuran</span>
            </span>
            @endif

            @endcan
        </div>

        <!-- PDU -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="state.jas" :value="__('Ukuran seragam Jas Almamater')" />
            @can ('edit ukuran seragam')
            <x-select wire:model.defer="state.jas" id="state.jas" name="state.jas" autocomplete="state.jas" class="block w-full px-3 mt-1">
                <option value="">-- Pilih salah satu</option>
                <option value="S">S</option>
                <option value="M">M</option>
                <option value="L">L</option>
                <option value="XL">XL</option>
                <option value="XXL">XXL</option>
                <option value="XXXL">XXXL</option>
            </x-select>
            <x-jet-input-error for="state.jas" class="mt-2" />
            @else

            @if ($state['jas'])
            <span class="inline-flex items-center px-2 text-xs font-semibold leading-5 text-green-800 bg-green-100 rounded-full">
                <span class="w-2 h-2 mr-2 bg-green-600 rounded-full"></span>
                <span>{{ $state['jas'] }}</span>
            </span>
            @else
            <span class="inline-flex items-center px-2 text-xs font-semibold leading-5 text-red-800 bg-red-100 rounded-full">
                <span class="w-2 h-2 mr-2 bg-red-600 rounded-full"></span>
                <span>Belum pengukuran</span>
            </span>
            @endif

            @endcan
        </div>

    </x-slot>

    @can ('edit ukuran seragam')
    <x-slot name="actions">
        <x-jet-action-message class="mr-3" on="saved">
            {{ __('Berhasil disimpan.') }}
        </x-jet-action-message>

        <x-dirty-message class="mr-3" target="state.pdu, state.olahraga, state.jas">
            {{ __('Belum disimpan!') }}
        </x-dirty-message>

        <x-jet-button>
            {{ __('Simpan') }}
        </x-jet-button>
    </x-slot>
    @endcan
</x-jet-form-section>