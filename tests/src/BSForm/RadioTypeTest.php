<?php
namespace BSForm;

use BSForm\Types\RadioType;

class RadioTypeTest extends \PHPUnit_Framework_TestCase
{
    public function testInstances()
    {
        $item = new RadioType();

        $this->assertInstanceOf('BSForm\Types\AbstractInputType', $item);
        $this->assertInstanceOf('BSForm\Interfaces\FieldInterface', $item);
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
 