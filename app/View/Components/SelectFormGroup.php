<?php

namespace App\View\Components;

use Illuminate\View\Component;

class SelectFormGroup extends Component
{
    public $multiple;
    public $label;
    public $options;
    public $name;
    public $id;
    public $col;
    public $required;
    public $value;
    public $first;
    public $empty;
    public $display;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        $name,
        $label,
        $options,
        $display,
        $multiple = null,
        $id = null,
        $col = null,
        $required = null,
        $value = null,
        $first = null,
        $empty = null
    )
    {
        $this->name = $name;
        $this->label= $label;
        $this->label= $label;
        $this->options= $options;
        $this->multiple = $multiple;
        $this->id = $id;
        $this->col = $col;
        $this->required = $required;
        $this->value = $value;
        $this->first = $first;
        $this->empty = $empty;
        $this->display = $display;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.select-form-group');
    }
}
