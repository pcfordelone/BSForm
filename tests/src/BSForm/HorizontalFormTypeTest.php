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

    /**
     * @expectedException InvalidArgumentException
     */
    public function testSettersAndGetters()
    {
        $validator = $this->getMockBuilder('BSForm\Validator\Validator')->getMock();
        $form = new HorizontalFormType($validator);

        $this->assertTrue(is_string($form->getAction()));

        $this->assertEquals("form-horizontal", $form->getClass());

        $form->setAction(123); //throws exception

        $this->assertEquals("POST", $form->getMethod());

        $form->setMethod("get");
        $this->assertEquals("GET", $form->getMethod());

        $form->setMethod("INVALID"); // throws exception

        $this->assertTrue(is_string($form->getForm()));
    }
}
 