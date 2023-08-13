
<header aria-label="Site Header"
        class="bg-gray-800 w-full flex justify-between items-center px-4 md:px-36"
        :class="{ 'h-20': !scrollFromTop,
        'h-12 fixed top-0 shadow-md z-[999]': scrollFromTop}">
    <a class="block font-bold text-xl text-orange-400" href="/">
        <span class="sr-only">{{ config('app.name') }}</span>
        {{ config('app.name') }}
    </a>

    <!-- nav bar -->
    <nav>
        <button class="rounded bg-transparent p-2 text-orange-400 transition hover:text-orange-400/75 md:hidden "
                x-on:click="navbarOpen = !navbarOpen">
            <svg
                xmlns="http://www.w3.org/2000/svg"
                class="h-8 w-8"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
                stroke-width="2">
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M4 6h16M4 12h16M4 18h16"
                />
            </svg>
        </button>

        <!-- navigation items -->
        <ul class="fixed left-0 right-0 min-h-screen bg-gray-800/75 md:bg-transparent space-y-4 p-4 z-[999]
            transform translate-x-full uppercase md:relative md:flex md:min-h-0 md:space-x-6 md:space-y-0 md:p-0
            md:translate-x-0 transition duration-200 items-center"
            :class="{ 'translate-x-full': !navbarOpen, 'translate-x-0 backdrop-blur': navbarOpen,
           'text-gray-200' : !scrollFromTop, 'md:text-gray-400' : scrollFromTop}">
            <li>
                <a class="hover:text-white md:hover:text-orange-400 mx-auto hover:font-bold"
                   href="/" x-on:click="navbarOpen = false">Home</a>
            </li>

            <li>
                <a class="hover:text-white md:hover:text-orange-400 hover:font-bold"
                   href="#features" x-on:click="navbarOpen = false">Blog</a>
            </li>
            <li>
                <a class="hover:text-white md:hover:text-orange-400 hover:font-bold"
                   href="#contact" x-on:click="navbarOpen = false">Contact</a>
            </li>
            <li>
                <a href="{{ route('login') }}">
                    <x-button-lg-right>Login</x-button-lg-right>
                </a>
            </li>


        </ul>
    </nav>

</header>


