<div class="z-[999] dark:border-r dark:border-orange-500/50">

    <div x-cloak :class="sidebarOpen ?'block': 'hidden'" @click="sidebarOpen = !sidebarOpen"
         class="inset-0 transition-opacity bg-black opacity-50 lg:hidden backdrop-blur-md"></div>

    <div x-cloak
         :class="sidebarOpen ? 'hidden translate-x-0 ease-out lg:static lg:inset-0' : '-translate-x-full ease-in'"
         class="inset-y-0 h-full left-0  w-60 overflow-y-auto transition-all duration-300 transform
         dark:bg-gray-900 bg-gray-100 shadow-md translate-x-0 ">

        <!-- Sidebar Header -->
        <div class=" items-center justify-center my-2">
            <div class="flex items-center justify-center py-2 px-4">
              <h1 class="text-orange-400 text-[2.5rem] font-bold">
                  {{ config('app.name') }}
              </h1>
            </div>
            <hr class="border-orange-500/50"/>
        </div>

        <nav class="mt-5">

            <x-dash-link :active="request()->routeIs('admin.dashboard') " href="{{ route('admin.dashboard') }}">
                <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                     stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z"/>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z"/>
                </svg>
                <span class="mx-3">Dashboard</span>
            </x-dash-link>

            <div id="articleManagement">
                <div class="relative mt-3 mb-2">
                    <p class="flex text-gray-500/50 bg-gray-100 dark:bg-gray-900 justify-center items-center absolute
                     right-0 -bottom-3 rounded-full px-2">
                        Article Management
                    </p>
                    <hr class="border-blue-500/50"/>
                </div>

                <!-- Article -->
                <x-dash-link class="mt-3" :active="request()->routeIs('admin.blog.index')"
                             href="{{ route('admin.blog.index') }}">
                    <svg fill="currentColor" viewBox="0 0 64 64" class="h-6 w-6">
                        <g>
                            <path
                                d="M39.6,50.1H24.4c-1.2,0-2.3,1-2.3,2.3s1,2.3,2.3,2.3h15.3c1.2,0,2.3-1,2.3-2.3S40.9,50.1,39.6,50.1z"/>
                            <path d="M24.1,34.3h15.8c2.3,0,4.3-1.9,4.3-4.3v-5.9c0-2.3-1.9-4.3-4.3-4.3H24.1c-2.3,0-4.3,1.9-4.3,4.3V30
		C19.9,32.3,21.8,34.3,24.1,34.3z M24.4,24.4h15.3v5.4H24.4V24.4z"/>
                            <path d="M17,6.3h35.4c1.2,0,2.3-1,2.3-2.3s-1-2.3-2.3-2.3H17c-4,0-7.2,3.1-7.5,7c0,0.1,0,0.2,0,0.3v47c0,3.4,2.9,6.1,6.5,6.1h32.9
		c2.8,0,5.1-2.3,5.1-5.1V17c0-2.8-2.3-5.1-5.1-5.1H16.7c0,0,0,0,0,0c0,0,0,0,0,0c-1.7,0-2.7-1-2.7-2.6C13.9,7.6,15.3,6.3,17,6.3z
		 M16.6,16.4C16.6,16.4,16.7,16.4,16.6,16.4C16.7,16.4,16.7,16.4,16.6,16.4h32.2c0.3,0,0.6,0.3,0.6,0.6v40.2c0,0.3-0.3,0.6-0.6,0.6
		H15.9c-1.1,0-2-0.7-2-1.6V16C14.7,16.3,15.6,16.4,16.6,16.4z"/>
                        </g>
                    </svg>

                    <span class="mx-3">Articles</span>
                </x-dash-link>

                <!-- Category -->
                <x-dash-link :active="request()->routeIs('admin.blog.category.index') "
                             href="{{ route('admin.blog.category.index') }}">
                    <svg fill="currentColor" viewBox="0 0 64 64" class="h-6 w-6">
                        <g>
                            <path d="M21.7,3.4H9c-3.4,0-6.2,2.8-6.2,6.2v12.7c0,3.4,2.8,6.2,6.2,6.2h12.7c3.4,0,6.2-2.8,6.2-6.2V9.7C28,6.2,25.2,3.4,21.7,3.4z
		 M23.5,22.4c0,1-0.8,1.8-1.8,1.8H9c-1,0-1.8-0.8-1.8-1.8V9.7c0-1,0.8-1.8,1.8-1.8h12.7c1,0,1.8,0.8,1.8,1.8V22.4z"/>
                            <path d="M55,3.4H42.3c-3.4,0-6.2,2.8-6.2,6.2v12.7c0,3.4,2.8,6.2,6.2,6.2H55c3.4,0,6.2-2.8,6.2-6.2V9.7C61.2,6.2,58.4,3.4,55,3.4z
		 M56.8,22.4c0,1-0.8,1.8-1.8,1.8H42.3c-1,0-1.8-0.8-1.8-1.8V9.7c0-1,0.8-1.8,1.8-1.8H55c1,0,1.8,0.8,1.8,1.8V22.4z"/>
                            <path d="M21.7,35.3H9c-3.4,0-6.2,2.8-6.2,6.2v12.7c0,3.4,2.8,6.2,6.2,6.2h12.7c3.4,0,6.2-2.8,6.2-6.2V41.6
		C28,38.1,25.2,35.3,21.7,35.3z M23.5,54.3c0,1-0.8,1.8-1.8,1.8H9c-1,0-1.8-0.8-1.8-1.8V41.6c0-1,0.8-1.8,1.8-1.8h12.7
		c1,0,1.8,0.8,1.8,1.8V54.3z"/>
                            <path d="M55,35.3H42.3c-3.4,0-6.2,2.8-6.2,6.2v12.7c0,3.4,2.8,6.2,6.2,6.2H55c3.4,0,6.2-2.8,6.2-6.2V41.6
		C61.2,38.1,58.4,35.3,55,35.3z M56.8,54.3c0,1-0.8,1.8-1.8,1.8H42.3c-1,0-1.8-0.8-1.8-1.8V41.6c0-1,0.8-1.8,1.8-1.8H55
		c1,0,1.8,0.8,1.8,1.8V54.3z"/>
                        </g>
                    </svg>

                    <span class="mx-3">{!! 'Category' !!} </span>
                </x-dash-link>

                <!-- Tags -->
                <x-dash-link>
                    <svg fill="currentColor" viewBox="0 0 64 64" class="h-6 w-6">
                        <path d="M57.4,16.3c0-2.3-1.9-4.1-4.2-4.2L44.4,12C40.2,5.6,32.7-0.7,21.3,1.1c-1.2,0.2-2.1,1.3-1.9,2.6c0.2,1.2,1.3,2.1,2.6,1.9
	c8-1.3,13.4,2.4,16.7,6.4l-6.3-0.1c0,0-0.1,0-0.1,0c-1.1,0-2.2,0.5-3,1.2L8.1,34.2c-1.2,1.2-1.8,2.7-1.8,4.4s0.6,3.2,1.8,4.4
	l18.3,18.3c1.2,1.2,2.8,1.8,4.4,1.8s3.2-0.6,4.4-1.8l21.2-21.2c0,0,0,0,0,0c0.8-0.8,1.3-1.9,1.2-3.1L57.4,16.3z M32.1,58.2
	c-0.7,0.7-1.8,0.7-2.5,0L11.3,39.9c-0.3-0.3-0.5-0.8-0.5-1.2c0-0.5,0.2-0.9,0.5-1.2l21.2-21.2l9.4,0.2c0.4,0.8,0.7,1.5,1,2.1
	c-1.7,1-2.8,2.9-2.8,5c0,3.2,2.6,5.8,5.8,5.8s5.8-2.6,5.8-5.8c0-2.7-1.8-4.9-4.3-5.6c-0.2-0.4-0.3-0.9-0.5-1.3l6,0.1l0.4,20.4
	L32.1,58.2z M45.8,22.1c0.7,0,1.3,0.6,1.3,1.3s-0.6,1.3-1.3,1.3s-1.3-0.6-1.3-1.3S45.1,22.1,45.8,22.1z"/>
                    </svg>

                    <span class="mx-3">{!! 'Tags' !!} </span>
                </x-dash-link>
            </div>

            <div id="userManagement">
                <div class="relative mt-3 mb-2">
                    <p class="flex text-gray-500/50 bg-gray-100 dark:bg-gray-900 justify-center items-center absolute right-0 -bottom-3 rounded-full px-2">
                        User Management
                    </p>
                    <hr class="border-blue-500/50"/>
                </div>

                <!-- users -->
                <x-dash-link class="mt-3" :active="request()->routeIs('admin.user.index')"
                             href="{{ route('admin.user.index') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor"
                         stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                         class="h-6 w-6 feather feather-users">
                        <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                        <circle cx="9" cy="7" r="4"></circle>
                        <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                        <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                    </svg>
                    <span class="mx-3">Users</span>
                </x-dash-link>

                <!-- Roles and Permission -->
                <x-dash-link :active="request()->routeIs('admin.roles.index') " href="{{ route('admin.roles.index') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                         stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M6 13.5V3.75m0 9.75a1.5 1.5 0 010 3m0-3a1.5 1.5 0 000 3m0 3.75V16.5m12-3V3.75m0 9.75a1.5 1.5 0 010 3m0-3a1.5 1.5 0 000 3m0 3.75V16.5m-6-9V3.75m0 3.75a1.5 1.5 0 010 3m0-3a1.5 1.5 0 000 3m0 9.75V10.5"/>
                    </svg>

                    <span class="mx-3">{!! 'Role & Permission' !!} </span>
                </x-dash-link>
            </div>


            <hr class="my-2 border-red-400/50"/>


        </nav>
    </div>

</div>
