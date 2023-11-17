<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class badgeItem extends Component
{
    public $isPublished;
    /**
     * Create a new component instance.
     */
    public function __construct($isPublished = false)
    {
        $this->isPublished = $isPublished;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.badge-item');
    }
}
