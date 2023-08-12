<?php

namespace App\Http\Livewire\Admin\User;

use App\Models\Profile;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $search, $perPage;
    public $refresh = false;

    public function render()
    {
        $users = User::with('roles', 'profile')
            ->where('name', 'like', '%' . $this->search . '%')
            ->orWhere('email', 'like', '%' . $this->search . '%')
            ->orWhere('designation', 'like', '%' . $this->search . '%')
            ->paginate($this->perPage ?: 10);
        return view('livewire.admin.user.index', compact('users'))
            ->layout('layouts.dash', ['title' => 'Users Index']);

    }

    public function setFeatured($id)
    {
        $user = profile::where('user_id', $id)->first();
        $user->feature = $user->feature == 1 ? 0 : 1;
        $user->save();
        session()->flash('success', 'User featured status updated successfully.');
        $this->refresh = !$this->refresh;
    }
}
