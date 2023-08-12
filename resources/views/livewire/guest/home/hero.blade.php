<section class="bg-[url('/img/Web-hero-mobile.svg')] lg:bg-[url('/img/Web-hero.svg')] bg-no-repeat bg-cover
text-gray-200 overflow-x-hidden">
    <livewire:guest.components.nav/>

    <div class="overflow-hidden">
        <div class="flex flex-col mt-16 lg:mt-40 md:mt-24 sm:mt-24 justify-center items-center">

            <div class="text-center ">
                <h2 class="text-[3rem] font-bold text-transparent bg-clip-text tagline-animate
                bg-gradient-to-l from-blue-500 via-pink-400 via-50% to-indigo-500 mt-5 sm:mt-9 md:mt-32 lg:mt-1
                 uppercase animate__animated animate__fadeInDown">

                    Retrieving for the future
                </h2>
                <div class="animate__animated animate__headShake mt-2">

                    <a href="#features"
                       class="bg-blue-600 rounded-full px-8 py-2 text-gray-200 drop-shadow-lg hover:font-bold
                           hover:px-10 transition-all duration-200 italic">
                        Explore
                    </a>
                </div>
            </div>
            <div class="img-thumb text-center animate__animated animate__fadeInUp mt-6">
                <img class="img-fluid" src="{{ asset('img/hero-1.png') }}" alt="">
            </div>

        </div>

        <div class="mt-[10%] md:mt-[5%] sm:mt-[3%] ">
            <a href="#features" class="flex justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                     stroke-width="2" stroke="currentColor"
                     class="w-5 sm:w-11 h-8 sm:h-16 sm:py-4 py-2  border-blue-500/70 rounded-full border-2
                     text-blue-500 animate-bounce
                     ">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M12 4.5v15m0 0l6.75-6.75M12 19.5l-6.75-6.75"/>
                </svg>
            </a>

        </div>

    </div>
</section>


