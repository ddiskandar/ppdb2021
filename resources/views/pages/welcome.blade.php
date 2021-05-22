<x-guest-layout>
    <div class="py-16 bg-gray-100 lg:py-20">
        <div class="px-0 mx-auto max-w-7xl lg:px-24">
            <div class="sm:mt-0">
                <div class="lg:grid lg:grid-cols-12">
                    <div class="lg:col-span-7">
                        <div class="h-full px-4 lg:flex-col lg:justify-center sm:px-0 lg:flex">
                            <div class="lg:w-5/6">
                                <h2 class="text-xl font-bold lg:text-2xl">
                                    {{ __('PPDB ONLINE') }}
                                </h2>
                                <h1 class="mb-4 text-2xl font-extrabold text-green-700 lg:text-4xl">
                                    {{ __('SMK Plus Al-Farhan') }}
                                </h1>
                                <p class="mt-6 text-sm lg:text-base">
                                    {{ __('Untuk calon pendaftar tahun ajaran 2021/2022 bisa mendaftar melalui portal website ini atau langsung datang ke Sekretariat Pendaftaran.') }}
                                </p>

                                <div class="mt-6 text-sm lg:text-base">
                                    Sekretariat : Jalan Cisarua Km. 03 Cimahigirang Ds. Citamiang Kec. Kadudampit Kab. Sukabumi 43153
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="mt-8 lg:mt-0 lg:col-span-5">

                        <div class="p-6 bg-white shadow-2xl md:rounded-md lg:px-12 lg:py-10">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf

                                <div class="mb-6">
                                    <h2 id="slide-over-heading" class="text-xl font-bold text-gray-900">
                                        {{ __('Selamat Datang') }}
                                    </h2>
                                    <p class="mt-2 text-sm">
                                        {!! __('Masukkan kombinasi <strong>Nomor Registrasi</strong> dan <strong>Password</strong> yang telah terdaftar untuk masuk ke portal PPDB.') !!}
                                    </p>
                                </div>

                                <x-jet-validation-errors class="mb-4" />

                                <x-jet-input id="username" class="block w-full mt-3 placeholder-gray-400" type="text" name="username" :value="old('username')" placeholder="Nomor Registrasi" required />

                                <x-jet-input id="password" class="block w-full mt-3 placeholder-gray-400" type="password" name="password" :value="old('password')" placeholder="Password" required />

                                <x-jet-button class="w-full py-3 mt-4 bg-green-600 hover:bg-green-500">
                                    {{ __('LOGIN') }}
                                </x-jet-button>

                                <div class="mt-6 text-sm text-center">
                                    <a href="https://wa.me/6285624028940">
                                        {{ __('Lupa Nomor Registrasi atau Password? ') }}
                                    </a>
                                </div>

                            </form>

                            @livewire('registration-form')

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>