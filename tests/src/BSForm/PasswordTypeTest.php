<?php
namespace BSForm;

use BSForm\Types\PasswordType;

class PasswordTypeTest extends \PHPUnit_Framework_TestCase
{
    public function testIfExtendsAbstractInputType()
    {
        $this->assertInstanceOf('BSForm\Types\AbstractInputType', new PasswordType());
    }

    public function testIfImplementsFieldInterface()
    {
        $this->assertInstanceOf('BSForm\Interfaces\FieldInterface', new PasswordType());
    }

    public function testSettersAndGetters()
    {
        $item = new PasswordType();
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

        $this->assertEquals("password", $item->getType());

        $this->assertTrue(is_string($item->getField()));
    }
}
 