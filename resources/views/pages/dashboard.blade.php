<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                {{ __('Dashboard') }}
            </h2>
            <div class="text-sm text-gray-500">Aktif : Gel 02, {{ \DB::table('periodes')->where('active', true)->first()->desc }}</div>
        </div>
    </x-slot>

    <div class="py-12">

        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">
                <div class="grid grid-cols-1 bg-white lg:grid-cols-4">
                    <div class="p-6">
                        <div class="text-left">
                            <div class="text-sm text-gray-500">
                                {{ __('Jumlah Pendaftar') }}
                            </div>
                            <div class="mt-2 text-3xl font-semibold leading-7 text-gray-900">
                                {{ $pendaftar }}
                            </div>
                        </div>
                    </div>

                    <div class="p-6 border-t border-gray-100 lg:border-t-0 lg:border-l-2">
                        <div class="text-left">
                            <div class="text-sm text-gray-500">
                                {{ __('Pilihan Boarding') }}
                            </div>
                            <div class="mt-2 text-3xl font-semibold leading-7 text-gray-900">
                                {{ $boarding }}
                            </div>
                        </div>
                    </div>

                    <div class="p-6 border-t border-gray-100 lg:border-t-0 lg:border-l-2">
                        <div class="text-left">
                            <div class="text-sm text-gray-500">
                                {{ __('Siswa Yatim') }}
                            </div>
                            <div class="mt-2 text-3xl font-semibold leading-7 text-gray-900">
                                {{ $yatim }}
                            </div>
                        </div>
                    </div>

                    <div class="p-6 border-t border-gray-100 lg:border-t-0 lg:border-l-2">
                        <div class="text-left">
                            <div class="text-sm text-gray-500">
                                {{ __('Melakukan Pembayaran') }}
                            </div>
                            <div class="mt-2 text-3xl font-semibold leading-7 text-gray-900">
                                {{ $pembayaran }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @can ('view statistik')
    <div class="">
        <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <h3 class="text-2xl font-bold">Statistik Pendaftar</h3>
        </div>
    </div>

    <div class="py-6">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="lg:grid lg:grid-cols-12 lg:gap-6">
                <div class="lg:col-span-7">
                    <div class="flex flex-col mb-4">
                        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                                <div class="overflow-hidden border-b border-gray-200 shadow sm:rounded-lg">
                                    <table class="min-w-full divide-y divide-gray-200">
                                        <thead class="bg-gray-50">
                                            <tr>
                                                <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                                    Nama Sekolah
                                                </th>
                                                <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                                    Alamat Sekolah
                                                </th>
                                                <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                                    2020
                                                </th>
                                                <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                                    2021
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody class="bg-white divide-y divide-gray-200">
                                            @foreach ($schools as $school )
                                            <tr>
                                                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                                    {{ $school->name }}
                                                </td>
                                                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                                    {{ $school->address }}
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    {{ $school->last_students }}
                                                </td>
                                                <td class="px-6 py-4 {!! ($school->grow() == 'increase') ? 'text-green-600' : 'text-red-600' !!} whitespace-nowrap">
                                                    {{ $school->students_count }}
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="lg:col-span-5">
                    <div class="flex flex-col">
                        <div class="-my-2 overflow-x-auto lg:overflow-hidden sm:-mx-6 lg:-mx-8">
                            <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                                <div class="overflow-hidden border-b border-gray-200 shadow sm:rounded-lg">
                                    <table class="min-w-full divide-y divide-gray-200">
                                        <thead class="bg-gray-50">
                                            <tr>
                                                <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                                    Pilihan Kompetensi Keahlian
                                                </th>
                                                <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                                    2020
                                                </th>
                                                <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                                    2021
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody class="bg-white divide-y divide-gray-200">
                                            @foreach ($jurusans as $jurusan)
                                            <tr>
                                                <td class="w-16 px-6 py-4 font-medium text-gray-900 truncate whitespace-nowrap">
                                                    {{ $jurusan->name }}
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    {{ $jurusan->last_students }}
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    0{{-- {{ $jurusan->students->count() }} --}}
                                                </td>
                                            </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="mt-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                                <div class="overflow-hidden border-b border-gray-200 shadow sm:rounded-lg">
                                    <table class="min-w-full divide-y divide-gray-200">
                                        <thead class="bg-gray-50">
                                            <tr>
                                                <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                                    Jenis Kelamin
                                                </th>
                                                <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                                    2020
                                                </th>
                                                <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                                    2021
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody class="bg-white divide-y divide-gray-200">
                                            <tr>
                                                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                                                    Laki-laki
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    175
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    {{ $male }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                                                    Perempuan
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    51
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    {{ $female }}
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    @endcan

</x-app-layout>