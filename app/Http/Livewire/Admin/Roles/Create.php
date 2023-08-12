<?php

namespace App\Http\Livewire\Admin\Roles;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Livewire\Component;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class Create extends Component
{
    public $name;
    public $permissions = [];


    public function render()
    {
        $permission = Permission::get();
        return view('livewire.admin.roles.create', compact('permission'))
            ->layout('layouts.dash', ['title' => 'Create Role']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store()
    {
        $validated = $this->validate([
            'name' => 'required|unique:roles,name',
            'permissions' => 'required',
        ]);

        $role = Role::create(['guard_name' => 'web','name' => $validated['name']]);
        $role->syncPermissions($validated['permissions']);

        return redirect(route('admin.roles.index'))
            ->with('success', 'Role created successfully');
    }
}
