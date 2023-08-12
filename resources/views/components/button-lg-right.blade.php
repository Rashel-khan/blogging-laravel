
<button
    {{ $attributes->merge(['class' => 'inline-flex items-center px-8 py-2 bg-gradient-to-r from-blue-500 to-indigo-500
hover:bg-gradient-to-l text-white rounded-md drop-shadow space-x-2']) }}>

    {{ $slot}}
</button>
