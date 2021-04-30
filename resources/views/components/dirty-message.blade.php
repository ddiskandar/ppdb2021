@props(['target'])

<span wire:dirty wire:target="{{$target}}" {{ $attributes->merge(['class' => 'text-sm text-red-600']) }}>
    {{ $slot->isEmpty() ? 'Belum disimpan!' : $slot }}
</span>