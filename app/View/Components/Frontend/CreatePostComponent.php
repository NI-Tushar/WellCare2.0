<?php

namespace App\View\Components\Frontend;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CreatePostComponent extends Component
{
    /**
     * Create a new component instance.
     */
    public $services;
    public $members;

    public function __construct($services, $members)
    {
        $this->services = $services;
        $this->members = $members;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.frontend.create-post-component');
    }
}
