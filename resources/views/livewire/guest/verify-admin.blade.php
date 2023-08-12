<x-auth-card>
    <x-slot name="nav">
        <livewire:guest.components.nav x-bind:class="text-gray-200"/>
    </x-slot>

    @if (session('status'))
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ session('status') }}
        </div>
    @endif

    <form id="verify-admin" wire:submit.prevent={{ session('valid-otp')? "confirmAccount": "verifyOTP" }}>
        <p class="text-lg font-medium mb-2 flex justify-center">Verify Your Invitation</p>
        <x-admin.err-flush/>
        <div>
            <x-jet-label for="email" value="{{ __('Email') }}"></x-jet-label>
            <div class="relative m-1">
                <x-input id="email" type="email" wire:model.defer="form.email" :value="old('form.email')" required
                         autofocus
                         placeholder="Enter your email address"></x-input>
                <span class="absolute inset-y-0 inline-flex items-center right-4">
                        <svg xmlns="http://www.w3.org/2000/svg"
                             class="w-5 h-5 text-gray-400"
                             fill="none" viewBox="0 0 24 24"
                             stroke="currentColor">
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"
                            />
                        </svg>
                    </span>
            </div>
            <x-jet-input-error for="form.email" class="mt-2"></x-jet-input-error>
        </div>

        <div>
            <x-jet-label for="otp" value="{{ __('OTP') }}"></x-jet-label>
            <div class="relative m-1">
                <x-input id="otp" type="text" wire:model.defer="form.otp" :value="old('form.otp')" required
                         placeholder="Enter your OTP"></x-input>
                <span class="absolute inset-y-0 inline-flex items-center right-4">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                             stroke="currentColor" class="w-5 h-5 text-gray-400">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z"/>
                        </svg>
                    </span>
            </div>
            <x-jet-input-error for="form.otp" class="mt-2"></x-jet-input-error>
        </div>
        @if (session('valid-otp'))
            <div class="mt-4" x-data="{ showPass: true }">
                <x-jet-label for="password" value="{{ __('Password') }}"></x-jet-label>
                <div class="relative m-1">
                    <x-input id="password" x-bind:type="showPass ? 'password' : 'text'"
                             wire:model.defer="password" :value="old('password')" required
                             placeholder="Enter New Password">
                    </x-input>
                    <span class="absolute inset-y-0 inline-flex items-center right-4">
                          <svg xmlns="http://www.w3.org/2000/svg"
                               class="w-5 h-5 text-gray-400"
                               @click="showPass = !showPass"
                               :class="{'hidden': !showPass, 'block':showPass}"
                               fill="none" viewBox="0 0 24 24" stroke="currentColor">
                              <path stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                              <path stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                          </svg>

                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none"
                             viewBox="0 0 24 24"
                             stroke="currentColor" stroke-width="2"
                             @click="showPass = !showPass"
                             :class="{'block': !showPass, 'hidden':showPass }">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"/>
                        </svg>

                    </span>
                </div>
                <x-jet-input-error for="password" class="mt-2"></x-jet-input-error>
            </div>
        @endif

        <div class="flex items-center justify-end mt-4">

            <x-button-lg-right type="submit" class="ml-4 hover:px-12">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                     class="h-6 w-6 mr-2 feather feather-log-in">
                    <path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4"></path>
                    <polyline points="10 17 15 12 10 7"></polyline>
                    <line x1="15" y1="12" x2="3" y2="12"></line>
                </svg>
                {{ __('Verify') }}
            </x-button-lg-right>
        </div>

    </form>


</x-auth-card>
