<?php

namespace App\Http\Livewire\Guest\Home;

use App\Models\User;
use Livewire\Component;

class Team extends Component
{
    public $team;

    public function mount()
    {
        $users = User::with('profile')
            ->whereHas('profile', function ($query) {
                $query->where('feature', true);
            })
            ->get();
        $this->team = $users->toArray();
    }

    public function render()
    {
        return view('livewire.guest.home.team');
    }
}
