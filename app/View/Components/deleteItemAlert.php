<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class deleteItemAlert extends Component
{
    public $routeUrl;
    public $itemId;
    public $title;
    public $subtitle;
    /**
     * Create a new component instance.
     */
    public function __construct($routeUrl, $itemId, $title, $subtitle)
    {
        $this->routeUrl = $routeUrl;
        $this->itemId = $itemId;
        $this->title = $title;
        $this->subtitle = $subtitle;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.delete-item-alert');
    }
}
