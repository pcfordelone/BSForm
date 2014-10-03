<?php
namespace BSForm;

use BSForm\Types\TextareaType;

class TextareaTypeTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var TextareaType
     */
    private $textarea;

    public function setUp()
    {
        $this->textarea = new TextareaType();
    }

    public function tearDown()
    {
        $this->textarea = null;
    }

    public function testInstances()
    {
        $this->assertInstanceOf('BSForm\Types\AbstractFieldType', $this->textarea);
    }

    public function testSettersAndGetters()
    {
        $this->textarea->setValue("TextArea Value");
        $this->assertEquals("TextArea Value", $this->textarea->getValue());

        $this->textarea->setPlaceholder("TextArea Placeholder");
        $this->assertEquals("TextArea Placeholder", $this->textarea->getPlaceholder());

        $this->textarea->setRows(5);
        $this->assertEquals(5, $this->textarea->getRows());
        $this->assertTrue(is_int($this->textarea->getRows()));
    }

    public function testFunctionalTests()
    {
        $this->assertTrue(is_string($this->textarea->getField()));
    }
}
 