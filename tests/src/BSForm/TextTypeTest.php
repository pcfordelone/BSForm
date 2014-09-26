<?php

namespace BSForm;

use BSForm\Types\TextType;

class TextTypeTest extends \PHPUnit_Framework_TestCase
{
    public function testCheckIfExtendsAbstractInputType()
    {
        $this->assertInstanceOf('BSForm\Types\AbstractInputType', new TextType());
    }

    public function testCheckIfImplementsFieldInterface()
    {
        $this->assertInstanceOf('BSForm\Interfaces\FieldInterface', new TextType());
    }

    public function testCheckType()
    {
        $item = new TextType();
        $this->assertEquals('text', $item->getType());
    }

    public function testCheckClass()
    {
        $item = new TextType();
        $this->assertEquals('form-control', $item->getClass());
    }
}
 