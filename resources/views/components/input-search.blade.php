@props([ 'disabled' => false ])

<div class="relative flex-1">
    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
        <svg fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24" class="w-5 h-5 text-gray-400">
            <path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
        </svg>
    </div>

    <input wire:model.debounce.300ms="search" type="search" {!! $attributes->merge(['class' => 'block w-full pl-10 border-gray-300 shadow-xs sm:rounded-md sm:text-sm sm:leading-5 focus:border-gray-300 focus:ring focus:ring-gray-200 focus:ring-opacity-50']) !!} >
    
</div>