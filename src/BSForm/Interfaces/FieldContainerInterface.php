<?php
namespace BSForm\Interfaces;

use BSForm\Interfaces\FieldInterface;

interface FieldContainerInterface 
{
    public function addField(FieldInterface $field);
    public function getFieldList();
    public function find($name, $value);
} 