<?php
namespace BSForm\Types;

use BSForm\Interfaces\FieldInterface;
use BSForm\Traits\IndentableTrait;

abstract class AbstractFieldType implements FieldInterface
{
    use IndentableTrait;

    protected $id;
    protected $name;
    protected $class;
    protected $isRequired = false;
    protected $errorMessage;
    protected $extraAttributes = [];

    public function setId($id)
    {
        if (!is_string($id)) {
            throw new \InvalidArgumentException("ID must be a string");
        }
        $this->id = $id;

        return $this;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        if (!is_string($name)) {
            throw new \InvalidArgumentException("Name must be a string");
        }
        $this->name = $name;

        return $this;
    }

    public function setClass($class)
    {
        if (!is_string($class)) {
            throw new \InvalidArgumentException("Class must be a string");
        }
        $this->class = $class;

        return $this;
    }

    public function getClass()
    {
        return $this->class;
    }

    public function setIsRequired($isRequired = false)
    {
        if (!is_bool($isRequired)) {
            throw new \InvalidArgumentException("isRequired must be a boolean");
        }
        $this->isRequired = $isRequired;

        return $this;
    }

    public function getIsRequired()
    {
        return $this->isRequired;
    }

    public function getErrorMessage()
    {
        return $this->errorMessage;
    }

    public function setErrorMessage($errorMessage)
    {
        if (!is_string($errorMessage)) {
            throw new \InvalidArgumentException("errorMessage must be a string");
        }
        $this->errorMessage = $errorMessage;

        return $this;
    }

    public function getExtraAttributes()
    {
        return $this->extraAttributes;
    }

    public function setExtraAttributes(array $extraAttributes)
    {
        if (!is_array($extraAttributes)) {
            throw new \InvalidArgumentException("extraAttributes must be an array");
        }
        $this->extraAttributes = $extraAttributes;

        return $this;
    }

    public function __toString()
    {
        return $this->getField();
    }

    abstract public function getField($indentations = 0);

} 