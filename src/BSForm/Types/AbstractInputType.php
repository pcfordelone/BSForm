<?php
namespace BSForm\Types;

use BSForm\Types\AbstractFieldType;

abstract class AbstractInputType extends AbstractFieldType
{
    protected $type;
    protected $autofocus = false;
    protected $checked = false;
    protected $disabled = false;
    protected $formnovalidate = false;
    protected $placeholder;
    protected $value;

    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    public function getType()
    {
        return $this->type;
    }

    public function setAutofocus($autofocus)
    {
        $this->autofocus = $autofocus;

        return $this;
    }

    public function getAutofocus()
    {
        return $this->autofocus;
    }

    public function setChecked($checked)
    {
        $this->checked = $checked;

        return $this;
    }

    public function getChecked()
    {
        return $this->checked;
    }

    public function setDisabled($disabled)
    {
        $this->disabled = $disabled;

        return $this;
    }

    public function getDisabled()
    {
        return $this->disabled;
    }

    public function setFormnovalidate($formnovalidate)
    {
        $this->formnovalidate = $formnovalidate;

        return $this;
    }

    public function getFormnovalidate()
    {
        return $this->formnovalidate;
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

    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    public function getValue()
    {
        return $this->value;
    }

    public function getField($indentations = 0)
    {
        $field = $this->indent($indentations);
        $field .= "<input type=\"{$this->type}\"";

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
        if (null !== $this->value) {
            $field .= ' value="'.$this->value.'"';
        }
        if (null !== $this->placeholder) {
            $field .= ' placeholder="'.$this->placeholder.'"';
        }
        if (false !== $this->isRequired) {
            $field .= ' required';
        }
        if (false !== $this->autofocus) {
            $field .= ' autofocus';
        }
        if (count($this->extraAttributes) > 0) {
            foreach ($this->extraAttributes as $attr => $val) {
                $field .= " {$attr}=\"{$val}\"";
            }
        }

        $field .= " />\n";

        return $field;
    }
}

