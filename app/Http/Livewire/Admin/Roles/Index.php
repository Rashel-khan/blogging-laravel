<?php

namespace App\Http\Livewire\Admin\Roles;
use Illuminate\Http\Request;
use Livewire\Component;
use Spatie\Permission\Models\Role;


class Index extends Component
{

    public function render(Request $request)
    {
        $this->roles = Role::orderBy('id','DESC')->get();
        return view('livewire.admin.roles.index')
            ->with('i', ($request->input('page', 1) - 1) * 5)
            ->layout('layouts.dash',['title'=>'Roles and permissions']);
    }
}
