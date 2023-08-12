<x-slot name="title">Permission Management</x-slot>
<x-slot name="button">

    @if(url()->previous() && url()->current() != url()->previous())
        <a href="{{ url()->previous() }}">
            <x-button-lg-right>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                     stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M6.75 15.75L3 12m0 0l3.75-3.75M3 12h18"/>
                </svg>
                Go Back
            </x-button-lg-right>
        </a>
    @endif
</x-slot>


<div>
    <x-admin.success-msg>
    </x-admin.success-msg>
    @can('permission-create')
        {{-- Create Field --}}
        <form class="flex flex-col items-center justify-center sm:flex-row my-2 space-x-2">
            <div class="w-3/4">
                <x-input type="text" id="permission" name="permission"
                         wire:model.defer="permission" placeholder="Permission Name"></x-input>
                <x-jet-input-error for="permission"></x-jet-input-error>
            </div>
            <x-button-lg-right type="submit" wire:click.prevent="create">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                     stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"/>
                </svg>
                Create
            </x-button-lg-right>
        </form>
    @endcan

    @can('permission-edit')

        <livewire:admin.permissions.permission-table/>
    @else
        <livewire:datatable model="Spatie\Permission\Models\Permission"
                            exclude="created_at, guard_name"
                            sort="name|asc"
                            searchable="name">
        </livewire:datatable>
    @endcan
</div>

