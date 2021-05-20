<x-app-layout>
    <div class="py-12">
        <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="">
                <div class="grid gap-8 sm:grid-cols-12">
                    <div class="sm:col-span-4 lg:col-span-3">
                        <div class="overflow-hidden bg-white shadow-2xl rounded-2xl">
                            <img alt="photo" class="object-cover object-center w-full h-96" @if( $student->user->photo )
                            src="{{ Storage::url($student->user->photo) }}"
                            @else
                            src="/images/default-photo.png"
                            @endif
                            >
                        </div>
                    </div>
                    <div class="sm:col-span-8 lg:col-span-5">
                        <dl>
                            <dt class="text-gray-400">{{ __('Nama Lengkap Sesuai Ijazah') }}</dt>
                            <dd class="flex items-center text-3xl font-bold text-gray-900">
                                {{ $student->user->name }}

                                @if ( $student->name_verified )
                                <span class="ml-4 text-sm font-semibold text-green-500">
                                    {{ __('Sudah diverifikasi') }}
                                </span>
                                <svg class="ml-2" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">
                                    <path id="Path_56" data-name="Path 56" d="M6.267,3.455a3.066,3.066,0,0,0,1.745-.723,3.066,3.066,0,0,1,3.976,0,3.066,3.066,0,0,0,1.745.723,3.066,3.066,0,0,1,2.812,2.812,3.062,3.062,0,0,0,.723,1.745,3.066,3.066,0,0,1,0,3.976,3.066,3.066,0,0,0-.723,1.745,3.066,3.066,0,0,1-2.812,2.812,3.066,3.066,0,0,0-1.745.723,3.066,3.066,0,0,1-3.976,0,3.066,3.066,0,0,0-1.745-.723,3.066,3.066,0,0,1-2.812-2.812,3.066,3.066,0,0,0-.723-1.745,3.066,3.066,0,0,1,0-3.976,3.066,3.066,0,0,0,.723-1.745A3.066,3.066,0,0,1,6.267,3.455Zm7.44,5.252a1,1,0,1,0-1.414-1.414L9,10.586,7.707,9.293a1,1,0,1,0-1.414,1.414l2,2a1,1,0,0,0,1.414,0l4-4Z" transform="translate(-2 -2)" fill="#059669" fill-rule="evenodd" />
                                </svg>
                                @endif

                            </dd>

                            <dt class="mt-2 text-gray-400">{{ __('Nomor Induk Siswa Nasional') }}</dt>
                            <dd class="flex items-center text-xl font-bold text-gray-900">
                                @if ( $nisn = $student->nisn )
                                {{ $nisn }}
                                @else
                                <p class="mt-2 text-sm text-red-700 uppercase">{{ __('Belum ada data') }}</p>
                                @endif
                            </dd>

                            <dt class="mt-2 text-gray-400">{{ __('Asal Sekolah') }}</dt>
                            <dd class="flex items-center text-xl font-bold text-gray-900">
                                @if ( $school = $student->school->name )
                                {{ $school }}
                                @else
                                <p class="mt-2 text-sm text-red-700 uppercase">{{ __('Belum ada data') }}</p>
                                @endif
                            </dd>

                            <dt class="mt-2 text-gray-400">{{ __('Alamat Rumah') }}</dt>
                            <dd class="flex items-center text-xl font-bold text-gray-900 uppercase">
                                @if ( $address = $student->full_address )
                                {{ $address }}
                                @else
                                <p class="mt-2 text-sm text-red-700 uppercase">{{ __('Belum ada data') }}</p>
                                @endif
                            </dd>

                            <dt class="mt-2 text-gray-400">{{ __('Nama Ibu Kandung') }}</dt>
                            <dd class="flex items-center text-xl font-bold text-gray-900">
                                @if ( $ibu = $student->ortu->ibu_nama )
                                {{ $ibu }}
                                @else
                                <p class="mt-2 text-sm text-red-700 uppercase">{{ __('Belum ada data') }}</p>
                                @endif
                            </dd>

                            <dt class="mt-2 text-gray-400">{{ __('Nomor WA') }}</dt>
                            <dd class="flex items-center text-xl font-bold text-gray-900">
                                @if ( $phone = $student->phone )
                                {{ $phone }}
                                @else
                                <p class="mt-2 text-sm text-red-700 uppercase">{{ __('Belum ada data') }}</p>
                                @endif
                            </dd>

                        </dl>
                    </div>
                    <div class="sm:col-span-12 lg:col-span-4 ">
                        <div>
                            <div class="w-full px-6 py-8 bg-gray-900 rounded-lg sm:px-12">
                                <div class="text-gray-400">Nomor Registrasi Pendaftaran</div>
                                <div class="mt-2 text-4xl font-bold text-white">{{ $student->user->username }}</div>
                            </div>
                            <p class="mt-2 text-xs ">* Catat dan simpan atau screnshot nomor registrasi pendaftaran ini karena akan selalu digunakan untuk login dan keperluan lainnya selama PPDB.</p>

                            <div class="py-6">
                                <x-action-card completed="{!! ( $student->is_alur_completed() ) ? 'true' : 'false' !!}" title="Cetak Kartu" action="{!! $student->is_alur_completed() ? route('student.pdf', $student->id) : '#' !!}" description="Nomor registrasi pendaftaran">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="38.813" height="38.813" viewBox="0 0 38.813 38.813">
                                        <path id="Path_58" data-name="Path 58" d="M31.632,31.632h4.09a4.09,4.09,0,0,0,4.09-4.09V19.361a4.09,4.09,0,0,0-4.09-4.09H7.09A4.09,4.09,0,0,0,3,19.361v8.181a4.09,4.09,0,0,0,4.09,4.09h4.09m4.09,8.181H27.542a4.09,4.09,0,0,0,4.09-4.09V27.542a4.09,4.09,0,0,0-4.09-4.09H15.271a4.09,4.09,0,0,0-4.09,4.09v8.181A4.09,4.09,0,0,0,15.271,39.813ZM31.632,15.271V7.09A4.09,4.09,0,0,0,27.542,3H15.271a4.09,4.09,0,0,0-4.09,4.09v8.181Z" transform="translate(-2 -2)" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                    </svg>
                                </x-action-card>

                                @if(!$student->is_alur_completed())
                                <p class="mt-2 text-sm text-red-700">{{ __('Kartu peserta dapat diunduh setelah semua alur pendaftaran selesai') }}</p>
                                @endif
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="mt-10">
                <div class="md:grid md:grid-cols-3 md:gap-6">
                    <div class="md:col-span-1">
                        <div class="px-4 sm:px-0">
                            <h3 class="text-lg font-medium leading-6 text-gray-900">Daftar PPDB</h3>
                            <p class="mt-1 text-sm text-gray-600">
                                Terima kasih telah membuat akun. Klik tombol Gabung pada gelombang yang sesuai preferensimu untuk mendaftar.
                            </p>
                        </div>
                    </div>
                    <div class="mt-5 md:mt-0 md:col-span-2">
                        <!-- This example requires Tailwind CSS v2.0+ -->
                        <div class="flex flex-col">
                            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">

                                    <div class="overflow-hidden bg-white border-b border-gray-200 shadow sm:rounded-lg">
                                        <table class="min-w-full divide-y divide-gray-200">
                                            <thead class="bg-gray-50">
                                                <tr>
                                                    <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                                        Jalur
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                                        Pendaftaran
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                                        Status
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody class="divide-y divide-gray-200 ">
                                                <tr>
                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                        <div class="">
                                                            <div class="">
                                                                <div class="text-sm font-bold text-gray-900">
                                                                    Gelombang {{ $periode->name }}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                        <div class="text-sm text-gray-900">{{ $periode->desc }}</div>
                                                    </td>
                                                    <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
                                                        @if ( $student->ppdb )
                                                        <span class="text-green-500">Sudah Terdaftar</span>
                                                        @else
                                                        <span class="text-red-500">Belum terdaftar</span>
                                                        @endif
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>

                                        @if ( ! $student->ppdb )
                                        <div class="py-6 text-center">
                                            <form wire:submit.prevent="submitForm" action="#" method="post">
                                                @csrf

                                                <x-jet-button target="submitForm" class="py-3 bg-red-500 hover:bg-red-600 focus:ring-red-200">
                                                    {{ __('Gabung') }}
                                                </x-jet-button>

                                            </form>

                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-10">
                <div class="md:grid md:grid-cols-3 md:gap-6">
                    <div class="md:col-span-1">
                        <div class="px-4 sm:px-0">
                            <h3 class="text-lg font-medium leading-6 text-gray-900">Alur pendaftaran</h3>
                            <p class="mt-1 text-sm text-gray-600">
                                Ikut alur pendaftaran melalui langkah berikut ini
                            </p>
                        </div>
                    </div>

                    <div class="px-4 mt-5 sm:px-0 md:mt-0 md:col-span-2">
                        <div class="grid gap-6 lg:grid-cols-2">

                            @if ( isset($student->ppdb) )

                            <x-action-card completed="{!! ( $student->ppdb ) ? 'true' : 'false' !!}" title="Gelombang" description="Pilih Jalur Pendaftaran">

                                <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-9">
                                    <path data-name="Path 53" d="M1 2.889A1.889 1.889 0 012.889 1h30.22A1.889 1.889 0 0135 2.889v4.884a1.888 1.888 0 01-.553 1.335L22.329 21.223a1.889 1.889 0 00-.553 1.335v4.884L14.221 35V22.558a1.889 1.889 0 00-.553-1.335L1.553 9.108A1.889 1.889 0 011 7.773z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                </svg>
                            </x-action-card>

                            <x-action-card completed="{!! ( isset($student->ppdb->pilihan_satu) ) ? 'true' : 'false' !!}" action="/student/{{ $student->id }}" title="Pilih Jurusan" description="Tentukan jurusan kalian">
                                <svg xmlns="http://www.w3.org/2000/svg" width="40.407" height="38.273">
                                    <path data-name="Path 55" d="M30.872 28.738v4.267a4.267 4.267 0 01-4.272 4.268H5.267A4.267 4.267 0 011 33.006V18.07a4.267 4.267 0 014.267-4.27h4.267m6.4-8.535H13.8a4.267 4.267 0 00-4.267 4.267v14.939a4.267 4.267 0 004.267 4.267h21.339a4.267 4.267 0 004.267-4.267V9.535a4.267 4.267 0 00-4.267-4.267h-2.133M30.872 13.8l-6.4 6.4m0 0l-6.4-6.4m6.4 6.4V1" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                </svg>
                            </x-action-card>

                            <x-action-card completed="{!! ( $student->ppdb->join_wa ) ? 'true' : 'false' !!}" action="/student/{{ $student->id }}" title="Gabung Grup WA" description="Untuk info PPDB lainnya">
                                <svg xmlns="http://www.w3.org/2000/svg" width="39.842" height="39.842" viewBox="0 0 39.842 39.842">
                                    <path id="Path_116" data-name="Path 116" d="M32.433,12.409h4.2a4.2,4.2,0,0,1,4.2,4.2V29.228a4.2,4.2,0,0,1-4.2,4.2h-4.2v8.409l-8.409-8.409H15.614A4.192,4.192,0,0,1,12.641,32.2m0,0,7.177-7.177h8.409a4.2,4.2,0,0,0,4.2-4.2V8.2a4.2,4.2,0,0,0-4.2-4.2H7.2A4.2,4.2,0,0,0,3,8.2V20.819a4.2,4.2,0,0,0,4.2,4.2h4.2v8.409Z" transform="translate(-2 -3)" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                </svg>
                            </x-action-card>

                            @endif

                            <x-action-card completed="{!! ( $student->is_data_completed() ) ? 'true' : 'false' !!}" action="/student/{{ $student->id }}" title="Biodata" description="Isi data profil diri">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-11">
                                    <path data-name="Path 54" d="M16.094 7.469H5.313A4.312 4.312 0 001 11.781v19.407A4.312 4.312 0 005.313 35.5H35.5a4.313 4.313 0 004.313-4.312V11.781A4.313 4.313 0 0035.5 7.469H24.719m-8.625 0V5.313a4.313 4.313 0 018.625 0v2.156m-8.625 0a4.313 4.313 0 008.625 0m-10.782 17.25a4.313 4.313 0 10-4.313-4.312 4.312 4.312 0 004.313 4.312zm0 0a6.477 6.477 0 016.1 4.313m-6.1-4.312a6.471 6.471 0 00-6.1 4.313M26.875 18.25h6.469m-6.469 8.625h4.313" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                </svg>
                            </x-action-card>

                            <x-action-card completed="{!! ( $student->is_document_completed() ) ? 'true' : 'false' !!}" action="berkas" title="Unggah Berkas" description="Ijazah, Akta, Kartu keluarga">
                                <svg xmlns="http://www.w3.org/2000/svg" width="35.381" height="37.964">
                                    <path data-name="Path 52" d="M23.321 8.992L10.163 22.15a4 4 0 105.651 5.65l12.814-13.158a7.991 7.991 0 10-11.3-11.3L4.511 16.5a11.989 11.989 0 0016.954 16.952l12.5-12.473" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                </svg>
                            </x-action-card>

                            <x-action-card completed="{{ ( $student->is_payment_completed() ) ? 'true' : 'false' }}" action="pembayaran" title="Bayar Pendaftaran" description="Membayar biaya pendaftaran">
                                <svg xmlns="http://www.w3.org/2000/svg" width="43" height="33.889">
                                    <path data-name="Path 51" d="M28.333 1v4.556m0 9.111v4.556m0 9.111v4.556M5.556 1A4.556 4.556 0 001 5.556v6.833A4.556 4.556 0 111 21.5v6.833a4.556 4.556 0 004.556 4.556h31.888A4.556 4.556 0 0042 28.333V21.5a4.556 4.556 0 110-9.111V5.556A4.556 4.556 0 0037.444 1z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                </svg>
                            </x-action-card>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>