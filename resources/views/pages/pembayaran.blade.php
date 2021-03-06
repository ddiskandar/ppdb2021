<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                {{ __('Data Pembayaran') }}
            </h2>
            <div class="items-center hidden sm:flex">
                @livewire('payment-create')
            </div>
        </div>
    </x-slot>

    <div>
        <div class="py-10 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="">
                @livewire('payments-table')
            </div>

        </div>
    </div>
</x-app-layout>