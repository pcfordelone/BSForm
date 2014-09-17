<?php
namespace BSForm\Traits;

use BSForm\Interfaces\FieldInterface;
use BSForm\Interfaces\FieldContainerInterface;

trait SearchableTrait
{
    public function find($name, $value)
    {
        $method = "get".ucfirst($name);
        foreach ($this->fields as $field) {
            if (method_exists($field, $method) && $field->$method() == $value) {
                return $field;
            } elseif ($field instanceof FieldContainerInterface) {
                $found = $field->find($name, $value);
                if (false !== $found) {
                    return $found;
                }
            }
        }

        return false;
    }
} 