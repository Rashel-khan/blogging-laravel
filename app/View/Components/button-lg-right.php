<?php

namespace App\View\Components;

class button-lg-right extends Component
{

    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.button-lg-right');
    }
}
