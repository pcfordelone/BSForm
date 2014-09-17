<?php
namespace BSForm\Types;

use BSForm\Interfaces\FieldContainerInterface;
use BSForm\Interfaces\FieldInterface;
use BSForm\Traits\IndentableTrait;
use BSForm\Traits\SearchableTrait;

class FormGroupType implements FieldInterface, FieldContainerInterface
{
    use IndentableTrait;
    use SearchableTrait;

    /**
     * @var FieldInterface[]
     */
    protected $fields = array();

    public function __construct()
    {
        $this->class = "form-group";
    }

    public function addField(FieldInterface $field)
    {
        $this->fields[] = $field;

        return $this;
    }

    public function getFieldList()
    {
        return $this->fields;
    }

    public function setName($name)
    {

    }

    public function getName()
    {

    }

    public function addClass($class)
    {
        $this->class .= " {$class}";

        return $this;
    }

    public function getField($indentations = 0)
    {
        $field = $this->indent($indentations);
        $field .= "<div class=\"{$this->class}\">\n";

        foreach ($this->fields as $entry) {
            $field .= "{$entry->getField($indentations + 1)}";
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