<?php
namespace BSForm;

use BSForm\Types\PasswordType;

class PasswordTypeTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var PasswordType
     */
    private $pword;

    public function setUp()
    {
        $this->pword = new PasswordType();
    }

    public function tearDown()
    {
        $this->pword = null;
    }

    public function testInstances()
    {
        $this->assertInstanceOf('BSForm\Types\AbstractInputType', $this->pword);
        $this->assertInstanceOf('BSForm\Interfaces\FieldInterface', $this->pword);
    }

    public function testSettersAndGetters()
    {
        $this->pword->setClass("form-control error");
        $this->assertEquals("form-control error", $this->pword->getClass());

        $this->pword->setValue("Value");
        $this->assertEquals("Value", $this->pword->getValue());

        $this->pword->setDisabled(true);
        $this->assertTrue($this->pword->getDisabled());

        $this->pword->setAutofocus(true);
        $this->assertTrue($this->pword->getAutofocus());

        $this->pword->setErrorMessage("Error Message");
        $this->assertEquals("Error Message", $this->pword->getErrorMessage());

        $this->pword->setExtraAttributes([]);
        $this->assertTrue(is_array($this->pword->getExtraAttributes()));

        $this->pword->setId("ID");
        $this->assertEquals("ID", $this->pword->getId());

        $this->pword->setIsRequired(true);
        $this->assertTrue($this->pword->getIsRequired());

        $this->pword->setName("Name");
        $this->assertEquals("Name", $this->pword->getName());
    }

    public function testFunctionalTests()
    {
        $this->assertEquals("form-control", $this->pword->getClass());
        $this->assertEquals("password", $this->pword->getType());
        $this->assertTrue(is_string($this->pword->getField()));
    }
}
 