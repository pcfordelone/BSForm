<?php
namespace BSForm\Types;

use BSForm\Interfaces\FieldInterface;
use BSForm\Interfaces\FieldContainerInterface;
use BSForm\Traits\FieldContainerTrait;
use BSForm\Traits\IndentableTrait;
use BSForm\Traits\SearchableTrait;

class FieldsetType extends AbstractFieldType implements FieldContainerInterface
{
    use SearchableTrait;
    use IndentableTrait;
    use FieldContainerTrait;

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
} 