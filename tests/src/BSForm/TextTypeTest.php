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

    public function testSettersAndGetters()
    {
        $item = new TextType();
        $this->assertEquals("form-control", $item->getClass());

        $item->setClass("form-control error");
        $this->assertEquals("form-control error", $item->getClass());

        $item->setValue("Value");
        $this->assertEquals("Value", $item->getValue());

        $item->setDisabled(true);
        $this->assertTrue($item->getDisabled());

        $item->setAutofocus(true);
        $this->assertTrue($item->getAutofocus());

        $item->setErrorMessage("Error Message");
        $this->assertEquals("Error Message", $item->getErrorMessage());

        $item->setExtraAttributes([]);
        $this->assertTrue(is_array($item->getExtraAttributes()));

        $item->setId("ID");
        $this->assertEquals("ID", $item->getId());

        $item->setIsRequired(true);
        $this->assertTrue($item->getIsRequired());

        $item->setName("Name");
        $this->assertEquals("Name", $item->getName());

        $this->assertEquals("text", $item->getType());

        $this->assertTrue(is_string($item->getField()));
    }
}
 