<?php
namespace BSForm\Factory;

use BSForm\Exception\ClassNotFoundException;
use BSForm\Exception\MethodNotFoundException;

class AbstractTypeFactory
{
    const BUTTON          = "Button";
    const CHECKBOX        = "Checkbox";
    const COLUMN          = "Column";
    const EMAIL           = "Email";
    const FIELDSET        = "Fieldset";
    const FORM_GROUP      = "FormGroup";
    const LABEL           = "Label";
    const SELECT_OPTION   = "Option";
    const PASSWORD        = "Password";
    const RADIO           = "Radio";
    const SELECT          = "Select";
    const TEXT            = "Text";
    const TEXTAREA        = "Textarea";

    private static $typesDir = "BSForm\\Types\\";

    public static function create($type, array $params = [])
    {
        $class = self::$typesDir.$type."Type";
        if (!class_exists($class)) {
            throw new ClassNotFoundException("Field class unknown: {$class}");
        }
        $field = new $class();
        foreach ($params as $method => $value) {
            $setter = "set".ucfirst($method);
            if (!method_exists($field, $setter)) {
                throw new MethodNotFoundException("Method {$setter} unknown for class {$type}");
            }
            $field->$setter($value);
        }

        return $field;
    }
} 