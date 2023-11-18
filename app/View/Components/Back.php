<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Back extends Component
{
    public $routeUrl;
    public $param;
    /**
     * Create a new component instance.
     */
    public function __construct($routeUrl = '#', $param = false)
    {
        $this->routeUrl = $routeUrl;
        $this->param = $param;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.back');
    }
}
