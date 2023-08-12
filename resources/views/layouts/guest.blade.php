<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Retrieval IT').'-'. SEOMeta::getTitle() }}</title>
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">


    <meta name="title" content="{{ config('app.name').'-'. SEOMeta::getTitle()}}">
    <meta name="description" content="{{  SEOMeta::getDescription() }}">
    <meta name="keywords"
          content="Retrieval IT, Website design, web development, retrieve, pos solution, digital marketing, it company bd">
    <meta name="robots" content="index, follow">
    <meta name="revisit-after" content="2 days">
    <meta name="language" content="en">
    <meta name="author" content="Shakil Ahmed">
    <meta name="rating" content="general">
    <meta name="yandex-verification" content="3da65068d993958b"/>

    <meta property="og:title" content="{{ config('app.name').'-'. SEOMeta::getTitle()}}"/>
    <meta property="og:type" content="Website"/>
    <meta property="og:url" content="{{ url()->current() }}"/>
    <meta property="og:image" content="{{ asset('img/social-cover.png') }}"/>
    <meta property="og:description"
          content="{{ SEOMeta::getDescription() }}"/>
    <meta property="og:site_name" content="{{ config('app.name')}}"/>
    <meta property="og:locale" content="en_US"/>
    <meta property="og:locale:alternate" content="en_UK"/>

    <meta name="twitter:card" content="summary_large_image"/>
    <meta name="twitter:site" content="@ItRetrieval"/>
    <meta name="twitter:title" content="{{ config('app.name').'-'.SEOMeta::getTitle() }}"/>
    <meta name="twitter:description" content="{{ SEOMeta::getDescription() }}"/>
    <meta name="twitter:image" content="{{ asset('img/social-cover.png') }}"/>

    <!-- schema.org -->
    <script type="application/ld+json">
  {
    "@context": "https://schema.org/",
    "@type": "LocalBusiness",
    "name": "{{ config('app.name').'-'.SEOMeta::getTitle()}} ",
    "telephone": "+8801842055800",
    "logo": [ "{{ asset('img/Retrieval-IT-Logo.png') }}" ],
    "url":  "{{ url()->current() }}",
    "slogan": "Retrieving for the future",
    "description": "{{ SEOMeta::getDescription() }}"
    "founder": {
      "@type": "Person",
      "name": "{{ "Shakil Ahmed Bhuiyan" }}"
    },
    "keywords": "Retrieval IT, Website design, web development, retrieve, pos solution, digital marketing, it company bd",
    "currenciesAccepted": "BDT",
    "paymentAccepted": "Cash",
    "address": {
      "@type": "PostalAddress",
      "streetAddress": "1344/1, Poniout",
      "addressLocality": "Brahmanbaria Sadar",
      "addressRegion": "Brahmanbaria",
      "postalCode": "3400",
      "addressCountry": "BD"
      }
  }


    </script>

    <!-- Google Tag Manager -->
    <script>(function (w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start':
                    new Date().getTime(), event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s), dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-W5WH57P');</script>
    <!-- End Google Tag Manager -->

    <!-- style -->
    <link rel="stylesheet" type="text/css" href="{{ mix('css/app.css') }}"/>
    @livewireStyles
</head>
<body x-data="{navbarOpen: false, scrollFromTop: false}"
      @scroll.window="window.pageYOffset > 60 ? scrollFromTop = true : scrollFromTop = false"
      :class="{'overflow-hidden': navbarOpen, 'overflow-auto': !navbarOpen}"
      class="min-w-full m-0! p-0! font-sans text-gray-900 antialiased bg-gray-200 overflow-x-hidden">
<!-- Google Tag Manager (noscript) -->
<noscript>
    <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-W5WH57P"
            height="0" width="0" style="display:none;visibility:hidden"></iframe>
</noscript>
<!-- End Google Tag Manager (noscript) -->

<main class="overflow-x-hidden ">
    {{ $slot }}
</main>

<livewire:guest.components.footer/>

</body>

<!-- Scripts -->
<script src="{{ mix('js/app.js') }}" async defer></script>
@livewireScripts
@stack('footer-js')
</html>

