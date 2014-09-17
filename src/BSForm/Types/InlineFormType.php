<?php
namespace BSForm\Types;

use BSForm\Validator\Validator;

class InlineFormType extends AbstractFormType
{
    public function __construct(Validator $validator)
    {
        $this->validator = $validator;
        $this->class = "form-inline";
    }
} 