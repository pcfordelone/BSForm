<?php
namespace BSForm;

use BSForm\Types\RadioType;

class RadioTypeTest extends \PHPUnit_Framework_TestCase
{
    public function testCheckIfExtendsAbstractInputType()
    {
        $this->assertInstanceOf('BSForm\Types\AbstractInputType', new RadioType());
    }

    public function testCheckIfImplementsFieldInterface()
    {
        $this->assertInstanceOf('BSForm\Interfaces\FieldInterface', new RadioType());
    }

    public function testSettersAndGetters()
    {
        $item = new RadioType();

        $this->assertNull($item->getClass());

        $item->setClass("classname");
        $this->assertEquals("classname", $item->getClass());

        $item->setName("name");
        $this->assertEquals("name", $item->getName());

        $item->setValue("value");
        $this->assertEquals("value", $item->getValue());

        $item->setInnerText("InnerText");
        $this->assertEquals("InnerText", $item->getInnerText());

        $this->assertTrue(is_string($item->getField()));
    }
}
 