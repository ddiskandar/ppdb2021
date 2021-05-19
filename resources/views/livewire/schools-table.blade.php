<div>
    <div class="pt-6">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="mt-10 sm:mt-0">
                <div class="md:grid md:grid-cols-3 md:gap-6">
                    <div class="md:col-span-1">
                        <div class="px-4 sm:px-0">
                            <h3 class="text-lg font-medium leading-6 text-gray-900">Asal Sekolah</h3>
                            <p class="mt-1 text-sm text-gray-600">
                                Daftar asal sekolah pendaftar
                            </p>
                        </div>
                    </div>
                    <div class="mt-5 md:mt-0 md:col-span-2">
                        <div class="relative mb-2">
                            <input wire:model="search" type="search" id="search" placeholder="Search" class="w-full py-2 pl-8 pr-3 text-sm placeholder-gray-500 transition duration-150 ease-in-out bg-white border border-gray-300 rounded-md focus:outline-none focus:ring-green-500 focus:border-green-500">
                            <div class="absolute top-0 flex items-center h-full ml-3">
                                <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                            </div>
                        </div>
                        <!-- This example requires Tailwind CSS v2.0+ -->
                        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                                <div class="overflow-hidden border-b border-gray-200 shadow sm:rounded-lg">

                                    <table class="min-w-full divide-y divide-gray-200">
                                        <thead class="bg-gray-50">
                                            <tr>
                                                <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                                    NPSN
                                                </th>
                                                <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                                    Sekolah
                                                </th>
                                                <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                                    Alamat
                                                </th>
                                                <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                                    2020
                                                </th>
                                                <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase sr-only ">
                                                    Edit
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody class="bg-white divide-y divide-gray-200">

                                            @foreach ($schools as $school)
                                            <tr>
                                                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                                                    {{ $school->npsn }}
                                                </td>
                                                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                                                    {{ $school->name }}
                                                </td>
                                                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                                                    {{ $school->address }}
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    {{ $school->last_students }}
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <span wire:click="edit({{ $school->id }})">
                                                        <svg class="w-6 h-6 text-gray-300 cursor-pointer hover:text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                                        </svg>
                                                    </span>
                                                </td>
                                            </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                    <div class="px-2 py-3 bg-gray-50 sm:px-6">
                                        <div class="px-4 sm:px-0">
                                            {{ $schools->links() }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="hidden sm:block" aria-hidden="true">
                <div class="py-5">
                    <div class="border-t border-gray-200"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="pt-6">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="mt-10 sm:mt-0">
                <div class="md:grid md:grid-cols-3 md:gap-6">
                    <div class="md:col-span-1">
                        <div class="px-4 sm:px-0">
                            <h3 class="text-lg font-medium leading-6 text-gray-900">Tambah/Edit Asal Sekolah</h3>
                            <p class="mt-1 text-sm text-gray-600">
                                Tambah atau perbaharui data asal sekolah
                            </p>
                        </div>
                    </div>
                    <div class="mt-5 md:mt-0 md:col-span-2">
                        <!-- This example requires Tailwind CSS v2.0+ -->
                        <div class="inline-block min-w-full align-middle">
                            <div class="overflow-hidden border-b border-gray-200 shadow sm:rounded-lg">
                                <form wire:submit.prevent="submitForm" action="#" method="POST">
                                    <div class="overflow-hidden shadow sm:rounded-md">
                                        <div class="px-4 py-5 bg-white sm:p-6">
                                            <div class="grid grid-cols-6 gap-6">
                                                <div class="col-span-6 sm:col-span-2">
                                                    <x-jet-label for="npsn" value="NPSN" content="required" />
                                                    <x-jet-input type="text" name="npsn" wire:model.defer="npsn" class="block w-full mt-1" />
                                                    <x-jet-input-error for="npsn" class="mt-2" />
                                                </div>
                                                <div class="col-span-6 sm:col-span-4">
                                                    <x-jet-label for="name" value="Nama Sekolah" content="required" />
                                                    <x-jet-input type="text" name="name" id="name" wire:model.defer="name" class="block w-full mt-1" />
                                                    <x-jet-input-error for="name" class="mt-2" />
                                                </div>

                                                <div class="col-span-6 sm:col-span-4">
                                                    <x-jet-label for="address" value="Alamat Sekolah" content="required" />
                                                    <x-jet-input type="text" name="address" id="address" wire:model.defer="address" class="block w-full mt-1" />
                                                    <x-jet-input-error for="address" class="mt-2" />
                                                </div>
                                                <div class="col-span-6 sm:col-span-2">
                                                    <x-jet-label for="last_students" value="Pendaftar Tahun Lalu" />
                                                    <x-jet-input type="text" name="last_students" id="last_students" wire:model.defer="last_students" class="block w-full mt-1" />
                                                    <x-jet-input-error for="last_students" class="mt-2" />
                                                </div>

                                            </div>
                                        </div>
                                        <div class="flex items-center justify-end px-4 py-3 text-right bg-gray-50 sm:px-6">
                                            <div wire:click="resetForm" class="mr-4 text-sm text-gray-700 cursor-pointer ">Batal</div>
                                            <x-jet-button target="submitForm" >
                                                {{ __('Simpan') }}
                                            </x-jet-button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="hidden sm:block" aria-hidden="true">
                <div class="py-5">
                    <div class="border-t border-gray-200"></div>
                </div>
            </div>
        </div>
    </div>
</div>