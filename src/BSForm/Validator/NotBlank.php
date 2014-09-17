<?php
namespace BSForm\Validator;

use BSForm\Interfaces\ValidatorRuleInterface;

class NotBlank implements ValidatorRuleInterface
{
    private $data;
    private $message = "Campo não pode ser vazio";

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function validate()
    {
        return (null !== $this->data) && (strlen(trim($this->data)) > 0);
    }

    public function setMessage($message)
    {
        $this->message = $message;

        return $this;
    }

    public function getMessage()
    {
        return $this->message;
    }
} 