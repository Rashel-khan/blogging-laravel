@if ( session()->has('errors'))
    <div
        {{ $attributes->merge(['class' => 'bg-red-100 text-red-600 dark:text-red-400 dark:border-2 dark:border-red-200 dark:bg-transparent p-4 my-2 rounded-lg']) }}>

        {{  session('errors') }}
    </div>
@endif
