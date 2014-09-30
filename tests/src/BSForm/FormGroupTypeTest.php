<?php
namespace BSForm;

use BSForm\Types\FormGroupType;

class FormGroupTypeTest extends \PHPUnit_Framework_TestCase
{
    public function testInstances()
    {
        $item = new FormGroupType();

        $this->assertInstanceOf('BSForm\Interfaces\FieldInterface', $item);
        $this->assertInstanceOf('BSForm\Interfaces\FieldContainerInterface', $item);
    }

    public function testClass()
    {
        $item = new FormGroupType();

        $this->assertEquals('form-group', $item->getClass());
        $item->addClass("classname");
        $this->assertEquals("form-group classname", $item->getClass());

        $this->assertTrue(is_string($item->getField()));
    }

    public function testFieldContainer()
    {
        $item = new FormGroupType();

        $stub = $this->getMock('BSForm\Types\TextType', ['getField']);
        $stub->expects($this->any())
            ->method('getField')
            ->willReturn('field');

        $item->addField($stub);

        $this->assertEquals('field', $item->getFieldList()[0]->getField());
        $this->assertContainsOnlyInstancesOf('BSForm\Interfaces\FieldInterface', $item->getFieldList());
    }
}
 