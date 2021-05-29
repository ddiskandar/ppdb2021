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
                                {{ $card['pendaftar'] }}
                            </div>
                        </div>
                    </div>

                    <div class="p-6 border-t border-gray-100 lg:border-t-0 lg:border-l-2">
                        <div class="text-left">
                            <div class="text-sm text-gray-500">
                                {{ __('Pilihan Boarding') }}
                            </div>
                            <div class="mt-2 text-3xl font-semibold leading-7 text-gray-900">
                                {{ $card['boarding'] }}
                            </div>
                        </div>
                    </div>

                    <div class="p-6 border-t border-gray-100 lg:border-t-0 lg:border-l-2">
                        <div class="text-left">
                            <div class="text-sm text-gray-500">
                                {{ __('Siswa Yatim') }}
                            </div>
                            <div class="mt-2 text-3xl font-semibold leading-7 text-gray-900">
                                {{ $card['yatim'] }}
                            </div>
                        </div>
                    </div>

                    <div class="p-6 border-t border-gray-100 lg:border-t-0 lg:border-l-2">
                        <div class="text-left">
                            <div class="text-sm text-gray-500">
                                {{ __('Melakukan Pembayaran') }}
                            </div>
                            <div class="mt-2 text-3xl font-semibold leading-7 text-gray-900">
                                {{ $card['pembayaran'] }}
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
                                                <td class="px-6 py-4 {!! ($school->comparison == 'up') ? 'text-green-600' : 'text-red-600' !!} whitespace-nowrap">
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
                                            <tr>
                                                <td class="w-16 px-6 py-4 font-medium text-gray-900 truncate whitespace-nowrap">
                                                    Multimedia
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    127
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    {{ $jumlah_jurusan['mm'] }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="w-16 px-6 py-4 font-medium text-gray-900 truncate whitespace-nowrap">
                                                    Bisnis Daring dan Pemasaran
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    66
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    {{ $jumlah_jurusan['bdp'] }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="w-16 px-6 py-4 font-medium text-gray-900 truncate whitespace-nowrap">
                                                    Agribisnis Pengolahan Hasil Pertanian
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    39
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    {{ $jumlah_jurusan['aphp'] }}
                                                </td>
                                            </tr>

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
                                                    {{ $jk['male'] }}
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
                                                    {{ $jk['female'] }}
                                                </td>
                                            </tr>
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
                                                    Predikat
                                                </th>
                                                <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                                    Baca Quran
                                                </th>
                                                <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                                    Tulis Quran
                                                </th>
                                                <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                                    Bacaan Shalat
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody class="bg-white divide-y divide-gray-200">
                                            <tr>
                                                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                                                    S
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    {{ $btq['baca_quran']['S'] }}
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    {{ $btq['tulis_quran']['S'] }}
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    {{ $btq['bacaan_shalat']['S'] }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                                                    A
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    {{ $btq['baca_quran']['A'] }}
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    {{ $btq['tulis_quran']['A'] }}
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    {{ $btq['bacaan_shalat']['A'] }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                                                    B
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    {{ $btq['baca_quran']['B'] }}
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    {{ $btq['tulis_quran']['B'] }}
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    {{ $btq['bacaan_shalat']['B'] }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                                                    C
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    {{ $btq['baca_quran']['C'] }}
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    {{ $btq['tulis_quran']['C'] }}
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    {{ $btq['bacaan_shalat']['C'] }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                                                    D
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    {{ $btq['baca_quran']['D'] }}
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    {{ $btq['tulis_quran']['D'] }}
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    {{ $btq['bacaan_shalat']['D'] }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                                                    E
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    {{ $btq['baca_quran']['E'] }}
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    {{ $btq['tulis_quran']['E'] }}
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    {{ $btq['bacaan_shalat']['E'] }}
                                                </td>
                                            </tr>

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
                                                    Ukuran
                                                </th>
                                                <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                                    PDU
                                                </th>
                                                <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                                    Olahraga
                                                </th>
                                                <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                                    Jas
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody class="bg-white divide-y divide-gray-200">
                                            <tr>
                                                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                                                    S
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    {{ $seragam['pdu']['S'] }}
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    {{ $seragam['olahraga']['S'] }}
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    {{ $seragam['jas']['S'] }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                                                    M
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    {{ $seragam['pdu']['M'] }}
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    {{ $seragam['olahraga']['M'] }}
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    {{ $seragam['jas']['M'] }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                                                    L
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    {{ $seragam['pdu']['L'] }}
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    {{ $seragam['olahraga']['L'] }}
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    {{ $seragam['jas']['L'] }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                                                    XL
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    {{ $seragam['pdu']['XL'] }}
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    {{ $seragam['olahraga']['XL'] }}
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    {{ $seragam['jas']['XL'] }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                                                    XXL
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    {{ $seragam['pdu']['XXL'] }}
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    {{ $seragam['olahraga']['XXL'] }}
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    {{ $seragam['jas']['XXL'] }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                                                    XXXL
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    {{ $seragam['pdu']['XXXL'] }}
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    {{ $seragam['olahraga']['XXXL'] }}
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    {{ $seragam['jas']['XXXL'] }}
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