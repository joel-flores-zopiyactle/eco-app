<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Back extends Component
{
    public $routeUrl;
    /**
     * Create a new component instance.
     */
    public function __construct($routeUrl = '#')
    {
        $this->routeUrl = $routeUrl;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.back');
    }
}
