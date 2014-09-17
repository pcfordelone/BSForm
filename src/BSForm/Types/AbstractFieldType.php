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
        $this->name = $name;

        return $this;
    }

    public function setClass($class)
    {
        $this->class = $class;

        return $this;
    }

    public function getClass()
    {
        return $this->class;
    }

    public function setIsRequired($isRequired = false)
    {
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
        $this->errorMessage = $errorMessage;

        return $this;
    }

    public function getExtraAttributes()
    {
        return $this->extraAttributes;
    }

    public function setExtraAttributes(array $extraAttributes)
    {
        $this->extraAttributes = $extraAttributes;

        return $this;
    }

    public function __toString()
    {
        return $this->getField();
    }

    abstract public function getField($indentations = 0);

} 