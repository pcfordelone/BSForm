<?php
namespace BSForm\Types;

use BSForm\Interfaces\FormInterface;
use BSForm\Interfaces\FieldContainerInterface;
use BSForm\Interfaces\FieldInterface;
use BSForm\Traits\FieldContainerTrait;
use BSForm\Traits\IndentableTrait;
use BSForm\Traits\SearchableTrait;
use BSForm\Validator\Validator;

abstract class AbstractFormType implements FormInterface, FieldContainerInterface
{
    use IndentableTrait;
    use SearchableTrait;
    use FieldContainerTrait;

    protected $id;
    protected $class;
    protected $action = "";
    protected $method = "POST";
    protected $name;
    protected $novalidate = false;
    protected $role = "form";
    protected $errorPlacement = "top";
    /**
     * @var Validator
     */
    protected $validator;

    public function setAction($action = "")
    {
        $this->action = $action;

        return $this;
    }

    public function getAction()
    {
        return $this->action;
    }

    public function setClass($class)
    {
        $this->class = $class;

        return $this;
    }

    public function getClass()
    {
        return $this->class;
    }

    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setMethod($method = "POST")
    {
        $this->method = $method;

        return $this;
    }

    public function getMethod()
    {
        return $this->method;
    }

    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setNovalidate($novalidate = false)
    {
        $this->novalidate = $novalidate;

        return $this;
    }

    public function getNovalidate()
    {
        return $this->novalidate;
    }

    public function setRole($role = "form")
    {
        $this->role = $role;

        return $this;
    }

    public function getRole()
    {
        return $this->role;
    }

    public function populate(array $data)
    {
        // TODO: Create function to populate checkbox, radio and select fields
        foreach ($data as $field) {
            $f = $this->find($field["attr"],$field["attrVal"]);
            if ($f instanceof FieldInterface && method_exists($f, "setValue")) {
                $f->setValue($field["value"]);
            }
        }
    }

    /**
     * @return Validator
     */
    public function getValidator()
    {
        return $this->validator;
    }

    public function setErrorPlacement($errorPlacement = "top")
    {
        $this->errorPlacement = $errorPlacement;
        if ($errorPlacement == "infield" && count($this->validator->getFieldsWithError()) > 0) {
            foreach ($this->validator->getFieldsWithError() as $field) {
                $field->setClass("form-control error");
                $field->setExtraAttributes([
                    "data-toggle" => "tooltip",
                    "title" => $field->getErrorMessage()
                ]);
            }
        }

        return $this;
    }

    public function getForm($indentations = 0)
    {
        $this->indentations = $indentations;
        $form = $this->indent($indentations);
        $form .= "<form";
        if (null !== $this->id) {
            $form .= ' id="'.$this->id.'"';
        }
        if (null !== $this->name) {
            $form .= ' name="'.$this->name.'"';
        }
        if (null !== $this->class) {
            $form .= ' class="'.$this->class.'"';
        }
        if (null !== $this->action) {
            $form .= ' action="'.$this->action.'"';
        }
        if (null !== $this->method) {
            $form .= ' method="'.$this->method.'"';
        }
        if (null !== $this->role) {
            $form .= ' role="'.$this->role.'"';
        }
        if ($this->novalidate) {
            $form .= ' novalidate';
        }
        $form .= ">\n";

        if ($this->errorPlacement == "top" && count($this->validator->getFieldsWithError()) > 0) {
            $form .= $this->getErrorAlert();
            $form .= $this->indent($indentations) . "<hr>\n";
        }

        foreach ($this->fields as $field)
        {
            $form .= $field->getField($indentations + 1);
        }
        $form .= $this->indent($indentations);
        $form .= "</form>\n";

        if ($this->errorPlacement == "bottom" && count($this->validator->getFieldsWithError()) > 0) {
            $form .= $this->indent($indentations) . "<hr>\n" . $this->getErrorAlert();
        }

        return $form;
    }

    private function getErrorAlert()
    {
        $indentation = $this->indentations + 1;
        $form = $this->indent($indentation);
        $form .= "<div class=\"alert alert-danger\">\n";
        $form .= $this->indent($indentation + 1) . "<ul>\n";
        $form .= $this->indent($indentation + 2);
        $form .= "<h4><i class='glyphicon glyphicon-exclamation-sign'></i> Atenção</h4>\n";
        foreach ($this->validator->getFieldsWithError() as $field) {
            $form .= $this->indent($indentation + 2);
            $form .= "<li><strong>{$field->getPlaceholder()}</strong>: {$field->getErrorMessage()}</li>\n";
        }
        $form .= $this->indent($indentation + 1) . "</ul>\n";
        $form .= $this->indent($indentation) . "</div>\n";

        return $form;
    }

    public function __toString()
    {
        return $this->getForm();
    }
} 