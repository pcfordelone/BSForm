<?php
namespace BSForm\Types;

class CheckboxType extends AbstractInputType
{
    protected $innerText;

    public function __construct($class = null)
    {
        $this->class = $class;
        $this->type = "checkbox";
    }

    public function setInnerText($innerText)
    {
        $this->innerText = $innerText;

        return $this;
    }

    public function getInnerText()
    {
        return $this->innerText;
    }

    public function getField($indentations = 0)
    {
        $field = parent::getField($indentations);
        $field = substr($field,0,-4);
        if (false !== $this->checked) {
            $field .= " checked";
        }
        $field .= " />";
        if (null !== $this->innerText) {
            $field .= " {$this->innerText}";
        }
        $field .= "\n";

        return $field;
    }
} 