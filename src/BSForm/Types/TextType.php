<?php
namespace BSForm\Types;

class TextType extends AbstractInputType
{
    public function __construct($class = "form-control")
    {
        $this->class = $class;
        $this->type = "text";
    }

} 