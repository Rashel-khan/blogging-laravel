<?php

namespace App\Http\Livewire\Admin\Roles;


use Livewire\Component;
use Spatie\Permission\Models\Role;

class Show extends Component
{
    public $role;

    public function mount($id)
    {
        $this->role = Role::where('roles.id', $id)
            ->with('permissions')
            ->first();
    }

    public function render()
    {
        return view('livewire.admin.roles.show')
            ->layout('layouts.dash', ['title' => $this->role['name'] . ' Role']);
    }
}
