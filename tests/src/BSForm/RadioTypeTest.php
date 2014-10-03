<?php
namespace BSForm;

use BSForm\Types\RadioType;

class RadioTypeTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var RadioType
     */
    private $radio;

    protected function setUp()
    {
        $this->radio = new RadioType();
    }

    protected function tearDown()
    {
        $this->radio = null;
    }


    public function testInstances()
    {
        $this->assertInstanceOf('BSForm\Types\AbstractInputType', $this->radio);
        $this->assertInstanceOf('BSForm\Interfaces\FieldInterface', $this->radio);
    }

    public function testSettersAndGetters()
    {
        $this->assertNull($this->radio->getClass());

        $this->radio->setClass("classname");
        $this->assertEquals("classname", $this->radio->getClass());

        $this->radio->setName("name");
        $this->assertEquals("name", $this->radio->getName());

        $this->radio->setValue("value");
        $this->assertEquals("value", $this->radio->getValue());

        $this->radio->setInnerText("InnerText");
        $this->assertEquals("InnerText", $this->radio->getInnerText());
    }

    public function testFunctionalTests()
    {
        $this->assertTrue(is_string($this->radio->getField()));
    }
}
 