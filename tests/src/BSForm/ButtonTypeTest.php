<?php
namespace BSForm;

use BSForm\Types\ButtonType;
use Instantiator\Exception\InvalidArgumentException;

class ButtonTypeTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var ButtonType
     */
    private $button;

    public function setUp()
    {
        $this->button = new ButtonType();
    }

    public function tearDown()
    {
        $this->button = null;
    }

    public function testInstances()
    {
        $this->assertInstanceOf('BSForm\Types\AbstractFieldType', $this->button);
        $this->assertInstanceOf('BSForm\Interfaces\FieldInterface', $this->button);
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testIdException()
    {
        $this->button->setId(123);
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testTypeException()
    {
        $this->button->setType("IDon'tExist");
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testIconException()
    {
        $this->button->setIcon(123);
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testInnerTextException()
    {
        $this->button->setInnerText(123);
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testRoleException()
    {
        $this->button->setRole(123);
    }

    public function testSettersAndGetters()
    {
        $this->button->setId("StringId");
        $this->assertTrue(is_string($this->button->getId()));

        $this->button->setType("submit");
        $this->assertTrue(is_string($this->button->getType()));

        $this->button->setIcon("iconStr");
        $this->assertTrue(is_string($this->button->getIcon()));

        $this->button->setInnerText("InnerText");
        $this->assertTrue(is_string($this->button->getInnerText()));

        $this->button->addClass("buttonclass");
        $this->assertEquals("btn buttonclass", $this->button->getClass());

        $this->button->setRole("role");
        $this->assertEquals("role", $this->button->getRole());
    }

    public function testFunctionalTests()
    {
        $this->assertTrue(is_string($this->button->getField()));
    }
}
 