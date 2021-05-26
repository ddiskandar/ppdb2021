<div>
    <div class="flex items-start justify-between">
        <div class="relative flex flex-1 mb-4 rounded-md shadow-sm">
            <div class="relative flex-1">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24" class="w-5 h-5 text-gray-400">
                        <path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </div>
                <input wire:model.debounce.300ms="search" type="search" class="block w-full pl-10 border-gray-300 shadow-xs sm:rounded-md sm:text-sm sm:leading-5 focus:border-gray-300 focus:ring focus:ring-gray-200 focus:ring-opacity-50" placeholder="Mencari pendaftar berdasarkan nama atau nomor registrasi..." x-ref="search" @keydown.window="
                    if (event.keyCode === 191) {
                        event.preventDefault();
                        $refs.search.focus();
                    }
                ">
            </div>
        </div>
        <div class="w-16 ml-4">
            <select wire:model="perPage" id="perPage" name="perPage" class="block w-full px-3 py-2 bg-white border border-gray-300 shadow-sm sm:rounded-md focus:outline-none focus:ring-gray-400 focus:border-gray-400 sm:text-sm">
                <option value='4'>4</option>
                <option value='10'>10</option>
                <option value='15'>15</option>
                <option value='20'>20</option>
                <option value='50'>50</option>
                <option value='100'>100</option>
            </select>
        </div>
    </div>

    <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">
        <!-- This example requires Tailwind CSS v2.0+ -->
        <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                    <div class="overflow-hidden ">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                        Nama Lengkap / No. Registrasi
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                        Alamat Rumah / Asal Sekolah
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                        Pilihan Kelas / Jurusan
                                    </th>
                                    <th scope="col" class="px-2 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                        TPA / Gambar
                                    </th>
                                    <th scope="col" class="px-2 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                        BTQ / Shalat
                                    </th>
                                    <th scope="col" class="px-2 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                        Wawancara
                                    </th>
                                    <th scope="col" class="py-3 pl-2 pr-6 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                        Status
                                    </th>

                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @forelse($students as $student)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm font-medium text-gray-900 uppercase truncate w-52">
                                            {{ $student->user->name }}
                                        </div>
                                        <div class="text-sm text-gray-500">
                                            {{ $student->user->username }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900 truncate w-52">{{ $student->shortAddress }}</div>
                                        <div class="text-sm text-gray-500">{{ ($student->school_id != 1) ? $student->school->name : $student->school_temp }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="inline-flex items-center px-2 text-xs font-semibold leading-5 text-green-800 bg-green-100 rounded-full">
                                            <span class="w-2 h-2 mr-2 bg-green-600 rounded-full"></span>
                                            <span>{{ $student->pilihan_kelas() }}</span>
                                        </span>

                                        @isset ($student->ppdb->pilihan_satu)
                                        <span class="inline-flex px-2 text-xs font-semibold leading-5 text-green-800 bg-green-100 rounded-full">
                                            {{ '1 : ' . $student->pilihan_jurusan($student->ppdb->pilihan_satu)}}
                                        </span>
                                        <span class="inline-flex px-2 text-xs font-semibold leading-5 text-green-800 bg-green-100 rounded-full">
                                            {{ '2 : ' . $student->pilihan_jurusan($student->ppdb->pilihan_dua)}}
                                        </span>
                                        @endisset

                                    </td>
                                    <td class="px-2 py-4 text-sm font-medium whitespace-nowrap">
                                        @isset ($student->tpa)

                                        {{ $student->tpa . ' / ' . $student->gambar }}

                                        @else

                                        @can('process tpa')
                                        <a href="{{ route('student.tpa',  $student->id) }}">
                                            <x-jet-button>
                                                TPA
                                            </x-jet-button>
                                        </a>
                                        @else
                                        -
                                        @endcan

                                        @endisset
                                    </td>
                                    <td class="px-2 py-4 text-sm font-medium whitespace-nowrap">
                                        @isset ($student->baca_quran)

                                        <span>
                                            {{ $student->baca_quran . ' / ' . $student->tulis_quran . ' / ' . $student->bacaan_shalat }}
                                        </span>

                                        @else

                                        @can('process btq')
                                        <a href="{{ route('student.btq',  $student->id) }}">
                                            <x-jet-button>
                                                BTQ
                                            </x-jet-button>
                                        </a>
                                        @else
                                        -
                                        @endcan

                                        @endisset


                                    </td>
                                    <td class="px-2 py-4 text-sm font-medium whitespace-nowrap">
                                        @isset ($student->ppdb->interview_by)

                                        {{ $student->ppdb->interviewer->name }}

                                        @else

                                        @can('process wawancara')
                                        <a href="{{ route('student.interview',  $student->id) }}">
                                            <x-jet-button>
                                                Wawancara
                                            </x-jet-button>
                                        </a>
                                        @else
                                        -
                                        @endcan

                                        @endisset

                                    </td>
                                    <td class="py-4 pl-2 pr-6 text-sm font-medium whitespace-nowrap">
                                        @isset ($student->ppdb->pilihan_lulus)

                                        <span class="inline-flex px-2 text-xs font-semibold leading-5 text-green-800 bg-green-100 rounded-full">
                                            {{ $student->pilihan_jurusan($student->ppdb->pilihan_lulus) }}
                                        </span>

                                        @else

                                        @can('process pleno')
                                        <a href="{{ route('student.pleno',  $student->id) }}">
                                            <x-jet-button>
                                                Tentukan
                                            </x-jet-button>
                                        </a>
                                        @else
                                        -
                                        @endcan

                                        @endisset
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5" class="p-2 text-sm text-center text-gray-500">
                                        <div class="flex items-center justify-center py-12">
                                            <x-icon-ban />
                                            <span class="ml-2 font-semibold">Tidak ada data yang ditemukan</span>
                                        </div>
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <div class="px-2 py-3 bg-gray-50 sm:px-6">
                            <div class="px-4 sm:px-0">
                                {{ $students->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="mt-6">
        <div class="overflow-hidden shadow-lg sm:rounded-md">
            <div class="px-4 py-5 bg-gray-50 sm:p-6">
                <div class="grid grid-cols-6 gap-6">
                    <div class="col-span-6 sm:col-span-2">
                        <x-jet-label for="filterKelas" value="Pilihan Kelas" />
                        <select wire:model="filterKelas" id="filterKelas" name="filterKelas" class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-gray-400 focus:border-gray-400 sm:text-sm">
                            <option value=''>Semua</option>
                            <option value="1">Boarding</option>
                            <option value="0">Regular</option>
                        </select>
                    </div>
                    <div class="col-span-6 sm:col-span-2">
                        <x-jet-label for="filterSchool" value="Asal Sekolah" />
                        <select wire:model="filterSchool" id="filterSchool" name="filterSchool" class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-gray-400 focus:border-gray-400 sm:text-sm">
                            <option value=''>Semua</option>
                            @foreach($schools as $school)
                            <option value="{{ $school->name }}">{{ $school->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>