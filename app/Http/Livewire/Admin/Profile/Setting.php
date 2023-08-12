<?php

namespace App\Http\Livewire\Admin\Profile;

use Livewire\Component;

class Setting extends Component
{
    public function render()
    {
        return view('livewire.admin.profile.setting')
            ->layout('layouts.dash', ['title' => 'Profile Settings']);
    }
}
