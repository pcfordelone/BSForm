<?php
namespace BSForm\Types;

use BSForm\Interfaces\FieldInterface;
use BSForm\Interfaces\FieldContainerInterface;
use BSForm\Traits\SearchableTrait;

class FieldsetType extends AbstractFieldType implements FieldContainerInterface
{
    use SearchableTrait;

    /**
     * @var FieldInterface[]
     */
    protected $fields;
    protected $legend;

    public function setLegend($legend)
    {
        $this->legend = $legend;

        return $this;
    }

    public function getLegend()
    {
        return $this->legend;
    }

    public function getField($indentations = 0)
    {
        $field = $this->indent($indentations);
        $field .= "<fieldset";
        if (null !== $this->name) {
            $field .= ' name="'.$this->name.'"';
        }
        $field .= ">\n";
        if (null !== $this->legend) {
            $field .= $this->indent($indentations + 1);
            $field .= "<legend>{$this->legend}</legend>\n";
        }
        foreach ($this->fields as $entry) {
            $field .= $entry->getField($indentations + 1);
        }
        $field .= $this->indent($indentations);
        $field .= "</fieldset>\n";

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

    public function find($name, $value)
    {
        $method = "get".ucfirst($name);
        foreach ($this->fields as $field) {
            if ($field instanceof FieldInterface && method_exists($field, $method) && $field->$method() == $value) {
                return $field;
            } elseif ($field instanceof FieldContainerInterface) {
                $found = $field->find($name, $value);
                if (false !== $found) {
                    return $found;
                }
            }
        }

        return isset($found) ? $found : false;
    }
} 