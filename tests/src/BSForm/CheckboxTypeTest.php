<?php
namespace BSForm;


use BSForm\Types\CheckboxType;

class CheckboxTypeTest extends \PHPUnit_Framework_TestCase
{
    public function testInstances()
    {
        $item = new CheckboxType();

        $this->assertInstanceOf('BSForm\Types\AbstractFieldType', $item);
        $this->assertInstanceOf('BSForm\Interfaces\FieldInterface', $item);
    }

    public function testGetters()
    {
        $item = new CheckboxType();

        $this->assertEquals('checkbox', $item->getType());
        $this->assertTrue(is_string($item->getField()));
    }
}
 