<div>
    <div class="pt-4">
        <div class="mx-auto max-w-7xl">
            <div class="">
                <div class="md:grid md:grid-cols-3 md:gap-6">
                    <div class="md:col-span-1">
                        <div class="px-4 sm:px-0">
                            <h3 class="text-lg font-medium leading-6 text-gray-900">Daftar Pengguna</h3>
                            <p class="mt-1 text-sm text-gray-600">
                                Daftar panitia pengguna aplikasi
                            </p>
                        </div>
                    </div>
                    <div class="mt-5 md:mt-0 md:col-span-2">

                        <div class="ml-4 md:ml-0">
                            @livewire('generate-permissions')
                        </div>

                        <div class="flex items-start justify-between">
                            <div class="relative flex flex-1 rounded-md shadow-sm">
                                <x-input-search placeholder="Mencari user berdasarkan username dan nama ..." />
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

                        <!-- This example requires Tailwind CSS v2.0+ -->
                        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                                <div class="overflow-hidden border-b border-gray-200 shadow sm:rounded-lg">

                                    <table class="min-w-full divide-y divide-gray-200">
                                        <thead class="bg-gray-50">
                                            <tr>
                                                <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                                    Username
                                                </th>
                                                <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                                    Nama
                                                </th>
                                                <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                                    Peran
                                                </th>
                                                <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase sr-only ">
                                                    Edit
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody class="bg-white divide-y divide-gray-200">

                                            @forelse ($users as $user)
                                            <tr>
                                                <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap ">
                                                    {{ $user->username }}
                                                </td>
                                                <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap ">
                                                    {{ $user->name }}
                                                </td>
                                                <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap ">
                                                    @foreach( $user->getRoleNames() as $role )
                                                    {{ $role }}
                                                    @endforeach
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <x-button-icon wire:click="edit({{ $user->id }})">
                                                        <x-icon-pencil-alt />
                                                    </x-button-icon>
                                                    <x-button-icon wire:click="confirmResetPassword({{ $user->id }})">
                                                        <x-icon-shield-check />
                                                    </x-button-icon>
                                                </td>
                                            </tr>

                                            @empty
                                            <tr>
                                                <td colspan="4" class="p-6 text-sm text-center text-gray-500">
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
                                            {{ $users->links() }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="pt-6">
        <div class="mx-auto max-w-7xl">
            <div class="mt-10 sm:mt-0">
                <div class="md:grid md:grid-cols-3 md:gap-6">
                    <div class="md:col-span-1">
                        <div class="px-4 sm:px-0">
                            <h3 class="text-lg font-medium leading-6 text-gray-900">Tambah/Edit User</h3>
                            <p class="mt-1 text-sm text-gray-600">
                                Tambah atau perbaharui data pengguna
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

                                                <div class="col-span-6 sm:col-span-3">
                                                    <x-jet-label for="username" value="Username" content="required" />
                                                    <x-jet-input type="text" name="username" wire:model.defer="username" class="block w-full mt-1" />
                                                    <x-jet-input-error for="username" class="mt-2" />
                                                </div>

                                                <div class="col-span-6 sm:col-span-3">
                                                    <x-jet-label for="name" value="Nama Pengguna" content="required" />
                                                    <x-jet-input type="text" name="name" id="name" wire:model.defer="name" class="block w-full mt-1" />
                                                    <x-jet-input-error for="name" class="mt-2" />
                                                </div>

                                                <div class="col-span-6 sm:col-span-3">
                                                    <x-jet-label for="role" value="Peran" />
                                                    <x-select wire:model.defer="role" id="role" name="role" class="block w-full px-3 mt-1">
                                                        @foreach($roles as $role)
                                                        <option value="{{ $role->name }}">{{ $role->name }}</option>
                                                        @endforeach
                                                    </x-select>
                                                    <x-jet-input-error for="role" class="mt-2" />
                                                </div>

                                            </div>
                                        </div>
                                        <div class="flex items-center justify-end px-4 py-3 bg-gray-50 sm:px-6">
                                            <div wire:click="resetForm" class="mr-4 text-sm text-gray-700 cursor-pointer ">Batal</div>
                                            <x-jet-button target="submitForm">
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
        </div>
    </div>

    @isset ($userResetPassword->name)
    <!-- Delete User Confirmation Modal -->
    <x-jet-dialog-modal wire:model="confirmingResetPassword">
        <x-slot name="title">
            Reset Password {{ $userResetPassword->name }}
        </x-slot>

        <x-slot name="content">
            {{ __('Yakin mau direset? password akan direset menjadi majuterus') }}

        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('confirmingResetPassword')" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>

            <x-jet-danger-button class="ml-2" wire:click="resetPassword()" wire:loading.attr="disabled">
                {{ __('Reset Password') }}
            </x-jet-danger-button>
        </x-slot>
    </x-jet-dialog-modal>
    @endisset
</div>