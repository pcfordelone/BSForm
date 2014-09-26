<?php
namespace BSForm;


use BSForm\Types\CheckboxType;

class CheckboxTypeTest extends \PHPUnit_Framework_TestCase
{
    public function testCheckIfExtendsAbstractInputType()
    {
        $this->assertInstanceOf('BSForm\Types\AbstractInputType', new CheckboxType());
    }

    public function testCheckIfImplementsFieldInterface()
    {
        $this->assertInstanceOf('BSForm\Interfaces\FieldInterface', new CheckboxType());
    }

    public function testCheckType()
    {
        $this->assertEquals('checkbox', (new CheckboxType())->getType());
    }

    public function testCheckIfGetFieldIsString()
    {
        $this->assertTrue(is_string((new CheckboxType())->getField()));
    }
}
 