<?php
namespace BSForm\Types;

class TextareaType extends AbstractFieldType
{
    protected $rows = 5;
    protected $placeholder;
    protected $value;

    public function __construct($class = "form-control")
    {
        $this->class = $class;
    }

    public function getValue()
    {
        return $this->value;
    }

    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    public function setPlaceholder($placeholder)
    {
        $this->placeholder = $placeholder;

        return $this;
    }

    public function getPlaceholder()
    {
        return $this->placeholder;
    }

    public function setRows($rows)
    {
        $this->rows = $rows;

        return $this;
    }

    public function getRows()
    {
        return $this->rows;
    }

    public function getField($indentations = 0)
    {
        $field = $this->indent($indentations);
        $field .= "<textarea";

        if (null !== $this->id) {
            $field .= ' id="'.$this->id.'"';
        }
        if (null !== $this->name) {
            $field .= ' name="'.$this->name.'"';
        }
        if (null !== $this->class) {
            $field .= ' class="'.$this->class.'"';
        }
        if (null !== $this->rows) {
            $field .= ' rows="'.$this->rows.'"';
        }
        if (null !== $this->placeholder) {
            $field .= ' placeholder="'.$this->placeholder.'"';
        }
        if (false !== $this->isRequired) {
            $field .= ' required="true"';
        }

        if (count($this->extraAttributes) > 0) {
            foreach ($this->extraAttributes as $attr => $val) {
                $field .= " {$attr}=\"{$val}\"";
            }
        }

        $field .= ">";
        if (null !== $this->value) {
            $field .= $this->value;
        }
        $field .= "</textarea>";

        return $field;
    }

} 