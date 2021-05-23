<div class="py-4">
    <x-jet-button wire:click="generate" wire:loading.attr="disabled">
        <span wire:loading.remove wire:target="generate">
            Generate
        </span>
        <span wire:loading wire:target="generate">
            Generating Permissions
        </span>
    </x-jet-button>
</div>