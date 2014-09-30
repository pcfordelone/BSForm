<?php
namespace BSForm;

use BSForm\Types\ColumnType;

class ColumnTypeTest extends \PHPUnit_Framework_TestCase
{
    public function testInstances()
    {
        $item = new ColumnType();

        $this->assertInstanceOf('BSForm\Interfaces\FieldInterface', $item);
        $this->assertInstanceOf('BSForm\Interfaces\FieldContainerInterface', $item);
    }

    public function testSettersAndGetters()
    {
        $item = new ColumnType();

        $item->setClass("classname");
        $this->assertEquals("classname", $item->getClass());

        $this->assertTrue(is_string($item->getField()));
    }

    public function testFieldContainer()
    {
        $item = new ColumnType();

        $stub = $this->getMock('BSForm\Types\TextType', ['getField']);
        $stub->expects($this->any())
            ->method('getField')
            ->willReturn('field');

        $item->addField($stub);

        $this->assertEquals('field', $item->getFieldList()[0]->getField());
        $this->assertContainsOnlyInstancesOf('BSForm\Interfaces\FieldInterface', $item->getFieldList());
    }
}
 