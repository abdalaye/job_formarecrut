<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Field extends Component
{
    public $type;
    
    public $name;

    public $label;

    public $col;

    public $validation;

    public $options;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($type = 'text', $name = 'name', $label = '', $validation = false, $options = [])
    {
        $this->type       = $type;
        $this->name       = $name;
        $this->label      = $label;
        $this->validation = $validation;
        $this->options    = $options;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.field');
    }
}
