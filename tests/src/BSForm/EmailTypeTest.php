<?php
namespace BSForm;

use BSForm\Types\EmailType;

class EmailTypeTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var EmailType
     */
    private $email;

    public function setUp()
    {
        $this->email = new EmailType();
    }

    public function tearDown()
    {
        $this->email = null;
    }

    public function testInstances()
    {
        $this->assertInstanceOf('BSForm\Types\AbstractInputType', $this->email);
        $this->assertInstanceOf('BSForm\Interfaces\FieldInterface', $this->email);
    }

    public function testSettersAndGetters()
    {
        $this->assertEquals("form-control", $this->email->getClass());

        $this->email->setClass("form-control error");
        $this->assertEquals("form-control error", $this->email->getClass());

        $this->email->setValue("Value");
        $this->assertEquals("Value", $this->email->getValue());

        $this->email->setDisabled(true);
        $this->assertTrue($this->email->getDisabled());

        $this->email->setAutofocus(true);
        $this->assertTrue($this->email->getAutofocus());

        $this->email->setErrorMessage("Error Message");
        $this->assertEquals("Error Message", $this->email->getErrorMessage());

        $this->email->setExtraAttributes([]);
        $this->assertTrue(is_array($this->email->getExtraAttributes()));

        $this->email->setId("ID");
        $this->assertEquals("ID", $this->email->getId());

        $this->email->setIsRequired(true);
        $this->assertTrue($this->email->getIsRequired());

        $this->email->setName("Name");
        $this->assertEquals("Name", $this->email->getName());
    }

    public function testFunctionalTests()
    {
        $this->assertFalse($this->email->getIsRequired());
        $this->assertEquals("email", $this->email->getType());
        $this->assertTrue(is_string($this->email->getField()));
    }
}
 