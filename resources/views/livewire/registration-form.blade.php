<div x-data="{ open: false, contact: true }">

    <div class="flex justify-center pt-6 mt-6 text-sm border-t border-gray-200">
        <a href="#" @click="open = ! open, contact = ! contact" class="inline-flex items-center justify-center px-12 py-3 text-sm font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-gray-800 border border-transparent rounded-md active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 hover:bg-gray-700">Daftar Sekarang</a>
    </div>

    <div x-show="open" x-cloak class="fixed inset-0 overflow-hidden">
        <div class="absolute inset-0 overflow-hidden">
            <div class="absolute inset-0 transition-opacity bg-gray-500 bg-opacity-75" aria-hidden="true" x-show="open" x-description="Background overlay, show/hide based on slide-over " x-transition:enter="ease-in-out duration-500" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="ease-in-out duration-500" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"></div>
            <section class="absolute inset-y-0 right-0 flex max-w-full pl-10" aria-labelledby="slide-over-heading">

                <div class="relative w-screen max-w-md" x-show="open" x-transition:enter="transform transition ease-in-out duration-500 sm:duration-700" x-transition:enter-start="translate-x-full" x-transition:enter-end="translate-x-0" x-transition:leave="transform transition ease-in-out duration-500 sm:duration-700" x-transition:leave-start="translate-x-0" x-transition:leave-end="translate-x-full">
                    <div class="absolute top-0 left-0 flex pt-4 pr-2 -ml-8 sm:-ml-10 sm:pr-4" x-show="open" x-description="Close button, show/hide based on slide-over " x-transition:enter="ease-in-out duration-500" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="ease-in-out duration-500" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
                        <button @click="open = ! open, contact = ! contact" class="text-gray-300 rounded-md hover:text-white focus:outline-none focus:ring-2 focus:ring-white">
                            <span class="sr-only">Close panel</span>
                            <!-- Heroicon name: x -->
                            <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>

                    <div x-cloak class="flex flex-col h-full py-6 overflow-y-scroll bg-white shadow-xl">
                        <div class="px-4 mt-6 sm:px-10">
                            <h2 id="slide-over-heading" class="text-lg font-bold text-gray-900">
                                Buat Akun
                            </h2>
                            <p class="text-sm">Semua formulir wajib diisi dengan benar</p>
                            @if( $hasRegisteredMessage )
                                <span>{{ $hasRegisteredMessage }}</span>
                            @endif
                        </div>
                        <div class="relative flex-1 px-4 mt-6 sm:px-10">

                            <form wire:submit.prevent="submit">

                                <!-- Pilihan Kelas -->
                                <div>
                                    <x-jet-label for="state.pilihan_kelas" :value="__('Pilihan Kelas')" />
                                    <x-select wire:model.lazy="state.pilihan_kelas" id="pilihan_kelas" name="pilihan_kelas" autocomplete="pilihan_kelas" class="block w-full px-3 mt-1">
                                        <option value="">{{ __('-- Pilih salah-satu') }}</option>
                                        <option value="0">{{ __('Regular') }}</option>
                                        <option value="1">{{ __('Boarding') }}</option>
                                    </x-select>
                                    <x-jet-input-error for="state.pilihan_kelas" class="mt-2" />
                                </div>

                                <!-- Name -->
                                <div class="mt-4">
                                    <x-jet-label for="state.name" :value="__('Nama Lengkap')" />
                                    <x-jet-input wire:model.lazy="state.name" id="name" class="block w-full mt-1 uppercase" type="text" name="name" :value="old('name')" autofocus />
                                    <x-jet-input-error for="state.name" class="mt-2" />
                                </div>

                                <!-- Jenis Kelamin -->
                                <div class="mt-4">
                                    <x-jet-label for="state.jk" :value="__('Jenis Kelamin')" />
                                    <x-select wire:model.lazy="state.jk" id="jk" name="jk" autocomplete="jk" class="block w-full px-3 mt-1">
                                        <option value="">{{ __('-- Pilih salah-satu') }}</option>
                                        <option value="L">{{ __('Laki-laki') }}</option>
                                        <option value="P">{{ __('Perempuan') }}</option>
                                    </x-select>
                                    <x-jet-input-error for="state.jk" class="mt-2" />
                                </div>

                                <!-- Email Address -->
                                <div class="mt-4">
                                    <x-jet-label for="state.nisn" :value="__('NISN')" />
                                    <x-jet-input wire:model.lazy="state.nisn" id="nisn" class="block w-full mt-1" type="text" maxlength="10" name="nisn" :value="old('nisn')" />
                                    <x-jet-input-error for="state.nisn" class="mt-2" />
                                </div>

                                <!-- Email Address -->
                                <div class="mt-4">
                                    <x-jet-label for="state.phone" :value="__('Nomor HP/Whatsapp')" />
                                    <x-jet-input wire:model.lazy="state.phone" id="phone" class="block w-full mt-1" type="text" name="phone" :value="old('phone')" />
                                    <x-jet-input-error for="state.phone" class="mt-2" />
                                </div>

                                <!-- Asal Sekolah -->
                                <div class="mt-4">
                                    <x-jet-label for="state.school_id" :value="__('Asal Sekolah')" />
                                    <select wire:model.lazy="state.school_id" id="school_id" name="school_id" class="block w-full mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 ">
                                        <option value="">{{ __('-- Pilih salah satu') }}</option>
                                        @foreach ($schools as $school )
                                        <option value={{ $school->id }}>{{ $school->name }}</option>
                                        @endforeach
                                    </select>
                                    <x-jet-input-error for="state.school_id" class="mt-2" />
                                </div>

                                <!-- Email Address -->
                                <div class="mt-4">
                                    <x-jet-label for="state.ibu_nama" :value="__('Nama Ibu Kandung')" />
                                    <x-jet-input wire:model.lazy="state.ibu_nama" id="ibu_nama" class="block w-full mt-1" type="text" name="ibu_nama" :value="old('ibu_nama')" />
                                    <x-jet-input-error for="state.ibu_nama" class="mt-2" />
                                </div>

                                <!-- Password -->
                                <div class="mt-4">
                                    <x-jet-label for="state.password" :value="__('Password ( digunakan untuk login aplikasi )')" />
                                    <x-jet-input wire:model.lazy="state.password" id="password" class="block w-full mt-1" type="password" name="password" autocomplete="new-password" />
                                    <x-jet-input-error for="state.password" class="mt-2" />
                                </div>

                                <!-- Confirm Password -->
                                <div class="mt-4">
                                    <x-jet-label for="state.password_confirmation" :value="__('Tulis ulang Password')" />
                                    <x-jet-input wire:model.lazy="state.password_confirmation" id="password_confirmation" class="block w-full mt-1" type="password" name="password_confirmation" />
                                </div>

                                <div class="flex items-center mt-4">

                                    <x-jet-button wire:loading.attr="disabled" wire:target="submit" class="justify-center w-full py-3 mt-4">
                                        {{ __('Daftar') }}
                                    </x-jet-button>

                                </div>

                                <div class="py-6 mt-6 text-sm text-red-500 border-t border-gray-200">
                                    <p class="">{{ __('Bila sebelumnya sudah terdaftar, akan tetapi lupa nomor registrasi atau password. Maka tidak harus kembali mendaftar akun baru. ') }}</p>
                                    <p class="mt-4">{!! __('Silahkan dapat menghubungi panitia, dengan cara <strong><a href="https://wa.me/6285624028940" target="_blank">Klik disini</a></strong> ') !!}</p>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>

    <div x-show="contact">
        <div class="fixed p-4 text-white bg-green-500 rounded-full shadow-lg md:animate-bounce right-4 bottom-6">
            <a href="https://wa.me/6285793424303" target="_blank">
                <svg class="w-6 h-6" fill="currentColor" stroke="none" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path d="M.057 24l1.687-6.163a11.867 11.867 0 01-1.587-5.946C.16 5.335 5.495 0 12.05 0a11.817 11.817 0 018.413 3.488 11.824 11.824 0 013.48 8.414c-.003 6.557-5.338 11.892-11.893 11.892a11.9 11.9 0 01-5.688-1.448L.057 24zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z" />
                </svg>
            </a>
        </div>
    </div>

</div>