@props(['active'])

@php
    $classes = ($active ?? false)
                ? 'flex items-center px-6 py-2 text-orange-400 hover:bg-gray-800 hover:dark:bg-gray-700 hover:bg-opacity-25 hover:text-gray-500 hover:dark:text-gray-200'
                : 'flex items-center px-6 py-2 text-gray-500 hover:bg-gray-500 hover:dark:bg-gray-700 hover:bg-opacity-25 hover:text-orange-400 focus:outline-none transition';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
