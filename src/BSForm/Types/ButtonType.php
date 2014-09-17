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
        $this->type = $type;

        return $this;
    }

    public function getType()
    {
        return $this->type;
    }

    public function addClass($class)
    {
        $this->class .= " {$class}";

        return $this;
    }

    public function getClass()
    {
        return $this->class;
    }

    public function setRole($role)
    {
        $this->role = $role;

        return $this;
    }

    public function getRole()
    {
        return $this->role;
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

    public function setIcon($icon)
    {
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