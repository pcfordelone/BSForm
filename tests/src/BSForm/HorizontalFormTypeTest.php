<?php
namespace BSForm;

use BSForm\Types\HorizontalFormType;
use Instantiator\Exception\InvalidArgumentException;

class HorizontalFormTypeTest extends \PHPUnit_Framework_TestCase
{
    public function testInstances()
    {
        $stub = $this->getMock('BSForm\Validator\Validator');
        $item = new HorizontalFormType($stub);

        $this->assertInstanceOf('BSForm\Types\AbstractFormType', $item);
        $this->assertInstanceOf('BSForm\Interfaces\FormInterface', $item);
        $this->assertInstanceOf('BSForm\Interfaces\FieldContainerInterface', $item);
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testSettersAndGetters()
    {
        $stub = $this->getMock('BSForm\Validator\Validator');
        $item = new HorizontalFormType($stub);

        $this->assertTrue(is_string($item->getAction()));

        $this->assertEquals("form-horizontal", $item->getClass());

        $item->setAction(123); //throws exception

        $this->assertEquals("POST", $item->getMethod());

        $item->setMethod("get");
        $this->assertEquals("GET", $item->getMethod());

        $item->setMethod("INVALID"); // throws exception

        $this->assertTrue(is_string($item->getForm()));
    }
}
 