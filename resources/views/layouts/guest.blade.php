<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name').'-'. SEOMeta::getTitle() }}</title>
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <meta name="title" content="{{ config('app.name').'-'. SEOMeta::getTitle()}}">
    <meta name="robots" content="index, follow">
    <meta name="language" content="en">
    <!-- style -->
    <link rel="stylesheet" type="text/css" href="{{ mix('css/app.css') }}"/>
    @livewireStyles
</head>
<body x-data="{navbarOpen: false, scrollFromTop: false}"
      @scroll.window="window.pageYOffset > 60 ? scrollFromTop = true : scrollFromTop = false"
      :class="{'overflow-hidden': navbarOpen, 'overflow-auto': !navbarOpen}"
      class="min-w-full m-0! p-0! font-sans text-gray-900 antialiased bg-gray-200 overflow-x-hidden">
@livewire('guest.components.nav')

<main class="overflow-x-hidden ">
    {{ $slot }}
</main>

@livewire('guest.components.footer')

</body>

<!-- Scripts -->
<script src="{{ mix('js/app.js') }}" async defer></script>
@livewireScripts
@stack('footer-js')
</html>

