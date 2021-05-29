<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col items-start justify-between md:flex-row md:items-center">
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                @livewire('student.show-name', ['student' => $student])
            </h2>
            <div class="mt-4 md:mt-0">
                <a href="{{ url()->previous() }}">
                    <x-jet-secondary-button>
                        Kembali
                    </x-jet-secondary-button>
                </a>
            </div>
        </div>
    </x-slot>

    <div>
        <div class="py-10 mx-auto max-w-7xl sm:px-6 lg:px-8">

            <div class="mt-10 sm:mt-0">
                @livewire('student.review', ['student' => $student->id])
            </div>

            <x-jet-section-border />

            <div class="mt-10 sm:mt-0">
                @livewire('student.pilihan-lulus', ['student' => $student->id])
            </div>

            <x-jet-section-border />

            <div class="mt-10 sm:mt-0">
                @livewire('stats-mayors', ['student' => $student->id])
            </div>


        </div>
    </div>
</x-app-layout>