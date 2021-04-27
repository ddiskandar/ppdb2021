<button {{ $attributes->merge(['class' => ' text-gray-300 hover:text-gray-500 focus:outline-none focus:border-transparent focus:ring focus:ring-transparent disabled:opacity-25 transition']) }}>
    {{ $slot }}
</button>