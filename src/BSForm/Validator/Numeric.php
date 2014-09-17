<?php
namespace BSForm\Validator;

use BSForm\Interfaces\ValidatorRuleInterface;

class Numeric implements ValidatorRuleInterface
{
    private $data;
    private $message = "Valor deve ser numérico";

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function validate()
    {
        return is_numeric($this->data);
    }

    public function setMessage($message)
    {
        $this->message = $message;
    }

    public function getMessage()
    {
        return $this->message;
    }

} 