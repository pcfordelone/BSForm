<?php
namespace BSForm;

use BSForm\Types\EmailType;

class EmailTypeTest extends \PHPUnit_Framework_TestCase
{
    public function testCheckIfExtendsAbstractInputType()
    {
        $this->assertInstanceOf('BSForm\Types\AbstractInputType', new EmailType());
    }

    public function testCheckIfImplementsFieldInterface()
    {
        $this->assertInstanceOf('BSForm\Interfaces\FieldInterface', new EmailType());
    }

    public function testCheckType()
    {
        $item = new EmailType();
        $this->assertEquals('email', $item->getType());
    }

    public function testCheckClass()
    {
        $item = new EmailType();
        $this->assertEquals('form-control', $item->getClass());
    }
}
 