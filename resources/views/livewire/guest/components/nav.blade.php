
<header aria-label="Site Header"
        class="w-full flex justify-between items-center px-4 md:px-36 transition-all duration-200"
        :class="{ 'h-24': !scrollFromTop,
        'h-12 fixed md:text-gray-800 top-0 bg-gray-200 shadow-md z-[999]': scrollFromTop}">
    <a class="block text-teal-600" href="/">
        <span class="sr-only">Retrieval IT</span>
        <x-nav-logo></x-nav-logo>
    </a>

    <!-- nav bar -->
    <nav>
        <button class="rounded bg-transparent p-2 text-blue-600 transition hover:text-gray-600/75 md:hidden "
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
            md:translate-x-0 transition duration-200"
            :class="{ 'translate-x-full': !navbarOpen, 'translate-x-0 backdrop-blur': navbarOpen,
           'text-gray-200' : !scrollFromTop, 'md:text-gray-800' : scrollFromTop}">
            <li>
                <a class="hover:text-white md:hover:text-blue-500 mx-auto hover:font-bold"
                   href="/" x-on:click="navbarOpen = false">Home</a>
            </li>

            <li>
                <a class="hover:text-white md:hover:text-blue-500 hover:font-bold"
                   href="#features" x-on:click="navbarOpen = false">Features</a>
            </li>
            <li>
                <a class="hover:text-white md:hover:text-blue-500 hover:font-bold"
                   href="#services" x-on:click="navbarOpen = false">Services</a>
            </li>
            <li>
                <a class="hover:text-white md:hover:text-blue-500 hover:font-bold"
                   href="#team" x-on:click="navbarOpen = false">Team</a>
            </li>
            <li>
                <a class="hover:text-white md:hover:text-blue-500 hover:font-bold"
                   href="#contact" x-on:click="navbarOpen = false">Contact</a>
            </li>


        </ul>
    </nav>

</header>


