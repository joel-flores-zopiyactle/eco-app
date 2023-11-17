<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FormSearch extends Component
{
    public $routeUrl;
    public $placeholder;
    public $labelBtn;
    /**
     * Create a new component instance.
     */
    public function __construct($routeUrl, $placeholder, $labelBtn='Buscar')
    {
        $this->routeUrl = $routeUrl;
        $this->placeholder = $placeholder;
        $this->labelBtn = $labelBtn;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.form-search');
    }
}
