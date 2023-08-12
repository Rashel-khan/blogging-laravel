<?php

namespace App\Http\Livewire\Admin\User;


use App\Models\User;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class Edit extends Component
{
    public $user, $userId, $selectedRoles, $roles, $designation;

    public function mount($id)
    {
        $this->userId = $id;
        $this->user = User::with('roles')
            ->where('id', $id)
            ->first();
        $this->roles = Role::all();
        $ur = DB::table('model_has_roles')
            ->where('model_id', $id)
            ->pluck('model_has_roles.role_id', 'model_has_roles.role_id')
            ->all();
        $ur = implode(',', $ur);
        $this->selectedRoles = explode(",", $ur);
    }

    public function render()
    {
        return view('livewire.admin.user.edit')
            ->layout('layouts.dash', ['title' => 'User Setting']);
    }

    public function edit()
    {
        $validated = $this->validate([
            'selectedRoles' => 'required| exists:roles,id',
            'designation' => 'nullable|string|min:2',
        ]);
        $user = $this->user;
        try {
            $user->designation = $validated['designation'];
            $user->syncRoles([$validated['selectedRoles']]);
            $user->save();
            return redirect()->route('admin.user.index')
                ->with('success', 'User Role updated successfully');
        } catch (\Exception $e) {
            return session()->flash('errors', 'Error updating user role');
        }

    }
}
