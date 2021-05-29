<div>

    <div class="pb-12 mx-auto max-w-7xl">
        <div class="md:grid md:grid-cols-3 md:gap-6">
            <div class="md:col-span-1">
                <div class="px-4 sm:px-0">
                    <h3 class="text-lg font-medium leading-6 text-gray-900">Pembayaran Registrasi PPDB</h3>
                    <p class="mt-1 text-sm text-gray-600">
                        Untuk pembayaran dapat datang langsung ke sekretariat PPDB atau melalui transfer.
                    </p>
                </div>
            </div>
            <div class="mt-5 md:mt-0 md:col-span-2">
                <div class="px-4 sm:px-0 md:col-span-2">
                    <div class="relative w-full overflow-hidden bg-white rounded-md shadow-md">
                        <div class="px-6 py-8 ">
                            <div class="grid grid-cols-2 gap-6">
                                <div class="col-span-2 lg:col-span-1">
                                    <div class="text-sm text-gray-400 uppercase">No. Rekening</div>
                                    <div class="text-2xl ">1047100027 </div>
                                    <div class="">BNI Syariah a/n SMK Plus Al-Farhan</div>
                                </div>
                                <div class="col-span-2 lg:col-span-1">
                                    <div class="text-sm text-gray-400 uppercase">Sekretariat</div>
                                    <div class="">SMK Plus Al-Farhan</div>
                                    <div class="text-sm">Jalan Cisarua Km. 03 Cimahigirang Ds. Citamiang <br> Kec. Kadudampit Kab. Sukabumi 43153</div>
                                </div>
                            </div>
                            <div class="grid grid-cols-2 gap-6 mt-6">
                                <div class="col-span-2 lg:col-span-1">
                                    <div class="text-sm text-gray-400 uppercase">Biaya pendaftaran</div>
                                    <div class="text-2xl">
                                        Rp. 150.021,-
                                    </div>
                                </div>
                                <div class="col-span-2 lg:col-span-1">
                                    <div class="text-sm text-gray-400 uppercase">Status Pembayaran</div>

                                    @if($student->payment_completed)
                                    <div class="flex items-center mt-2 text-sm font-semibold text-green-600"><svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        <span class="ml-1">Sudah Lunas</span>
                                    </div>
                                    @else
                                    <div class="flex items-center mt-2 text-sm font-semibold text-red-600"><svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        <span class="ml-1">Belum Lunas</span>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>

    @empty ( $payment )
    <x-jet-form-section submit="save">
        <x-slot name="title">
            {{ __('Unggah bukti pembayaran') }}
        </x-slot>

        <x-slot name="description">
            {{ __('Pastikan nominal sesuai dengan yang tertulis, agar proses verifikasi lebih cepat. Panitia akan memverifikasi pembayaran anda maksimal 2x24 jam.') }}
        </x-slot>

        <x-slot name="form">
            <div class="col-span-4">
                <div class="relative block overflow-hidden ">
                    <div class="flex items-center">
                        <x-jet-label for="attachment" value="{{ __('Bukti Pembayaran') }}" class="mr-3" />
                    </div>

                    <input wire:model.defer="attachment" id="attachment" type="file" class="mt-2" />
                    <x-jet-input-error for="attachment" class="mt-2" />
                    @if($attachment)
                    <img alt="payments" class="object-cover h-56 mt-4 bg-white w-80 rounded-xl" src="{{ $attachment->temporaryUrl() }}">
                    @endif

                </div>
            </div>

            <div class="col-span-6 sm:col-span-3">
                <x-jet-label for="date" value="{{ __('Tanggal Pembayaran') }}" />
                <x-jet-input wire:model.defer="date" id="date" type="date" class="block w-full mt-1" />
                <x-jet-input-error for="date" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-3">
                <x-jet-label for="amount" value="{{ __('Besar Pembayaran') }}" />
                <x-jet-input wire:model.defer="amount" id="amount" type="text" class="block w-full mt-1" />
                <x-jet-input-error for="amount" class="mt-2" />
            </div>

        </x-slot>

        <x-slot name="actions">
            <x-jet-action-message class="mr-3" on="saved">
                {{ __('Berhasil disimpan.') }}
            </x-jet-action-message>

            <x-dirty-message class="mr-3" target="">
                {{ __('Belum disimpan!') }}
            </x-dirty-message>

            <x-jet-button>
                {{ __('Simpan') }}
            </x-jet-button>
        </x-slot>
    </x-jet-form-section>

    @endempty

</div>