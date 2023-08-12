<section id="roleIndex" wire:key="roleIndex">
    <x-slot name="title" class="text-lg text-blue-500 dark:text-blue-200">Role Management</x-slot>
    <x-slot name="button">
        <div class="grid grid-cols-2 gap-2">
            @can('role-create')
                <a href="{{ route('admin.roles.create') }}">
                    <x-button-lg-right type="button">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                             stroke="currentColor" class="w-6 h-6 mr-2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M11.42 15.17L17.25 21A2.652 2.652 0 0021 17.25l-5.877-5.877M11.42 15.17l2.496-3.03c.317-.384.74-.626 1.208-.766M11.42 15.17l-4.655 5.653a2.548 2.548 0 11-3.586-3.586l6.837-5.63m5.108-.233c.55-.164 1.163-.188 1.743-.14a4.5 4.5 0 004.486-6.336l-3.276 3.277a3.004 3.004 0 01-2.25-2.25l3.276-3.276a4.5 4.5 0 00-6.336 4.486c.091 1.076-.071 2.264-.904 2.95l-.102.085m-1.745 1.437L5.909 7.5H4.5L2.25 3.75l1.5-1.5L7.5 4.5v1.409l4.26 4.26m-1.745 1.437l1.745-1.437m6.615 8.206L15.75 15.75M4.867 19.125h.008v.008h-.008v-.008z"/>
                        </svg>

                        {!! "Create Role" !!}
                    </x-button-lg-right>
                </a>
            @endcan
            <a href="{{ route('admin.permission.index') }}">
                <x-button-lg-right>
                    Permissions
                </x-button-lg-right>
            </a>
        </div>

    </x-slot>

    <x-admin.success-msg>
    </x-admin.success-msg>

    <!-- Roles Table -->

    <table class="table-auto w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Action</th>
        </tr>
        @foreach ($roles as $key => $role)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $role->name }}</td>
                <td>
                    <a class="btn btn-info" href="{{ route('admin.roles.show', $role->id) }}">
                        <x-admin.show-button/>
                    </a>
                    @can('role-edit')
                        <a class="btn btn-primary" href="{{ route('admin.roles.edit', $role->id) }}">
                            <x-admin.edit-button/>
                        </a>
                    @endcan
                    @can('role-delete')
                        {{--                        {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline']) !!}--}}
                        <x-admin.delete-button type="submit"/>
                        {{--                            {!! Form::close() !!}--}}
                    @endcan
                </td>
            </tr>
        @endforeach

    </table>
</section>
