<?php

namespace App\Http\Livewire\Guest;


use Artesaos\SEOTools\Facades\SEOMeta;
use Livewire\Component;

class Index extends Component
{

    public function render()
    {
        SEOMeta::setTitle("Latest Tech Blog");
        return view('livewire.guest.index')
            ->layout('layouts.guest');
    }
}
