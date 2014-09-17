<?php
namespace BSForm\Types;

use BSForm\Interfaces\FieldContainerInterface;
use BSForm\Interfaces\FieldInterface;
use BSForm\Traits\SearchableTrait;

class LabelType extends AbstractFieldType implements FieldContainerInterface
{
    use SearchableTrait;

    protected $for;
    protected $text;
    /**
     * @var FieldInterface[]
     */
    protected $fields = array();

    public function setFor($for)
    {
        $this->for = $for;

        return $this;
    }

    public function getFor()
    {
        return $this->for;
    }

    public function setText($text)
    {
        $this->text = $text;

        return $this;
    }

    public function getText()
    {
        return $this->text;
    }

    public function getField($indentations = 0)
    {
        $field = $this->indent($indentations);
        $field .= "<label";
        if (null !== $this->for) {
            $field .= ' for="'.$this->for.'"';
        }
        if (null !== $this->class) {
            $field .= ' class="'.$this->class.'"';
        }
        $field .= ">\n";
        if (null !== $this->text) {
            $field .= $this->indent($indentations + 1);
            $field .= $this->text;
        }
        foreach ($this->fields as $entry) {
            $field .= $this->indent($indentations + 1);
            $field .= $entry->getField($indentations + 1);
        }
        $field .= "\n";
        $field .= $this->indent($indentations);
        $field .= "</label>\n";

        return $field;

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

} 