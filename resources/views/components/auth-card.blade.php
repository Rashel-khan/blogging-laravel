
<div class="bg-gray-100">
    <div class="bg-[url('/img/Web-hero-mobile.svg')] lg:bg-[url('/img/Web-hero.svg')] bg-no-repeat bg-cover
lg:min-h-screen md:min-h-[60vh]">
        <div class="min-h-screen flex flex-col sm:justify-center items-center mt-5 sm:-mt-12">
            @if(isset($logo))
                <div>
                    {{ $logo }}
                </div>
            @endif

            <div
                class="w-full sm:max-w-md mt-6 px-6 py-4  bg-white shadow-2xl overflow-hidden sm:rounded-lg">
                {{ $slot }}
            </div>
        </div>

    </div>
</div>
