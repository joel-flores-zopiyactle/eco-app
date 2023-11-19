<?php

namespace App\View\Components\admin;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class orderBy extends Component
{
    public $routeUrl;
    public $showList;
    public $orderColumn;
    public $orderBy;
    /**
     * Create a new component instance.
     */
    public function __construct(
        $routeUrl,
        $showList = 'all',
        $orderBy = 'desc',
        $orderColumn = 'id',

    )
    {
        $this->routeUrl = $routeUrl;
        $this->showList = $showList;
        $this->orderColumn = $orderColumn;
        $this->orderBy = $orderBy;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.admin.order-by');
    }
}
