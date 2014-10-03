<?php
namespace BSForm;


use BSForm\Types\CheckboxType;

class CheckboxTypeTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var CheckboxType
     */
    private $checkbox;

    public function setUp()
    {
        $this->checkbox = new CheckboxType();
    }

    public function tearDown()
    {
        $this->checkbox = null;
    }

    public function testInstances()
    {
        $this->assertInstanceOf('BSForm\Types\AbstractFieldType', $this->checkbox);
        $this->assertInstanceOf('BSForm\Interfaces\FieldInterface', $this->checkbox);
    }

    public function testSettersAndGetters()
    {
        $this->checkbox->setInnerText("inner text");
        $this->assertEquals("inner text", $this->checkbox->getInnerText());
    }

    public function testFunctionalTests()
    {
        $this->assertEquals('checkbox', $this->checkbox->getType());
        $this->assertTrue(is_string($this->checkbox->getField()));
    }
}
 