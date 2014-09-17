<?php
namespace BSForm\Interfaces;

interface FormInterface 
{
    public function setId($id);
    public function setClass($class);
    public function setAction($action = "");
    public function setMethod($method = "POST");
    public function setName($name);
    public function setNovalidate($novalidate = false);
    public function setRole($role = "form");
    public function getForm();
    public function __toString();
} 