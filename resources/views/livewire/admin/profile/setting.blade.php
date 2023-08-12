<x-slot name="title">
    {!!    ('Profile Settings')!!}
</x-slot>

<x-slot name="button">
    <a href="{{ route('admin.user.profile') }}">
        <x-button-lg-right type="button">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                 stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                      d="M6.75 15.75L3 12m0 0l3.75-3.75M3 12h18"/>
            </svg>
        </x-button-lg-right>
    </a>
</x-slot>


<div>
    <div class="py-10">
        @if (Laravel\Fortify\Features::canUpdateProfileInformation())
            @livewire('profile.update-profile-information-form')
            <x-jet-section-border/>
        @endif
    </div>
    @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
        <div>
            @livewire('profile.update-password-form')
        </div>
        <x-jet-section-border/>
    @endif
    @if (Laravel\Fortify\Features::canManageTwoFactorAuthentication())
        <div>
            @livewire('profile.two-factor-authentication-form')
        </div>
        <x-jet-section-border/>
    @endif

    <div>
        @livewire('profile.logout-other-browser-sessions-form')
    </div>

    @if (Laravel\Jetstream\Jetstream::hasAccountDeletionFeatures())
        <x-jet-section-border/>

        <div>
            @livewire('profile.delete-user-form')
        </div>
    @endif

</div>
