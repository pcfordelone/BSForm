<?php
namespace BSForm;

use BSForm\Types\FormGroupType;
use BSForm\Types\PasswordType;
use BSForm\Types\TextType;

class FormGroupTypeTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var FormGroupType
     */
    private $fg;

    public function setUp()
    {
        $this->fg = new FormGroupType();
    }

    public function tearDown()
    {
        $this->fg = null;
    }

    public function testInstances()
    {
        $this->assertInstanceOf('BSForm\Interfaces\FieldInterface', $this->fg);
        $this->assertInstanceOf('BSForm\Interfaces\FieldContainerInterface', $this->fg);
    }

    public function testFieldContainer()
    {
        $stub = $this->getMock('BSForm\Types\TextType', ['getField']);
        $stub->expects($this->any())
            ->method('getField')
            ->willReturn('field');

        $this->fg->addField($stub);

        $this->assertEquals('field', $this->fg->getFieldList()[0]->getField());
        $this->assertContainsOnlyInstancesOf('BSForm\Interfaces\FieldInterface', $this->fg->getFieldList());
    }

    public function testFunctionalTests()
    {
        $textField = new TextType();
        $passwordField = new PasswordType();

        $this->assertEmpty($this->fg->getFieldList());

        $this->fg->addField($textField);
        $this->fg->addField($passwordField);

        $this->assertInstanceOf('BSForm\Types\TextType', $this->fg->getFieldList()[0]);
        $this->assertInstanceOf('BSForm\Types\PasswordType', $this->fg->getFieldList()[1]);
        $this->assertContainsOnlyInstancesOf('BSForm\Interfaces\FieldInterface', $this->fg->getFieldList());
        $this->assertTrue(is_string($this->fg->getFieldList()[0]->getField()));
        $this->assertTrue(is_string($this->fg->getFieldList()[1]->getField()));

        $this->assertEquals('form-group', $this->fg->getClass());
        $this->fg->addClass("classname");
        $this->assertEquals("form-group classname", $this->fg->getClass());

        $this->assertTrue(is_string($this->fg->getField()));
    }
}
 