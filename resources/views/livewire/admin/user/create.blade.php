<div>
    <x-slot name="title">
        {!! 'Invite New User' !!}
    </x-slot>
    <x-slot name="button">
        <a href="{{ route('admin.user.index') }}">
            <x-button-lg-right>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                     stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M6.75 15.75L3 12m0 0l3.75-3.75M3 12h18"/>
                </svg>
                Go Back
            </x-button-lg-right>
        </a>
    </x-slot>
    <x-admin.err-flush/>

    <div wire:loading.class="backdrop-blur-lg opacity-50">
        <form class="flex flex-col bg-white dark:bg-gray-800 px-5 py-5 justify-center text-gray-700
        dark:text-gray-300 space-y-2 rounded">

            <div class="flex flex-col sm:flex-row gap-2">
                <label for="form.name" class="w-full sm:w-2/3"> User Name:
                    <x-input type="text" name="form.name" wire:model.defer="form.name"
                             placeholder="Enter User's Full Name" required>
                    </x-input>
                    <x-jet-input-error for="form.name"></x-jet-input-error>
                </label>
                <label for="form.designation" class="w-full sm:w-1/3"> User Designation:
                    <x-input type="text" name="form.designation" wire:model.defer="form.designation"
                             placeholder="Enter User's Designation" required>
                    </x-input>
                    <x-jet-input-error for="form.designation"></x-jet-input-error>
                </label>
            </div>

            <div class="flex flex-col sm:flex-row gap-2">
                <label for="form.email" class="w-full sm:w-2/3"> User Email:
                    <x-input type="email" name="form.email" wire:model.defer="form.email"
                             placeholder="Enter User's Email" required>
                    </x-input>
                    <x-jet-input-error for="form.email"></x-jet-input-error>
                </label>
                <label for="form.role" class="w-full sm:w-1/3"> Select Role:
                    <x-select wire:model.defer="form.role" name="form.role" required>
                        <option> Select Role</option>
                        @foreach( $roles as $role)
                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                        @endforeach
                    </x-select>
                    <x-jet-input-error for="form.role"></x-jet-input-error>
                </label>
            </div>

            <div class="flex flex-row items-center justify-center">
                <x-button-lg-right type="submit" wire:click.prevent="inviteUser()"
                                   wire:loading.attr="disabled"
                                   class="w-1/3 my-2 text-center items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                         class="feather feather-send w-6 h-6 mr-2">
                        <line x1="22" y1="2" x2="11" y2="13"></line>
                        <polygon points="22 2 15 22 11 13 2 9 22 2"></polygon>
                    </svg>
                    {!! "Invite" !!}
                </x-button-lg-right>
            </div>

        </form>
    </div>

</div>
