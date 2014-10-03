<?php
namespace BSForm;

use BSForm\Types\ColumnType;
use BSForm\Types\PasswordType;
use BSForm\Types\TextType;

class ColumnTypeTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var ColumnType
     */
    private $column;

    public function setUp()
    {
        $this->column = new ColumnType();
    }

    public function tearDown()
    {
        $this->column = null;
    }

    public function testInstances()
    {
        $this->assertInstanceOf('BSForm\Interfaces\FieldInterface', $this->column);
        $this->assertInstanceOf('BSForm\Interfaces\FieldContainerInterface', $this->column);
    }

    public function testSettersAndGetters()
    {
        $this->column->setClass("classname");
        $this->assertEquals("classname", $this->column->getClass());
    }

    public function testFieldContainer()
    {
        $stub = $this->getMock('BSForm\Types\TextType', ['getField']);
        $stub->expects($this->any())
            ->method('getField')
            ->willReturn('field');

        $this->column->addField($stub);

        $this->assertEquals('field', $this->column->getFieldList()[0]->getField());
        $this->assertContainsOnlyInstancesOf('BSForm\Interfaces\FieldInterface', $this->column->getFieldList());
    }

    public function testFunctionalTests()
    {
        $textField = new TextType();
        $passwordField = new PasswordType();

        $this->assertEmpty($this->column->getFieldList());

        $this->column->addField($textField);
        $this->column->addField($passwordField);

        $this->assertInstanceOf('BSForm\Types\TextType', $this->column->getFieldList()[0]);
        $this->assertInstanceOf('BSForm\Types\PasswordType', $this->column->getFieldList()[1]);
        $this->assertContainsOnlyInstancesOf('BSForm\Interfaces\FieldInterface', $this->column->getFieldList());
        $this->assertTrue(is_string($this->column->getFieldList()[0]->getField()));
        $this->assertTrue(is_string($this->column->getFieldList()[1]->getField()));

        $this->assertTrue(is_string($this->column->getField()));
    }
}
 