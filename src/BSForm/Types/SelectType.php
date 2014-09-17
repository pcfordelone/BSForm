<?php
namespace BSForm\Types;

use BSForm\Interfaces\OptionInterface;

class SelectType extends AbstractFieldType
{
    protected $multiple = false;
    protected $size;
    /**
     * @var OptionInterface[]
     */
    protected $fields = [];

    public function __construct()
    {
        $this->class = "form-control";
    }

    public function setMultiple($multiple)
    {
        $this->multiple = $multiple;

        return $this;
    }

    public function getMultiple()
    {
        return $this->multiple;
    }

    public function setSize($size)
    {
        $this->size = $size;

        return $this;
    }

    public function getSize()
    {
        return $this->size;
    }

    public function addOption(OptionInterface $option)
    {
        $this->fields[] = $option;

        return $this;
    }

    public function getOptions()
    {
        return $this->fields;
    }

    public function getField($indentations = 0)
    {
        $field = $this->indent($indentations);
        $field .= "<select";
        // add attributes if not null or false
        if (null !== $this->id) {
            $field .= ' id="'.$this->id.'"';
        }
        if (null !== $this->name) {
            $field .= ' name="'.$this->name.'"';
        }
        if (null !== $this->class) {
            $field .= ' class="'.$this->class.'"';
        }
        if (false !== $this->isRequired) {
            $field .= ' required';
        }
        if (false !== $this->multiple) {
            $field .= ' multiple';
        }
        $field .= ">\n";
        if (count($this->fields)) {
            foreach ($this->fields as $option) {
                $field .= $this->indent($indentations + 1) . $option->getOption();
            }
        }
        $field .= $this->indent($indentations);
        $field .= "</select>\n";

        return $field;
    }

} 