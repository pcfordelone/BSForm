<?php
namespace BSForm;

use BSForm\Types\HorizontalFormType;
use BSForm\Validator\Validator;
use Instantiator\Exception\InvalidArgumentException;

class HorizontalFormTypeTest extends \PHPUnit_Framework_TestCase
{
    public function testCheckIfExtendsAbstractFormType()
    {
        $this->assertInstanceOf('BSForm\Types\AbstractFormType', new HorizontalFormType(new Validator()));
    }

    public function testCheckIfImplementsFormInterface()
    {
        $this->assertInstanceOf('BSForm\Interfaces\FormInterface', new HorizontalFormType(new Validator()));
    }

    public function testCheckIfImplementsFieldContainerInterface()
    {
        $this->assertInstanceOf('BSForm\Interfaces\FieldContainerInterface', new HorizontalFormType(new Validator));
    }

    public function testCheckClass()
    {
        $form = new HorizontalFormType(new Validator());

        $this->assertEquals("form-horizontal", $form->getClass());
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testCheckIfActionIsBeingSetCorrectly()
    {
        $form = new HorizontalFormType(new Validator());
        $this->assertTrue(is_string($form->getAction()));

        $form->setAction(123); //throws exception
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testCheckIfMethodIsBeingSetCorrectly()
    {
        $form = new HorizontalFormType(new Validator());
        $this->assertEquals("POST", $form->getMethod());

        $form->setMethod("get");
        $this->assertEquals("GET", $form->getMethod());

        $form->setMethod("INVALID"); // throws exception
    }

    public function testCheckIfFormReturnsAString()
    {
        $form = new HorizontalFormType(new Validator());
        $this->assertTrue(is_string($form->getForm()));
    }
}
 