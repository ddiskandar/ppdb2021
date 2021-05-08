<div class="md:grid md:grid-cols-3 md:gap-6">
    <x-jet-section-title>
        <x-slot name="title">
            Statistik
        </x-slot>
        <x-slot name="description">
            Jumlah Siswa lulus per jurusan
        </x-slot>
    </x-jet-section-title>

    <div class="md:col-span-2">
        <div class="grid grid-cols-6 gap-6">
            <div class="sm:col-span-2">
                <div class="px-4 py-5 text-center bg-white shadow sm:p-4 sm:rounded-md">
                    <div class="text-4xl font-bold text-gray-700">
                        {{ $mm }}
                    </div>
                    <span class="text-sm font-semibold text-gray-500">
                        Multimedia
                    </span>
                </div>
            </div>
            <div class="sm:col-span-2">
                <div class="px-4 py-5 text-center bg-white shadow sm:p-4 sm:rounded-md">
                    <div class="text-4xl font-bold text-gray-700">
                        {{ $bdp }}
                    </div>
                    <span class="text-sm font-semibold text-gray-500">
                        Bisnis Daring dan Pemasaran
                    </span>
                </div>
            </div>
            <div class="sm:col-span-2">
                <div class="px-4 py-5 text-center bg-white shadow sm:p-4 sm:rounded-md">
                    <div class="text-4xl font-bold text-gray-700">
                        {{ $aphp }}
                    </div>
                    <span class="text-sm font-semibold text-gray-500">
                        APHP
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>