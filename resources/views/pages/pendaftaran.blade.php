<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                {{ __('Data Pendaftar') }}
            </h2>
            <div class="items-center hidden sm:flex">
                @can ('download excel')
                <a href="{{ route('student.export') }}">
                    <x-jet-secondary-button>
                        Download Excel
                    </x-jet-secondary-button>
                </a>
                @endcan
                
                @livewire('student-create')
            </div>
        </div>
    </x-slot>

    <div>
        <div class="py-10 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="">
                @livewire('pendaftar-table')
            </div>

            <!-- <x-jet-section-border /> -->
        </div>
    </div>
</x-app-layout>