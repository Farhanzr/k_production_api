<?php

namespace App\View\Components\form;

use Illuminate\View\Component;

class Input extends Component
{
    public $label;
    public $value;
    public $type;
    public $disable;
    public $mandatory;

    public function __construct($label="", $value, $type = "text",$disable = "false" , $mandatory="false")
    {
        $this->label    = $label;
        $this->value    = $value;
        $this->type     = $type;
        $this->disable  = $disable;
        $this->mandatory  = $mandatory;
    }
    
    public function render()
    {
        return view('components.form.input');
    }
}
