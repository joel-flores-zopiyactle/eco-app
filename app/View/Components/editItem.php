<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class editItem extends Component
{
    public $routeUrl;
    public $itemId;
    /**
     * Create a new component instance.
     */
    public function __construct($routeUrl, $itemId = 0)
    {
        $this->routeUrl = $routeUrl;
        $this->itemId = $itemId;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.edit-item');
    }
}
