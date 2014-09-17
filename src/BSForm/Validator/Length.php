<?php
namespace BSForm\Validator;

use BSForm\Interfaces\ValidatorRuleInterface;

class Length implements ValidatorRuleInterface
{
    private $data;
    private $min = 1;
    private $max = 255;
    private $minMessage;
    private $maxMessage;
    private $message;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function validate()
    {
        if (null == $this->getMinMessage()) {
            $this->setMinMessage("Valor deve ter ao menos {$this->min} caracter(es) (".strlen($this->data).")");
        }
        if (null == $this->getMaxMessage()) {
            $this->setMaxMessage("Valor não pode exceder {$this->max} caracteres (".strlen($this->data).")");
        }

        if (strlen($this->data) < $this->min) {
            $this->setMessage($this->getMinMessage());
            return false;
        }
        if (strlen($this->data) > $this->max) {
            $this->setMessage($this->getMaxMessage());
            return false;
        }

        return true;
    }

    public function getMax()
    {
        return $this->max;
    }

    public function setMax($max)
    {
        $this->max = $max;

        return $this;
    }

    public function getMaxMessage()
    {
        return $this->maxMessage;
    }

    public function setMaxMessage($maxMessage)
    {
        $this->maxMessage = $maxMessage;

        return $this;
    }

    public function getMin()
    {
        return $this->min;
    }

    public function setMin($min)
    {
        $this->min = $min;

        return $this;
    }

    public function getMinMessage()
    {
        return $this->minMessage;
    }

    public function setMinMessage($minMessage)
    {
        $this->minMessage = $minMessage;

        return $this;
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