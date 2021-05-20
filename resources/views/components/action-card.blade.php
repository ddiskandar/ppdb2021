@props([
    'completed' => false,
    'colors' => [
        'true' => 'text-white bg-green-500 hover:bg-green-600 border-none',
        'false' => 'text-gray-400 bg-white border-gray-200 hover:border-green-400',
    ],
    'action' => '#',
    'title' => 'Title',
    'description' => 'Description',
])

<div>
    <div {{ $attributes->merge(['class' => "{$colors[$completed]} relative w-full transition ease-in-out border-2 "]) }}>
        <a href="{{ $action }}">
        <div class="flex items-center h-full px-5 py-6 sm:py-8 sm:px-10 ">
            {{ $slot }}
            <div class="flex-1 ml-4">
                <div class="text-xl xl:text-2xl font-extrabold {{ ($completed === 'false') ? 'text-gray-900' : '' }} ">
                    {{ $title }}
                </div>
                <div class="text-sm">
                    {{ $description }}
                </div>
            </div>
        </div>
        <div class="absolute top-0 right-0 mt-3 mr-3 sm:mt-6 sm:mr-6">
            @if ($completed === 'true')
                <svg xmlns="http://www.w3.org/2000/svg" width="20.896" height="20.896"><path data-name="Path 45" d="M7.3 10.448l2.1 2.1 4.2-4.2m6.3 2.1A9.448 9.448 0 1110.448 1a9.448 9.448 0 019.452 9.448z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/></svg>
            @else
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"><path data-name="Path 61" d="M8 12l2-2m0 0l2-2m-2 2L8 8m2 2l2 2m7-2a9 9 0 11-9-9 9 9 0 019 9z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/></svg>
            @endif
        </div>
        </a>
    </div>
</div>