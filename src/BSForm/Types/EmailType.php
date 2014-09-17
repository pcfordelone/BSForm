<?php
namespace BSForm\Types;

class EmailType extends AbstractInputType
{
    public function __construct($class = "form-control")
    {
        $this->class = $class;
        $this->type = "email";
    }
} 