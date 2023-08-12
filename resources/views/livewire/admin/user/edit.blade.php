<x-slot name="title">Edit User | {{ $user->name }}</x-slot>
<x-slot name="button">
    <a href="{{ route('admin.user.index') }}">
        <x-button-lg-right>Go Back</x-button-lg-right>
    </a>
</x-slot>
<div>
    <x-jet-validation-errors></x-jet-validation-errors>
    <form class="my-2 bg-white dark:bg-gray-800 rounded p-5 text-gray-800 dark:text-gray-200">

        <div>
            <h3 class="underline underline-offset-2">Current Information:</h3>
            <ul>
                <li>Name: {{ $user->name}}</li>
                <li>Email: {{ $user->email}}</li>
                <li>Status:
                    @if( $user->OTP_status)
                        Verified
                    @else
                        Panding
                    @endif
                </li>
                <li> Designation: <x-jet-input type="text" wire:model="designation" name="designation"
                                               id="designation" value="{{ $user->designation }}"/>
                </li>
            </ul>
        </div>
        <div class="mb-2">
            <strong>Roles:</strong>
            <div class="grid grid-col-4 md:grid-cols-3 sm:grid-cols-2 gap-4">
                @foreach($roles as $r)
                    <label>
                        <input type="checkbox" wire:model="selectedRoles" name="selectedRoles"
                               id="{{ $r->id }}"
                               value="{{ $r->id }}">

                        {{ $r->name }}
                    </label>
                @endforeach

                <x-button-lg-right type="button" wire:click.prevent="edit">Save</x-button-lg-right>
            </div>

        </div>

    </form>

</div>
