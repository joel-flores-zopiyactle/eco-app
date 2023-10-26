<?php

namespace App\View\Components\Documents;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FormRegister extends Component
{

    public $categorys;
    /**
     * Create a new component instance.
     */
    public function __construct($categorys)
    {
        $this->categorys = $categorys;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.documents.form-register');
    }
}
