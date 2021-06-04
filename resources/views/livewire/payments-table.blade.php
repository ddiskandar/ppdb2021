<div>
    <div class="flex items-start justify-between">
        <div class="relative flex flex-1 mb-4 rounded-md shadow-sm">
            <div class="relative flex-1">
                <x-input-search placeholder="Mencari pendaftar berdasarkan nama atau nomor registrasi ..." />
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
                                        Besar Bayar / Sisa
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                        Pembayaran
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                        Status
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                        Petugas
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                        Catatan
                                    </th>
                                    <th scope="col" class="relative px-6 py-3">
                                        <span class="sr-only">Edit</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                <tr wire:loading>
                                    <td class="p-6 text-sm font-semibold text-gray-500">
                                        Loading ...
                                    </td>
                                </tr>
                                @forelse($payments as $payment)
                                <tr wire:loading.remove>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="w-64 text-sm font-medium text-gray-900 uppercase truncate ">
                                            {{ $payment->student->user->name }}
                                        </div>
                                        <div class="text-sm text-gray-500">
                                            {{ $payment->student->user->username }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">Rp. {{ $payment->student->ppdb->payment_amount }}</div>
                                        <div class="text-sm text-gray-500">
                                            @if ($payment->student->ppdb->payment_amount == 0)
                                            <div class="flex items-center">
                                                <span class="text-red-600">
                                                    Gratis
                                                </span>
                                                <svg class="w-4 h-4 ml-1 text-red-600" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                                </svg>
                                            </div>
                                            @elseif ( $payment->student->ppdb->payment_amount - $payment->student->paid_amount == 0)
                                            <div class="flex items-center">
                                                <span class="text-green-800">
                                                    Lunas
                                                </span>
                                                <svg class="w-4 h-4 ml-1 text-green-600" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                                </svg>
                                            </div>
                                            @else
                                            <span class="text-red-600">
                                                Rp. {{ $payment->student->ppdb->payment_amount - $payment->student->paid_amount }} ,-
                                            </span>
                                            @endif
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">Rp. {{ $payment->amount }}</div>
                                        <div class="text-sm text-gray-500">{{ format_tanggal_indo($payment->date) }}</div>
                                    </td>
                                    @if ($payment->verified_by)
                                    <td class="px-6 py-4 text-green-500 whitespace-nowrap">
                                        <div class="inline-flex items-center px-2 text-xs font-semibold leading-5 text-green-800 bg-green-100 rounded-full">
                                            <span class="w-2 h-2 mr-2 bg-green-600 rounded-full"></span>
                                            <span>Verified</span>
                                        </div>
                                    </td>
                                    @else
                                    <td class="px-6 py-4 text-red-500 whitespace-nowrap">
                                        <div class="inline-flex items-center px-2 text-xs font-semibold leading-5 text-red-800 bg-red-100 rounded-full">
                                            <span class="w-2 h-2 mr-2 bg-red-600 rounded-full"></span>
                                            <span>Unverified</span>
                                        </div>
                                    </td>
                                    @endif
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="text-sm text-gray-900">{{ $payment->verificator->name ?? '-' }} </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="text-sm text-gray-900">{{ $payment->note ?? '-' }}</span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center space-x-2 text-gray-400">
                                            <x-button-icon wire:click="showPaymentDetail({{ $payment->id }})">
                                                <x-icon-eye />
                                            </x-button-icon>
                                        </div>

                                    </td>
                                </tr>
                                @empty
                                <tr wire:loading.remove>
                                    <td colspan="7" class="p-6 text-sm text-center text-gray-500">
                                        <div class="flex items-center justify-center py-12">
                                            <x-icon-ban />
                                            <span class="ml-2 font-semibold">Tidak ada data yang ditemukan</span>
                                        </div>
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <div wire:loading.remove class="px-2 py-3 bg-gray-50 sm:px-6">
                            <div class="px-4 sm:px-0">
                                {{ $payments->links() }}
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
                        <x-jet-label for="filterStatus" value="Status Pembayaran" />
                        <select disabled wire:model="filterStatus" id="filterStatus" name="filterStatus" class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-gray-400 focus:border-gray-400 sm:text-sm">
                            <option value=''>Semua</option>
                            <option value="1">Verified</option>
                            <option value="0">Unverified</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @isset($paymentDetail)
    <x-slide-overs wire:model="panelPaymentDetail">
        <x-slot name="title">

        </x-slot>
        <h2 id="slide-over-heading" class="text-xl font-bold text-gray-900">
            {{ $paymentDetail->student->user->name }}
        </h2>
        <p class="text-sm">{{ $paymentDetail->student->user->username }}</p>

        <div class="mt-4">
            <x-jet-label for="date" :value="__('Tanggal Pembayaran')" />
            <x-jet-input wire:model.defer="date" id="date" class="block w-full mt-1" type="date" name="date" :value="old('date')" required />
            <x-jet-input-error for="date" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-jet-label for="amount" :value="__('Besar Pembayaran')" />
            <x-jet-input wire:model.defer="amount" id="amount" class="block w-full mt-1" type="number" name="amount" :value="old('amount')" required />
            <x-jet-input-error for="amount" class="mt-2" />
        </div>

        @isset($paymentDetail->attachment)
        <div class="mt-4">
            <x-jet-label for="attachment" :value="__('Bukti')" />
            <div class="mt-2">
                <a href="{{ Storage::url($paymentDetail->attachment) }}" target="_blank">
                    <x-jet-secondary-button>
                        Lihat Bukti
                    </x-jet-secondary-button>
                </a>
            </div>
        </div>
        @endisset

        <div class="mt-4">
            <x-jet-label for="note" :value="__('Catatan')" />
            <x-textarea wire:model.defer="note" id="note" rows="2" class="block w-full mt-1" maxlength=512></x-textarea>
            <x-jet-input-error for="note" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-6">
            <x-jet-action-message class="mr-3" on="saved">
                {{ __('Berhasil disimpan.') }}
            </x-jet-action-message>

            <x-dirty-message class="mr-3" target="note, date, attachment, amount">
                {{ __('Belum disimpan!') }}
            </x-dirty-message>

            <x-jet-button wire:click="update" wire:loading.attr="disabled">
                {{ __('Simpan') }}
            </x-jet-button>
        </div>

    </x-slide-overs>
    @endisset

</div>