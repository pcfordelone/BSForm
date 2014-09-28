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

    /**
     * @expectedException InvalidArgumentException
     */
    public function testSettersAndGetters()
    {
        $validator = $this->getMockBuilder('BSForm\Validator\Validator')->getMock();
        $form = new InlineFormType($validator);

        $this->assertTrue(is_string($form->getAction()));

        $this->assertEquals("form-inline", $form->getClass());

        $form->setAction(123); //throws exception

        $this->assertEquals("POST", $form->getMethod());

        $form->setMethod("get");
        $this->assertEquals("GET", $form->getMethod());

        $form->setMethod("INVALID"); // throws exception

        $this->assertTrue(is_string($form->getForm()));
    }
}
 