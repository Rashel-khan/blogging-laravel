<?php

namespace App\Http\Livewire\Admin\Roles;

use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use JetBrains\PhpStorm\NoReturn;
use Livewire\Component;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class Edit extends Component
{
    public $role, $permission, $selectedPermissions, $rolePermissions, $name;

   #[NoReturn] public function mount($id): void
    {
        $this->role = Role::find($id);
        $this->permission = Permission::get();
        $this->rolePermissions = DB::table("role_has_permissions")
            ->where("role_has_permissions.role_id", $id)
            ->pluck('role_has_permissions.permission_id', 'role_has_permissions.permission_id')
            ->all();
        $this->name = $this->role['name'];
        $r = implode(',', $this->rolePermissions);
        $this->selectedPermissions = explode(",", $r);
    }


    public function render(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
//        dd($this->rolePermissions);
        return view('livewire.admin.roles.edit')
            ->layout('layouts.dash', ['title' => 'Setting Role']);
    }

    /**
     * Update the specified resource in storage.
     *
     */
  public function update()
  {
        $validated=$this->validate([
            'name' => 'required',
            'selectedPermissions' => 'required',
        ]);

        $role = $this->role;
        $role->name = $validated['name'];
        $role->save();

        $role->syncPermissions($validated['selectedPermissions']);

        return redirect()->route('admin.roles.index')
            ->with('success', 'Role updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy(int $id): \Illuminate\Http\RedirectResponse
    {
        DB::table("roles")->where('id',$id)->delete();
        return redirect()->route('admin.roles.index')
            ->with('success','Role deleted successfully');
    }
}
