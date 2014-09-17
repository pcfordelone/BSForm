<?php
namespace BSForm\Types;

class RadioType extends CheckboxType
{
    public function __construct($class = null)
    {
        $this->class = $class;
        $this->type = "radio";
    }
} 