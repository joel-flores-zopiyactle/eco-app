<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class EmptyStatePage extends Component
{
    public $imageUrl;
    public $title;
    public $subtitle;
    /**
     * Create a new component instance.
     */
    public function __construct($imageUrl, $title, $subtitle)
    {
        $this->imageUrl = $imageUrl;
        $this->title = $title;
        $this->subtitle = $subtitle;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.empty-state-page');
    }
}
