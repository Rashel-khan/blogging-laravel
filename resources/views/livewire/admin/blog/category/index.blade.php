<div>
    <x-slot name="button">
        @can('blog-category-create')
            <a href="{{ route('admin.blog.category.create') }}">
                <x-button-lg-right type="button">
                    <svg fill="currentColor" class="h-5 w-5 mr-2" x="0px" y="0px" viewBox="0 0 64 64">
                        <g>
                            <path d="M42.2,29.7C42.2,29.7,42.2,29.7,42.2,29.7l-8,0l0-7.9c0-1.2-1-2.2-2.3-2.2c0,0,0,0,0,0c-1.2,0-2.2,1-2.2,2.3l0,7.9l-7.9,0
		c-1.2,0-2.2,1-2.2,2.3c0,1.2,1,2.2,2.3,2.2c0,0,0,0,0,0l7.9,0l0,7.9c0,1.2,1,2.2,2.3,2.2c0,0,0,0,0,0c1.2,0,2.2-1,2.2-2.3l0-7.9
		l7.9,0c1.2,0,2.2-1,2.2-2.3C44.4,30.7,43.4,29.7,42.2,29.7z"/>
                            <path d="M32,1.8C15.3,1.8,1.8,15.3,1.8,32c0,16.7,13.6,30.3,30.3,30.3c16.7,0,30.3-13.6,30.3-30.3C62.3,15.3,48.7,1.8,32,1.8z
		 M32,57.8C17.8,57.8,6.3,46.2,6.3,32S17.8,6.3,32,6.3S57.8,17.8,57.8,32S46.2,57.8,32,57.8z"/>
                        </g>
                    </svg>
                    {!! "Add New" !!}
                </x-button-lg-right>
            </a>
        @endcan
    </x-slot>
    <x-admin.success-msg/>
    <x-admin.err-flush/>
    <x-jet-validation-errors/>

    <div class="py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
        <div class="flex flex-row justify-between items-center mb-2 ">
            <x-input class="w-2/4 md:w-2/4" name="search" wire:model.delay="search"
                     placeholder="Search by Name"></x-input>
            <label for="perPage"
                   class="flex flex-row items-center justify-end gap-2 text-gray-700 dark:text-gray-400">
                <x-select class="w-1/4 " wire:model="perPage" id="perPage">
                    <option class="!text-gray-700" disabled>Select Per Page</option>
                    <option value="5">10</option>
                    <option value="10">25</option>
                    <option value="20">35</option>
                </x-select>
            </label>
        </div>

        <div
            class="align-middle inline-block min-w-full shadow overflow-hidden sm:rounded-lg border-b border-gray-200">

            <table class="min-w-full" wire:loading.class="opacity-50">
                <thead>
                <tr>
                    <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 dark:bg-gray-700 text-left text-xs leading-4 font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">
                        Name
                    </th>
                    <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 dark:bg-gray-700 text-left text-xs leading-4 font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">
                        Description
                    </th>
                    @if( Auth::user()->can('set-feature-category'))
                        <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 dark:bg-gray-700 text-left text-xs leading-4 font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">
                            Featured
                        </th>
                    @endif
                    <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 dark:bg-gray-700 text-left text-xs leading-4 font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">
                        Actions
                    </th>
                </tr>
                </thead>

                <tbody class="bg-gray-100 dark:bg-gray-800">
                @forelse($categories as $cat )
                    <tr>
                        <td class="px-6 py-4 w-1/4 border-b border-gray-200">
                            <div class="flex flex-col justify-center items-start">
                                <div class="flex flex-row text-sm leading-5 items-center font-medium text-gray-900
                                dark:text-gray-200">
                                    {{ $cat->name }}
                                    @if($cat->status == 1)
                                        <span class="text-blue-500 ml-2 items-start justify-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                 stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                      d="M9 12.75L11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 01-1.043 3.296 3.745 3.745 0 01-3.296 1.043A3.745 3.745 0 0112 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 01-3.296-1.043 3.745 3.745 0 01-1.043-3.296A3.745 3.745 0 013 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 011.043-3.296 3.746 3.746 0 013.296-1.043A3.746 3.746 0 0112 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 013.296 1.043 3.746 3.746 0 011.043 3.296A3.745 3.745 0 0121 12z"/>
                                            </svg>
                                        </span>
                                    @endif
                                </div>
                                <div class="flex flex-col text-xs text-gray-600 dark:text-gray-400">
                                    <span>
                                        {{ $cat->slug }}
                                    </span>
                                    <span>
                                        {{ "updated : " .$cat->updated_at->diffForHumans() }}
                                    </span>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 border-b border-gray-200 w-2/4">
                            <p class="line-clamp-2 text-gray-600 dark:text-gray-400">
                                {!! $cat->description !!}
                            </p>
                        </td>

                        @if( Auth::user()->can('set-feature-category'))
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5">
                                <label class="flex items-center relative w-max cursor-pointer select-none">
                                    <input type="checkbox" class="appearance-none transition-colors cursor-pointer
                                            w-14 h-7 rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2
                                            focus:ring-offset-black focus:ring-blue-500 bg-red-500"
                                           {{ $cat->featured ==1 ? 'checked' : '' }}
                                           wire:click="setFeatured({{ $cat->id }})"/>
                                    <span class="absolute font-medium text-xs uppercase right-1 text-white"> OFF </span>
                                    <span class="absolute font-medium text-xs uppercase right-8 text-white"> ON </span>
                                    <span class="w-7 h-7  {{ $cat->featured== 1 ? 'right-0' : 'left-0' }}
                                    absolute rounded-full transform transition-transform bg-gray-200"/>
                                </label>
                            </td>
                        @endif

                        <td class="px-6 py-4 w-1/4  border-b border-gray-200 text-sm leading-5">
                            <a href="#">
                                <x-admin.show-button/>
                            </a>

                            @if(Auth::user()->can('blog-category-edit'))
                                <a href="{{ route('admin.blog.category.edit', $cat->id) }}">
                                    <x-admin.edit-button/>
                                </a>
                            @endif

                        </td>

                    </tr>
                @empty
                    <tr>
                        <td colspan="{{ Auth::user()->can('feature-user-set')? 5:4 }}"
                            class="px-6 py-4 text-center text-gray-700 dark:text-gray-400 font-medium">
                               <span class="flex flex-row justify-center items-center gap-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                         stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z"/>
                                </svg>
                                   {!! 'No User Found' !!}
                               </span>
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
    {{ $categories->links('pagination::tailwind') }}

</div>
