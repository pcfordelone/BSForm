<?php
namespace BSForm;

use BSForm\Types\OptionType;

class OptionTypeTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var OptionType
     */
    private $option;

    public function setUp()
    {
        $this->option = new OptionType();
    }

    public function tearDown()
    {
        $this->option = null;
    }

    public function testCheckIfImplementsOptionInterface()
    {
        $this->assertInstanceOf('BSForm\Interfaces\OptionInterface', $this->option);
    }

    public function testSettersAndGetters()
    {
        $this->option->setDisabled(true);
        $this->assertTrue($this->option->getDisabled());

        $this->option->setInnerText("InnerText");
        $this->assertEquals("InnerText", $this->option->getInnerText());

        $this->option->setLabel("Label");
        $this->assertEquals("Label", $this->option->getLabel());

        $this->option->setSelected(true);
        $this->assertTrue($this->option->getSelected());

        $this->option->setValue("Value");
        $this->assertEquals("Value", $this->option->getValue());
    }

    public function testFunctionalTests()
    {
        $this->assertTrue(is_string($this->option->getOption()));
    }

}
 