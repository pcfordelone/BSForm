<?php
namespace BSForm\Types;

class PasswordType extends AbstractInputType
{
    public function __construct($class = "form-control")
    {
        $this->class = $class;
        $this->type = "password";
    }
} 