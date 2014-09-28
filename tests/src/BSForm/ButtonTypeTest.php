<?php
namespace BSForm;

use BSForm\Types\ButtonType;
use Instantiator\Exception\InvalidArgumentException;

class ButtonTypeTest extends \PHPUnit_Framework_TestCase
{
    public function testCheckIfExtendsAbstractFieldType()
    {
        $this->assertInstanceOf('BSForm\Types\AbstractFieldType', new ButtonType());
    }

    public function testCheckIfImplementsFieldInterface()
    {
        $this->assertInstanceOf('BSForm\Interfaces\FieldInterface', new ButtonType());
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testSettersAndGetters()
    {
        $bt = new ButtonType();

        $bt->setId("StringId");
        $this->assertTrue(is_string($bt->getId()));

        $bt->setId(123);

        $bt->setType("submit");
        $this->assertTrue(is_string($bt->getType()));

        $bt->setType("IDon'tExist");

        $bt->setIcon("iconStr");
        $this->assertTrue(is_string($bt->getIcon()));

        $bt->setIcon(123);

        $bt->setInnerText("InnerText");
        $this->assertTrue(is_string($bt->getInnerText()));

        $bt->setInnerText(123);
    }
}
 