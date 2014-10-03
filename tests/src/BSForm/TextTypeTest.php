<?php
namespace BSForm;

use BSForm\Types\TextType;

class TextTypeTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var TextType
     */
    private $text;

    public function setUp()
    {
        $this->text = new TextType();
    }

    public function tearDown()
    {
        $this->text = null;
    }

    public function testInstances()
    {
        $this->assertInstanceOf('BSForm\Types\AbstractInputType', $this->text);
        $this->assertInstanceOf('BSForm\Interfaces\FieldInterface', $this->text);
    }

    public function testSettersAndGetters()
    {
        $this->text->setClass("form-control error");
        $this->assertEquals("form-control error", $this->text->getClass());

        $this->text->setValue("Value");
        $this->assertEquals("Value", $this->text->getValue());

        $this->text->setDisabled(true);
        $this->assertTrue($this->text->getDisabled());

        $this->text->setAutofocus(true);
        $this->assertTrue($this->text->getAutofocus());

        $this->text->setErrorMessage("Error Message");
        $this->assertEquals("Error Message", $this->text->getErrorMessage());

        $this->text->setExtraAttributes([]);
        $this->assertTrue(is_array($this->text->getExtraAttributes()));

        $this->text->setId("ID");
        $this->assertEquals("ID", $this->text->getId());

        $this->text->setIsRequired(true);
        $this->assertTrue($this->text->getIsRequired());

        $this->text->setName("Name");
        $this->assertEquals("Name", $this->text->getName());
    }

    public function testFunctionalTests()
    {
        $this->assertEquals("form-control", $this->text->getClass());
        $this->assertEquals("text", $this->text->getType());
        $this->assertTrue(is_string($this->text->getField()));
    }
}
 