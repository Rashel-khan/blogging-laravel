<x-slot name="title">
    {!! $role['name'] .' Role' !!}
</x-slot>

<x-slot name="button">
    <a class="btn btn-primary" href="{{ route('admin.roles.index') }}">
        <x-button-lg-right type="button">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                 stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                      d="M6.75 15.75L3 12m0 0l3.75-3.75M3 12h18"/>
            </svg>
        </x-button-lg-right>
    </a>
</x-slot>


<div class="flex flex-col justify-center space-x-2">
    <x-jet-validation-errors></x-jet-validation-errors>
    <div class="mb-2">
        <x-input type="text" id="name" readonly
                 value="{{ $role['name'] }}" placeholder="Role Name" required></x-input>
    </div>

    <div class="mb-2">
        <strong>Permission:</strong>
        <div class="grid grid-col-4 md:grid-cols-3 sm:grid-cols-2 gap-4">

            @foreach($role->permissions as $p)
                <label>
                    <input type="checkbox" checked id="{{ $p->id }}" value="{{ $p->id }}" readonly>

                    {{ $p->name }}
                </label>

            @endforeach
        </div>

    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        @can('role-edit')
            <a class="btn btn-primary" href="{{ route('admin.roles.edit', $role->id) }}">
                <x-admin.edit-button/>
            </a>
        @endcan
    </div>
</div>


