<?php
namespace BSForm\Types;

use BSForm\Interfaces\OptionInterface;

class OptionType implements OptionInterface
{
    protected $disabled = false;
    protected $label;
    protected $selected = false;
    protected $value;
    protected $innerText;

    public function setDisabled($disabled = false)
    {
        $this->disabled = $disabled;

        return $this;
    }

    public function getDisabled()
    {
        return $this->disabled;
    }

    public function setLabel($label)
    {
        $this->label = $label;

        return $this;
    }

    public function getLabel()
    {
        return $this->label;
    }

    public function setSelected($selected = false)
    {
        $this->selected = $selected;

        return $this;
    }

    public function getSelected()
    {
        return $this->selected;
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

    public function setInnerText($innerText)
    {
        $this->innerText = $innerText;

        return $this;
    }

    public function getInnerText()
    {
        return $this->innerText;
    }

    public function getOption()
    {
        $opt = "<option";
        if (null !== $this->label) {
            $opt .= ' label="'.$this->label.'"';
        }
        if (null !== $this->value) {
            $opt .= ' value="'.$this->value.'"';
        }
        if ($this->disabled) {
            $opt .= ' disabled';
        }
        if ($this->selected) {
            $opt .= ' selected';
        }
        $opt .= ">";
        if (null !== $this->innerText) {
            $opt.= $this->innerText;
        }
        $opt .= "</option>\n";

        return $opt;
    }

    public function __toString()
    {
        return $this->getOption();
    }

} 