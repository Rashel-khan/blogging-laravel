@if ($message = Session::get('success'))
    <div
        {{ $attributes->merge(['class' => 'success bg-green-100 text-green-600 dark:text-green-400 dark:border-2 dark:border-green-200 dark:bg-transparent p-4 my-2 rounded-lg']) }}>

        {{ $message }}
    </div>
@endif
