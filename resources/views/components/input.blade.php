@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }}
    {!! $attributes->merge([
    'class' => 'w-full p-4 pr-12 text-sm bg-white border border-indigo-200 rounded-lg drop-shadow-xl dark:bg-gray-800 text-gray-600 dark:text-gray-400',
    ]) !!}/>
