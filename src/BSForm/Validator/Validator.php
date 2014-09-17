<?php
namespace BSForm\Validator;

use BSForm\Exception\ClassNotFoundException;
use BSForm\Exception\MethodNotFoundException;

class Validator
{
    const LENGTH = "BSForm\\Validator\\Length";
    const NOT_BLANK = "BSForm\\Validator\\NotBlank";
    const NUMERIC = "BSForm\\Validator\\Numeric";

    protected $rules = array();
    protected $fieldsWithError = array();

    public function addRule(array $rule = array())
    {
        $this->rules[] = $rule;

        return $this;
    }

    public function getFieldsWithError()
    {
        return $this->fieldsWithError;
    }

    public function validate()
    {
        foreach ($this->rules as $rule) {
            $validator = $rule["validator"];
            $field = $rule["field"];

            if (!class_exists($validator)) {
                throw new ClassNotFoundException("Class {$rule['validator']} not found");
            }
            $v = new $validator($field->getValue());
            if (isset($rule["params"])) {
                foreach ($rule["params"] as $setter => $value) {
                    $setter = "set".ucfirst($setter);
                    if (!method_exists($v, $setter)) {
                        throw new MethodNotFoundException("Method {$setter} not found for class " . get_class($v));
                    }
                    $v->$setter($value);
                }
            }
            if (!$v->validate($field->getValue())) {
                $field->setErrorMessage($v->getMessage());
                $this->fieldsWithError[] = $field;
            }

        }

        return (count($this->fieldsWithError) == 0);
    }

} 