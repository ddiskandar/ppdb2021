<div class="flex items-center justify-start py-4">
    <x-jet-button wire:click="generate" wire:loading.attr="disabled">
        <span wire:loading.remove wire:target="generate">
            Generate User Permissions
        </span>
        <span wire:loading wire:target="generate">
            Generating User Permissions
        </span>
    </x-jet-button>

    <x-jet-action-message class="ml-3" on="saved">
        {{ __('Selesai') }}
    </x-jet-action-message>
</div>