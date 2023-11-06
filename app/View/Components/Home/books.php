<?php

namespace App\View\Components\home;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class books extends Component
{
    public $documents;
    /**
     * Create a new component instance.
     */
    public function __construct($documents)
    {
        $this->documents = $documents;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.home.books');
    }
}
