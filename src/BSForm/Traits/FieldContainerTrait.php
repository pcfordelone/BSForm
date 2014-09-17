<?php
namespace BSForm\Traits;

use BSForm\Interfaces\FieldInterface;

trait FieldContainerTrait
{
    /**
     * @var FieldInterface[]
     */
    protected $fields = array();

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