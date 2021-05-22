<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Data Master') }}
        </h2>
    </x-slot>

    <div>
        <div class="py-10 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="mt-10 sm:mt-0">
                @livewire('users-table')
            </div>

            <x-jet-section-border />

            <div class="mt-10 sm:mt-0">
                @livewire('schools-table')
            </div>

        </div>
    </div>
</x-app-layout>