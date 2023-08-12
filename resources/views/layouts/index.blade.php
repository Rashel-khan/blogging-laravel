<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="referrer" content="always">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="title" content="{{ config('app.name')}}">
    <meta name="robots" content="none">

    <title>{{ config('app.name')}} @if(isset($title))
            {!! '| '.$title !!}
        @endif</title>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}" data-turbolinks-track="reload">

    @livewireStyles
</head>
<body>
<div x-data="{ sidebarOpen: false }" class="flex h-screen bg-gray-200 dark:bg-gray-900" id="app">
    @livewire('admin.components.sidebar')

    <div class="flex-1 flex flex-col overflow-hidden">
        @livewire('admin.components.header')

        <main class="flex-1 overflow-x-hidden overflow-y-auto">
            <section class="container mx-auto px-6 py-8" id="dashboard" wire:key="dashboard">
                @isset($title)
                    <section class="mb-4 flex justify-between items-center border-b-2 border-blue-500/50 pb-1">
                        <h2 class="text-lg text-blue-500 dark:text-blue-200 capitalize">{{ $title }}</h2>
                        @isset($button)
                            <div class="z-10">
                                {{ $button }}
                            </div>
                        @endisset
                    </section>
                @endisset
                @isset($message)
                    <section>
                        {{ $message }}
                    </section>
                @endisset

                {{ $slot }}


            </section>

        </main>
    </div>
</div>

@stack('modals')

<!-- Scripts -->
<script src="{{ mix('js/app.js') }}" defer data-turbolinks-track="reload"></script>
@livewireScripts
@stack('footer-js')
<script src="https://cdn.jsdelivr.net/gh/livewire/turbolinks@v0.1.x/dist/livewire-turbolinks.js"
        data-turbolinks-eval="false"></script>


</body>
</html>
