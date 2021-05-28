<div>

    <x-jet-button wire:click="create" wire:loading.attr="disabled" class="ml-4">
        {{ __('Tambah Pembayaran') }}
    </x-jet-button>

    <!-- Delete User Confirmation Modal -->
    <x-jet-dialog-modal wire:model="paymentCreate">
        <x-slot name="title">
            <div class="flex items-center justify-between mt-4">
                <h1 class="font-semibold font-3xl">
                    {{ __('Tambah Pembayaran') }}
                </h1>
                <x-button-icon wire:click="$toggle('paymentCreate')">
                    <x-icon-x-circle />
                </x-button-icon>
            </div>
        </x-slot>

        <x-slot name="content">
            <div class="grid grid-cols-6 gap-6">

                <div class="col-span-6 sm:col-span-5">
                    <x-jet-label for="student_id" :value="__('Nama Siswa Pendaftar')" />

                    <x-select wire:model="student_id" id="student_id" name="student_id" autocomplete="student_id" class="block w-full px-3 mt-1" required>
                        <option value="">{{ __('-- Pilih salah-satu') }}</option>

                        @foreach ($students as $student)
                        
                        @if( ! $student->payment_completed )
                            <option value={{ $student->id }}>{{ $student->user->name . ' (' . $student->user->username . ')' }}</option>
                        @endif

                        @endforeach
                    </x-select>
                    <x-jet-input-error for="student_id" class="mt-2" />

                </div>

                <div class="col-span-6 sm:col-span-4">
                    <x-jet-label for="date" :value="__('Tanggal Pembayaran')" />
                    <x-jet-input wire:model="date" id="date" class="block w-full mt-1" type="date" name="date" :value="old('date')" required />
                    <x-jet-input-error for="date" class="mt-2" />
                </div>

                <div class="col-span-6 sm:col-span-3">
                    <x-jet-label for="payment_amount" :value="__('Tarif Biaya Registrasi PPDB')" />
                    <x-jet-input wire:model="payment_amount" id="payment_amount" class="block w-full mt-1" type="number" name="payment_amount" :value="old('payment_amount')" required />
                    <x-jet-input-error for="payment_amount" class="mt-2" />
                </div>

                <div class="col-span-6 sm:col-span-3">
                    <x-jet-label for="amount" :value="__('Besar Pembayaran')" />
                    <x-jet-input wire:model="amount" id="amount" class="block w-full mt-1" type="number" name="amount" :value="old('amount')" required />
                    <x-jet-input-error for="amount" class="mt-2" />
                </div>

                <div class="col-span-6">
                    <x-jet-label for="note" :value="__('Catatan')" />
                    <x-textarea wire:model.defer="note" id="note" rows="2" class="block w-full mt-1" maxlength=512></x-textarea>
                    <x-jet-input-error for="note" class="mt-2" />
                </div>

            </div>

        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('paymentCreate')" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>

            <x-jet-button class="ml-2" wire:click="store" wire:loading.attr="disabled">
                {{ __('Simpan') }}
            </x-jet-button>
        </x-slot>

    </x-jet-dialog-modal>
</div>