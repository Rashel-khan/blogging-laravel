<?php

namespace App\Http\Livewire\Guest\Home;

use App\Models\Category;
use Livewire\Component;

class Hero extends Component
{
    public $categories;
    public function mount()
    {
        $category =Category::getActiveCategories();
        $this->categories= collect($category)->shuffle()->take(10)->toArray();
    }
    public function render()
    {
        return view('livewire.guest.home.hero');
    }
}
