<?php

namespace App\View\Components;

use Illuminate\View\Component;

class SelectField extends Field
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($type = 'select', $name = 'name', $label = '', $validation = false, $selected = false, $options = [])
    {
        parent::__construct($type, $name, $label, $validation, $selected, $options);
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
