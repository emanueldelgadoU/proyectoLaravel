<?php

namespace App\View\Components;

use Illuminate\View\Component;

class inputEmi extends Component
{
    
    public $type;
    public $name;
    public $text;
    public $value;


    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($type, $name, $text, $value)
    {
        $this->type=$type;
        $this->name=$name;
        $this->text=$text;
        $this->value=$value;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.input-emi');
    }
}
