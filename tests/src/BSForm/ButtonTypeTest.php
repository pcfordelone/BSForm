<?php
namespace BSForm;

use BSForm\Types\ButtonType;
use Instantiator\Exception\InvalidArgumentException;

class ButtonTypeTest extends \PHPUnit_Framework_TestCase
{
    public function testInstances()
    {
        $item = new ButtonType();

        $this->assertInstanceOf('BSForm\Types\AbstractFieldType', $item);
        $this->assertInstanceOf('BSForm\Interfaces\FieldInterface', $item);
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testSettersAndGetters()
    {
        $item = new ButtonType();

        $item->setId("StringId");
        $this->assertTrue(is_string($item->getId()));

        $item->setId(123);

        $item->setType("submit");
        $this->assertTrue(is_string($item->getType()));

        $item->setType("IDon'tExist");

        $item->setIcon("iconStr");
        $this->assertTrue(is_string($item->getIcon()));

        $item->setIcon(123);

        $item->setInnerText("InnerText");
        $this->assertTrue(is_string($item->getInnerText()));

        $item->setInnerText(123);

        $this->assertTrue(is_string($item->getField()));
    }
}
 