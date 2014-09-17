<?php
namespace BSForm\Interfaces;

interface ValidatorRuleInterface 
{
    public function __construct($data);
    public function validate();
    public function setMessage($message);
    public function getMessage();
} 