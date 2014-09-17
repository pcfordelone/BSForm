<?php
namespace BSForm\Interfaces;

interface FieldInterface 
{
    public function setName($name);
    public function getName();
    public function getField($indentaions = 0);
    public function __toString();
} 