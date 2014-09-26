<?php
namespace BSForm\Types;

use BSForm\Traits\IndentableTrait;

class ButtonType extends AbstractFieldType
{
    use IndentableTrait;

    protected $type = "button";
    protected $class = "btn";
    protected $role = "button";
    protected $innerText = "Button";
    protected $icon;

    public function setType($type = "button")
    {
        if (!is_string($type)) {
            throw new \InvalidArgumentException("Value must be string");
        }
        $validTypes = ["button", "submit", "reset"];
        if (!in_array($type, $validTypes)) {
            throw new \InvalidArgumentException("Invalid value. Must be \"button\", \"submit\" or \"reset\"");
        }
        $this->type = $type;

        return $this;
    }

    public function getType()
    {
        return $this->type;
    }

    public function addClass($class)
    {
        if (!is_string($class)) {
            throw new \InvalidArgumentException("Value must be string");
        }
        $this->class .= " {$class}";

        return $this;
    }

    public function getClass()
    {
        return $this->class;
    }

    public function setRole($role)
    {
        if (!is_string($role)) {
            throw new \InvalidArgumentException("Value must be string");
        }
        $this->role = $role;

        return $this;
    }

    public function getRole()
    {
        return $this->role;
    }

    public function setInnerText($innerText)
    {
        if (!is_string($innerText)) {
            throw new \InvalidArgumentException("Value must be string");
        }
        $this->innerText = $innerText;

        return $this;
    }

    public function getInnerText()
    {
        return $this->innerText;
    }

    public function setIcon($icon)
    {
        if (!is_string($icon)) {
            throw new \InvalidArgumentException("Value must be string");
        }
        $this->icon = $icon;

        return $this;
    }

    public function getIcon()
    {
        return $this->icon;
    }

    public function getField($indentations = 0)
    {
        $field = "";
        $field .= $this->indent($indentations);
        $field .= "<button type=\"{$this->type}\" class=\"{$this->class}\" role=\"{$this->role}\">";
        if (null !== $this->icon) {
            $field .= "<i class=\"{$this->icon}\"></i> ";
        }
        $field .= "{$this->innerText}</button>\n";

        return $field;

    }
} 