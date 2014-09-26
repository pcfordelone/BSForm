<?php
namespace BSForm;

use BSForm\Types\InlineFormType;
use BSForm\Validator\Validator;

class InlineFormTypeTest extends \PHPUnit_Framework_TestCase
{
    public function testCheckIfExtendsAbstractFormType()
    {
        $this->assertInstanceOf('BSForm\Types\AbstractFormType', new InlineFormType(new Validator()));
    }

    public function testCheckIfImplementsFormInterface()
    {
        $this->assertInstanceOf('BSForm\Interfaces\FormInterface', new InlineFormType(new Validator()));
    }

    public function testCheckIfImplementsFieldContainerInterface()
    {
        $this->assertInstanceOf('BSForm\Interfaces\FieldContainerInterface', new InlineFormType(new Validator));
    }

    public function testCheckClass()
    {
        $form = new InlineFormType(new Validator());

        $this->assertEquals("form-inline", $form->getClass());
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testCheckIfActionIsBeingSetCorrectly()
    {
        $form = new InlineFormType(new Validator());
        $this->assertTrue(is_string($form->getAction()));

        $form->setAction(123); //throws exception
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testCheckIfMethodIsBeingSetCorrectly()
    {
        $form = new InlineFormType(new Validator());
        $this->assertEquals("POST", $form->getMethod());

        $form->setMethod("get");
        $this->assertEquals("GET", $form->getMethod());

        $form->setMethod("INVALID"); // throws exception
    }

    public function testCheckIfFormReturnsAString()
    {
        $form = new InlineFormType(new Validator());
        $this->assertTrue(is_string($form->getForm()));
    }
}
 