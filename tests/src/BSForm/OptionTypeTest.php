<?php
namespace BSForm;

use BSForm\Types\OptionType;

class OptionTypeTest extends \PHPUnit_Framework_TestCase
{
    public function testCheckIfImplementsOptionInterface()
    {
        $this->assertInstanceOf('BSForm\Interfaces\OptionInterface', new OptionType());
    }

    public function testSettersAndGetters()
    {
        $item = new OptionType();

        $item->setDisabled(true);
        $this->assertTrue($item->getDisabled());

        $item->setInnerText("InnerText");
        $this->assertEquals("InnerText", $item->getInnerText());

        $item->setLabel("Label");
        $this->assertEquals("Label", $item->getLabel());

        $item->setSelected(true);
        $this->assertTrue($item->getSelected());

        $item->setValue("Value");
        $this->assertEquals("Value", $item->getValue());

        $this->assertTrue(is_string($item->getOption()));
    }

}
 