@props(['value'])

<dd {{ $attributes->merge(['class' => 'block text-gray-900']) }}>
    {{ $value ?? $slot }}
</dd>