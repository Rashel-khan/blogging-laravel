<?php

namespace App\Http\Livewire\Admin\Profile;

use App\Models\Profile;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Index extends Component
{

    public $user, $socials, $summary, $description, $profile;

    public $validationAttributes = [
        'socials.facebook' => 'Facebook URL',
        'socials.twitter' => 'Twitter URL',
        'socials.instagram' => 'Instagram URL',
        'socials.linkedin' => 'LinkedIn URL',
        'socials.github' => 'Github URL',
        'socials.web' => 'Website URL',
    ];

    public function
    mount()
    {
        $this->user = Auth::user();
        $this->profile = Profile::with('user')->where('user_id', Auth::id())->first();
        if ($this->profile != null) {
            $this->socials = json_decode($this->profile->socials, true);
            $this->summary = $this->profile->summary;
            $this->description = $this->profile->description;
        }
    }

    public function render()
    {
        return view('livewire.admin.profile.index')
            ->layout('layouts.dash', ['title' => 'User Profile']);
    }

    public function saveSocials(): void
    {
        $this->validate([
            'socials.facebook' => 'nullable|url',
            'socials.twitter' => 'nullable|url',
            'socials.instagram' => 'nullable|url',
            'socials.linkedin' => 'nullable|url',
            'socials.github' => 'nullable|url',
            'socials.web' => 'nullable|url',
        ]);
        if ($this->profile != null) {
            $this->profile->update([
                'socials' => $this->socials,
            ]);
        } else {

            $profile = new Profile();
            $profile->user_id = $this->user->id;
            $profile->socials = json_encode($this->socials);
            $profile->save();
        }
        session()->flash('success', 'Socials saved successfully');
        $this->emit('success', 'Socials saved successfully');
    }

    public function saveSummary()
    {
        $this->validate([
            'summary' => 'required|min:10|max:200',
        ]);
        if ($this->profile != null) {
            $this->profile->update([
                'summary' => $this->summary,
            ]);
        } else {

            $profile = new Profile();
            $profile->user_id = $this->user->id;
            $profile->summary = $this->summary;
            $profile->save();
        }
        session()->flash('success', 'Summary saved successfully');
        $this->emit('success', 'Summary saved successfully');
    }

    public function saveDescription()
    {
        $this->validate([
            'description' => 'required|min:10|max:700',
        ]);
        if ($this->profile != null) {
            $this->profile->update([
                'description' => $this->description,
            ]);
        } else {

            $profile = new Profile();
            $profile->user_id = $this->user->id;
            $profile->description = $this->description;
            $profile->save();
        }
        session()->flash('success', 'Description saved successfully');
        $this->emit('success', 'Description saved successfully');
    }


}
