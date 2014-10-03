<?php
namespace BSForm;

use BSForm\Types\LabelType;
use BSForm\Types\TextType;

class LabelTypeTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var LabelType
     */
    private $label;

    public function setUp()
    {
        $this->label = new LabelType();
    }

    public function tearDown()
    {
        $this->label = null;
    }

    public function testInstances()
    {
        $this->assertInstanceOf('BSForm\Types\AbstractFieldType', $this->label);
        $this->assertInstanceOf('BSForm\Interfaces\FieldContainerInterface', $this->label);
    }

    public function testSettersAndGetters()
    {
        $this->label->setClass('control-label');
        $this->assertEquals('control-label', $this->label->getClass());

        $this->label->setId("ID");
        $this->assertEquals("ID", $this->label->getId());

        $this->label->setFor("forID");
        $this->assertEquals("forID", $this->label->getFor());

        $this->label->setText("label text");
        $this->assertEquals("label text", $this->label->getText());
    }

    public function testFieldContainer()
    {
        $stub = $this->getMock('BSForm\Types\TextType', ['getField']);
        $stub->expects($this->any())
            ->method('getField')
            ->willReturn('field');

        $this->label->addField($stub);

        $this->assertEquals('field', $this->label->getFieldList()[0]->getField());
    }

    public function testFunctionalTests()
    {
        $textField = new TextType();

        $this->assertEmpty($this->label->getFieldList());

        $this->label->addField($textField);

        $this->assertContainsOnlyInstancesOf('BSForm\Types\TextType', $this->label->getFieldList());
        $this->assertInstanceOf('BSForm\Types\TextType', $this->label->getFieldList()[0]);
        $this->assertTrue(is_string($this->label->getFieldList()[0]->getField()));

        $this->assertTrue(is_string($this->label->getField()));
    }
}
 