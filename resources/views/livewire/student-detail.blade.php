<div>
    <x-slide-overs wire:model="panelStudentDetail">
        <x-slot name="title">

        </x-slot>
        <img class="w-32 h-32 rounded-full" src="/images/default-avatar.png" alt="">
        <h2 id="slide-over-heading" class="mt-6 text-xl font-bold text-gray-900">
            {{ $studentDetail->user->name }}
        </h2>
        <p class="text-sm">{{ $studentDetail->user->username }}</p>
        <div class="mt-6 ">
            <x-jet-label value="No. Handphone" />
            <div>
                {{ $studentDetail->phone ?? '-' }}
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
                {{ ($studentDetail->school->id != 1) ? $studentDetail->school->name : $studentDetail->school_temp }}
            </div>
        </div>
        <div class="mt-6 ">
            <x-jet-label value="Tempat, Tanggal Lahir" />
            <div>
                {{ $studentDetail->ttl() ?? '-' }}
            </div>
        </div>
        <div class="mt-6 ">
            <x-jet-label value="Alamat" />
            <div>
                {{ $studentDetail->full_address ?? '-' }}
            </div>
        </div>
        <div class="mt-6 ">
            <x-jet-label value="Nama Ayah" />
            <div>
                {{ $studentDetail->ortu->ayah_nama ?? '-' }}
            </div>
        </div>
        <div class="mt-6 ">
            <x-jet-label value="Nama Ibu" />
            <div>
                {{ $studentDetail->ortu->ibu_nama ?? '-' }}
            </div>
        </div>
    </x-slide-overs>
</div>