<?php
namespace BSForm\Types;

use BSForm\Interfaces\FieldInterface;
use BSForm\Interfaces\FieldContainerInterface;
use BSForm\Traits\FieldContainerTrait;
use BSForm\Traits\IndentableTrait;
use BSForm\Traits\SearchableTrait;

class ColumnType implements FieldInterface, FieldContainerInterface
{
    use SearchableTrait;
    use IndentableTrait;
    use FieldContainerTrait;

    public function setClass($class)
    {
        $this->class = $class;

        return $this;
    }

    public function setName($name)
    {
    }

    public function getName()
    {
    }

    public function getField($indentations = 0)
    {
        $field = $this->indent($indentations);
        $field .= "<div";
        if (isset($this->class)) {
            $field .= " class =\"{$this->class}\">\n";
        }
        foreach ($this->fields as $entry) {
            $field .= $entry->getField($indentations + 1);
        }
        $field .= $this->indent($indentations);
        $field .= "</div>\n";

        return $field;
    }

    public function __toString()
    {
        return $this->getField();
    }

} 