<?php

namespace App\View\Components;

use Illuminate\View\Component;

class FormLink extends Component
{
    public $method;
    public $url;


    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($method, $url = '')
    {
        $this->method = $method;
        $this->url    = $url;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.form-link');
    }
}
