<?php

namespace App\Http\Livewire\Admin\Permissions;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;
use Spatie\Permission\Models\Permission;


class Index extends Component
{
    use AuthorizesRequests;
    protected $listeners = [
        'success' => '$refresh',
    ];
    public $show = false;
    public $permission;

    public function render()
    {
        return view('livewire.admin.permissions.index')
            ->layout('layouts.dash', ['title'=> 'Permission Index']);
    }

    public function create()
    {
        $validated=$this->validate([
            'permission'=> 'required|unique:permissions,name'
        ]);
        Permission::create(['guard_name' => 'web','name' => $validated['permission']]);
        $this->permission= null;
        $this->emit('refreshTable');

    }
}
