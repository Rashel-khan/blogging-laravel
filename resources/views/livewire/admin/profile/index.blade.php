<x-slot name="title">
    {!! ('Profile') !!}
</x-slot>

<x-slot name="button">
    @if( url()->previous()!=null && URL::previous() !== URL::current())
        <a href="{{ URL::previous() }}">
            <x-button-lg-right type="button">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                     stroke="currentColor" class="w-6 h-6 mr-2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M6.75 15.75L3 12m0 0l3.75-3.75M3 12h18"/>
                </svg>
                {!! 'Go Back' !!}
            </x-button-lg-right>
        </a>
    @endif
    <a href="{{ route('admin.user.setting') }}">
        <x-button-lg-right type="button">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                 stroke="currentColor" class="w-6 h-6 mr-2">
                <path stroke-linecap="round" stroke-linejoin="round"
                      d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.324.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 011.37.49l1.296 2.247a1.125 1.125 0 01-.26 1.431l-1.003.827c-.293.24-.438.613-.431.992a6.759 6.759 0 010 .255c-.007.378.138.75.43.99l1.005.828c.424.35.534.954.26 1.43l-1.298 2.247a1.125 1.125 0 01-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.57 6.57 0 01-.22.128c-.331.183-.581.495-.644.869l-.213 1.28c-.09.543-.56.941-1.11.941h-2.594c-.55 0-1.02-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 01-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 01-1.369-.49l-1.297-2.247a1.125 1.125 0 01.26-1.431l1.004-.827c.292-.24.437-.613.43-.992a6.932 6.932 0 010-.255c.007-.378-.138-.75-.43-.99l-1.004-.828a1.125 1.125 0 01-.26-1.43l1.297-2.247a1.125 1.125 0 011.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.087.22-.128.332-.183.582-.495.644-.869l.214-1.281z"/>
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
            </svg>
            {!! 'Setting' !!}
        </x-button-lg-right>
    </a>
</x-slot>

<div class="my-1">
    <div>
        <x-admin.success-msg></x-admin.success-msg>
        <x-admin.err-flush></x-admin.err-flush>
    </div>
    <div class="flex flex-col md:flex-row sm:space-x-4 space-y-4 sm:space-y-0">


        <div class="bg-gray-100 dark:bg-gray-800 rounded-lg">
            @if(isset($profile->feature) && $profile->feature == 1)
                <span class="bg-blue-500 rounded-lg px-5 py-2 text-white">
                   Featured</span>
            @endif
            <div class="flex flex-col p-4">
                <div class="flex-shrink-0">
                    <img class="w-32 h-32 rounded-full" src="{{ $user->profile_photo_url }}" alt="{{ $user->name }}">
                </div>
                <div class="mt-4">
                    <h1 class="font-semibold text-gray-700 dark:text-gray-200 capitalize">
                        {{ $user->name }}
                    </h1>
                    <p class="text-sm font-medium text-gray-700 dark:text-gray-200 flex flex-row items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                             stroke="currentColor" class="w-5 h-5 mr-2">
                            <path stroke-linecap="round"
                                  d="M16.5 12a4.5 4.5 0 11-9 0 4.5 4.5 0 019 0zm0 0c0 1.657 1.007 3 2.25 3S21 13.657 21 12a9 9 0 10-2.636 6.364M16.5 12V8.25"/>
                        </svg>

                        {{ $user->email }}
                    </p>
                    @if( $user->designation )
                        <p class="text-sm font-medium text-gray-700 dark:text-gray-200 flex flex-row items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                 stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M20.25 14.15v4.25c0 1.094-.787 2.036-1.872 2.18-2.087.277-4.216.42-6.378.42s-4.291-.143-6.378-.42c-1.085-.144-1.872-1.086-1.872-2.18v-4.25m16.5 0a2.18 2.18 0 00.75-1.661V8.706c0-1.081-.768-2.015-1.837-2.175a48.114 48.114 0 00-3.413-.387m4.5 8.006c-.194.165-.42.295-.673.38A23.978 23.978 0 0112 15.75c-2.648 0-5.195-.429-7.577-1.22a2.016 2.016 0 01-.673-.38m0 0A2.18 2.18 0 013 12.489V8.706c0-1.081.768-2.015 1.837-2.175a48.111 48.111 0 013.413-.387m7.5 0V5.25A2.25 2.25 0 0013.5 3h-3a2.25 2.25 0 00-2.25 2.25v.894m7.5 0a48.667 48.667 0 00-7.5 0M12 12.75h.008v.008H12v-.008z"/>
                            </svg>
                            {{ $user->designation }}

                        </p>
                    @endif
                    <p class="text-sm font-medium text-gray-700 dark:text-gray-200 capitalize">
                        {{ $user->roles->first()->name }}
                    </p>
                </div>
                <form class="mt-3 pt-2 border-t-2 border-blue-500/50">
                    <table class="w-full text-gray-700 dark:text-gray-400">
                        <tbody>

                        <tr>
                            <th class="whitespace-nowrap pr-4">
                                <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path fill-rule="evenodd"
                                          d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"
                                          clip-rule="evenodd"></path>
                                </svg>
                            </th>
                            <td>
                                <x-jet-input id="name" type="text" value="{{ old('socials.facebook') }}"
                                             wire:model="socials.facebook"/>
                                <x-jet-input-error for="socials.facebook"/>
                            </td>
                        </tr>
                        <tr>
                            <th class="whitespace-nowrap pr-4">
                                <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path
                                        d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84"></path>
                                </svg>
                            </th>
                            <td>
                                <x-jet-input id="name" type="text" value="{{ old('socials.twitter') }}"
                                             wire:model="socials.twitter"/>
                                <x-jet-input-error for="socials.twitter"/>
                            </td>
                        </tr>
                        <tr>
                            <th class="whitespace-nowrap pr-4">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16"
                                     class="h-5 w-5" fill="currentColor">
                                    <path
                                        d="M8 0c4.42 0 8 3.58 8 8a8.013 8.013 0 0 1-5.45 7.59c-.4.08-.55-.17-.55-.38 0-.27.01-1.13.01-2.2 0-.75-.25-1.23-.54-1.48 1.78-.2 3.65-.88 3.65-3.95 0-.88-.31-1.59-.82-2.15.08-.2.36-1.02-.08-2.12 0 0-.67-.22-2.2.82-.64-.18-1.32-.27-2-.27-.68 0-1.36.09-2 .27-1.53-1.03-2.2-.82-2.2-.82-.44 1.1-.16 1.92-.08 2.12-.51.56-.82 1.28-.82 2.15 0 3.06 1.86 3.75 3.64 3.95-.23.2-.44.55-.51 1.07-.46.21-1.61.55-2.33-.66-.15-.24-.6-.83-1.23-.82-.67.01-.27.38.01.53.34.19.73.9.82 1.13.16.45.68 1.31 2.69.94 0 .67.01 1.3.01 1.49 0 .21-.15.45-.55.38A7.995 7.995 0 0 1 0 8c0-4.42 3.58-8 8-8Z"></path>
                                </svg>
                            </th>
                            <td>
                                <x-jet-input id="name" type="text" value="{{ old('socials.github') }}"
                                             wire:model="socials.github"/>
                                <x-jet-input-error for="socials.github"/>
                            </td>
                        </tr>
                        <tr>
                            <th class="whitespace-nowrap pr-4">
                                <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path fill-rule="evenodd"
                                          d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z"
                                          clip-rule="evenodd"></path>
                                </svg>
                            </th>
                            <td>
                                <x-jet-input id="name" type="text" value="{{ old('socials.instagram') }}"
                                             wire:model="socials.instagram"/>
                                <x-jet-input-error for="socials.instagram"/>
                            </td>
                        </tr>
                        <tr>
                            <th class="whitespace-nowrap pr-4">
                                <svg fill="currentColor" id="lni_lni-linkedin-original"
                                     viewBox="0 0 64 64" xml:space="preserve" class="h-5 w-5">
                                <path d="M58.5,1H5.6C3.1,1,1.1,3,1.1,5.5v53c0,2.4,2,4.5,4.5,4.5h52.7c2.5,0,4.5-2,4.5-4.5V5.4C63,3,61,1,58.5,1z M19.4,53.7h-9.1
                                	V24.2h9.1V53.7z M14.8,20.1c-3,0-5.3-2.4-5.3-5.3s2.4-5.3,5.3-5.3s5.3,2.4,5.3,5.3S17.9,20.1,14.8,20.1z M53.9,53.7h-9.1V39.4
                                		c0-3.4-0.1-7.9-4.8-7.9c-4.8,0-5.5,3.8-5.5,7.6v14.6h-9.1V24.2h8.9v4.1h0.1c1.3-2.4,4.2-4.8,8.7-4.8c9.3,0,11,6,11,14.2v16H53.9z"></path>
                            </svg>
                            </th>
                            <td>
                                <x-jet-input id="name" type="text" value="{{ old('socials.linkedin') }}"
                                             wire:model="socials.linkedin"/>
                                <x-jet-input-error for="socials.linkedin"/>
                            </td>
                        </tr>
                        <tr>
                            <th class="whitespace-nowrap pr-4">

                                <svg xmlns="http://www.w3.org/2000/svg"
                                     viewBox="0 0 24 24" class="h-5 w-5"
                                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round">
                                    <path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"></path>
                                    <path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"></path>
                                </svg>
                            </th>
                            <td>
                                <x-jet-input id="name" type="text" value="{{ old('socials.web') }}"
                                             wire:model="socials.web"/>
                                <x-jet-input-error for="socials.web"/>
                            </td>
                        </tr>

                        </tbody>
                    </table>

                    <div class="mt-2 flex justify-end items-center">
                        <x-button-lg-right type="submit" wire:click.prevent="saveSocials" class="!py-1">
                            {!! "Save" !!}
                        </x-button-lg-right>
                    </div>


                </form>
            </div>
        </div>
        <div class="w-full space-y-4 ">

            <div class="w-full bg-gray-100 dark:bg-gray-800 rounded-lg p-5">
                <label for="summary" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Bio <span class="text-xs font-light opacity-75">(200 character max)</span> </label>
                <textarea id="summary" rows="4" wire:model.defer="summary"
                          class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                          placeholder="Write in short about you...."></textarea>
                <x-jet-input-error for="summary"/>
                <div class="mt-2 flex justify-end items-center">
                    <x-button-lg-right type="submit" wire:click.prevent="saveSummary" class="!py-1">
                        {!! "Save" !!}
                    </x-button-lg-right>
                </div>

            </div>

            <div class="w-full bg-gray-100 dark:bg-gray-800 rounded-lg p-5">
                <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Description</label>
                <textarea id="description" rows="8" wire:model.defer="description"
                          class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                          placeholder="Write your thoughts here..."></textarea>
                <x-jet-input-error for="description"/>
                <div class="mt-2 flex justify-end items-center">
                    <x-button-lg-right type="submit" wire:click.prevent="saveDescription" class="!py-1">
                        {!! "Save" !!}
                    </x-button-lg-right>
                </div>
            </div>

        </div>

    </div>
</div>



