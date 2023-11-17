<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class titleHeaderSection extends Component
{
    public $routeUrl;
    public $title;
    public $colorBtn = 'btn-primary';
    public $titleBtn = 'btn-primary';


    /**
     * Create a new component instance.
     */
    public function __construct($routeUrl, $title, $colorBtn, $titleBtn)
    {
        $this->routeUrl = $routeUrl;
        $this->title = $title;
        $this->colorBtn = $colorBtn;
        $this->titleBtn = $titleBtn;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.title-header-section');
    }
}
