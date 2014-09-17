<?php

namespace BSForm\Interfaces;


interface OptionInterface 
{
    public function setDisabled($disabled = false);
    public function setLabel($label);
    public function setSelected($selected = false);
    public function setValue($value);
    public function setInnerText($innerText);
    public function getOption();
} 