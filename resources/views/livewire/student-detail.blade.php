<div>
    <x-slide-overs wire:model="slider">
        <x-slot name="title">

        </x-slot>
        <img class="w-32 h-32 rounded-full" src="/images/default-avatar.png" alt="">
        <h2 id="slide-over-heading" class="mt-6 text-xl font-bold text-gray-900">
            {{ ddd($selectedStudent) }}
            {{ $selectedStudent->user->name ?? '-' }}
        </h2>
        <p class="text-sm">{{ $selectedStudent->user->username ?? '-' }}</p>
        <div class="mt-6 ">
            <x-jet-label value="No. Handphone" />
            <div>
                {{ $selectedStudent->phone ?? '-' }}
                <div class="inline-flex items-center ml-4">
                    <div class="flex items-center h-5 ">
                        <input wire:model="join_wa" id="join_wa" name="join_wa" type="checkbox" class="w-4 h-4 text-green-600 border-gray-300 rounded focus:ring-green-500">
                    </div>
                    <div class="ml-2 ">
                        <label for="join_wa" class="text-sm font-medium text-gray-500">Gabung Grup WA</label>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-6 ">
            <x-jet-label value="Asal Sekolah" />
            <div>
                {{ ($selectedStudent->school->id != 1) ? $selectedStudent->school->name : $selectedStudent->school_temp }}
            </div>
        </div>
        <div class="mt-6 ">
            <x-jet-label value="Tempat, Tanggal Lahir" />
            <div>
                {{ $selectedStudent->ttl() ?? '-' }}
            </div>
        </div>
        <div class="mt-6 ">
            <x-jet-label value="Alamat" />
            <div>
                {{ $selectedStudent->full_address ?? '-' }}
            </div>
        </div>
        <div class="mt-6 ">
            <x-jet-label value="Nama Ayah" />
            <div>
                {{ $selectedStudent->ortu->ayah_nama ?? '-' }}
            </div>
        </div>
        <div class="mt-6 ">
            <x-jet-label value="Nama Ibu" />
            <div>
                {{ $selectedStudent->ortu->ibu_nama ?? '-' }}
            </div>
        </div>
    </x-slide-overs>
</div>