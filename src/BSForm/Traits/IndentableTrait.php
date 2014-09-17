<?php
namespace BSForm\Traits;

trait IndentableTrait
{
    protected $indentations;

    public  function indent($indentations = 0)
    {
        $field = "";
        while ($indentations > 0) {
            $field .= "    ";
            $indentations--;
        }

        return $field;
    }
} 