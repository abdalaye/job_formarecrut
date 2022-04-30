<?php

namespace App\View\Components;

use Illuminate\View\Component;

class InputFormGroup extends Component
{
    public $type;
    public $label;
    public $name;
    public $id;
    public $col;
    public $required;
    public $value;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        $name,
        $label,
        $type = null,
        $id = null,
        $col = null,
        $required = null,
        $value = null
    )
    {
        $this->name = $name;
        $this->label= $label;
        $this->type = $type;
        $this->id = $id;
        $this->col = $col;
        $this->required = $required;
        $this->value = $value;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.input-form-group');
    }
}
