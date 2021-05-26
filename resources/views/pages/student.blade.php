<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                @livewire('student.show-name', ['student' => $student])
            </h2>
            <div class="items-center hidden sm:flex">
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
                @livewire('student.photo', ['student' => $student->id])
            </div>

            <x-jet-section-border />

            <div class="mt-10 sm:mt-0" id="grup">
                @livewire('student.join-wa', ['student' => $student->id])
            </div>

            <x-jet-section-border />

            <div class="mt-10 sm:mt-0">
                @livewire('student.sekolah-asal', ['student' => $student->id])
            </div>

            <x-jet-section-border />

            <div class="mt-10 sm:mt-0">
                @livewire('student.data-pribadi', ['student' => $student])
            </div>

            <x-jet-section-border />

            <div class="mt-10 sm:mt-0">
                @livewire('student.data-periodik', ['student' => $student->id])
            </div>

            <x-jet-section-border />

            <div class="mt-10 sm:mt-0">
                @livewire('student.data-keluarga', ['student' => $student->id])
            </div>

            <x-jet-section-border />

            <div class="mt-10 sm:mt-0">
                @livewire('student.data-rincian', ['student' => $student->id])
            </div>

            <x-jet-section-border />

            <div class="mt-10 sm:mt-0" id="jurusan">
                @livewire('student.pilihan-jurusan', ['student' => $student->id])
            </div>

            <x-jet-section-border />

            <div class="mt-10 sm:mt-0" id="dokumen">
                @livewire('student.dokumen-utama', ['student' => $student ])
            </div>

            <x-jet-section-border />

            <div class="mt-10 sm:mt-0">
                @livewire('student.dokumen-kesejahteraan', ['student' => $student ])
            </div>

            @role ('student')

            <x-jet-section-border />

            <div class="mt-10 sm:mt-0" id="pembayaran">
                @livewire('student.pembayaran', ['student' => $student->id])
            </div>

            @endrole

            @can ('edit ukuran seragam')
            <x-jet-section-border />

            <div class="mt-10 sm:mt-0">
                @livewire('student.ukuran-seragam', ['student' => $student->id])
            </div>
            @endcan

            @can ('delete student')
            <x-jet-section-border />

            <div class="mt-10 sm:mt-0">
                @livewire('student.delete-student', ['student' => $student->id])
            </div>
            @endcan

        </div>
    </div>
</x-app-layout>