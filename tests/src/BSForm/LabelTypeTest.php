<?php
namespace BSForm;

use BSForm\Types\LabelType;

class LabelTypeTest extends \PHPUnit_Framework_TestCase
{
    public function testIfExtendsAbstractFieldType()
    {
        $this->assertInstanceOf('BSForm\Types\AbstractFieldType', new LabelType());
    }

    public function testIfImplementsFieldContainerInterface()
    {
        $this->assertInstanceOf('BSForm\Interfaces\FieldContainerInterface', new LabelType());
    }

    public function testSettersAndGetters()
    {
        $item = new LabelType();

        $item->setClass('control-label');
        $this->assertEquals('control-label', $item->getClass());

        $item->setId("ID");
        $this->assertEquals("ID", $item->getId());

        $item->setFor("forID");
        $this->assertEquals("forID", $item->getFor());

        $item->setText("label text");
        $this->assertEquals("label text", $item->getText());

        $this->assertTrue(is_string($item->getField()));
    }

    public function testFieldContainer()
    {
        $item = new LabelType();

        $stub = $this->getMock('BSForm\Types\TextType', ['getField']);
        $stub->expects($this->any())
            ->method('getField')
            ->willReturn('field');

        $item->addField($stub);

        $this->assertEquals('field', $item->getFieldList()[0]->getField());
    }
}
 