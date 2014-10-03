<?php
namespace BSForm;

use BSForm\Types\FormGroupType;
use BSForm\Types\HorizontalFormType;
use BSForm\Types\TextType;
use BSForm\Validator\Validator;
use BSForm\Validator\Validator as Assert;

class HorizontalFormTypeTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var HorizontalFormType
     */
    private $form;

    public function setUp()
    {
        $validator = new Validator();
        $this->form = new HorizontalFormType($validator);
    }

    public function tearDown()
    {
        $this->form = null;
    }

    public function testInstances()
    {
        $this->assertInstanceOf('BSForm\Types\AbstractFormType', $this->form);
        $this->assertInstanceOf('BSForm\Interfaces\FormInterface', $this->form);
        $this->assertInstanceOf('BSForm\Interfaces\FieldContainerInterface', $this->form);
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testSetMethodException()
    {
        $this->form->setMethod("INVALID");
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testSetActionException()
    {
        $this->form->setAction(123);
    }

    public function testSettersAndGetters()
    {
        $this->form->setAction("action.php");
        $this->assertEquals("action.php", $this->form->getAction());
        $this->form->setMethod("get");
        $this->assertEquals("get", $this->form->getMethod());
    }

    public function testFunctionalTests()
    {
        $textField = new TextType();
        $formGroup = new FormGroupType();

        $this->assertEmpty($this->form->getFieldList());

        $formGroup->addField($textField);
        $this->form->addField($formGroup);

        $this->assertContainsOnlyInstancesOf('BSForm\Interfaces\FieldInterface', $this->form->getFieldList());
        $this->assertInstanceOf('BSForm\Types\FormGroupType', $this->form->getFieldList()[0]);
        $this->assertInstanceOf('BSForm\Types\TextType', $this->form->getFieldList()[0]->getFieldList()[0]);

        $this->assertInstanceOf('BSForm\Types\TextType', $this->form->find("type", "text"));

        $this->form->getValidator()->addRule([
            "field" => $textField,
            "validator" => Assert::NOT_BLANK
        ]);
        $this->assertFalse($this->form->getValidator()->validate());

        $populateData = [[
            "attr" => "type",
            "attrVal" => "text",
            "value" => "texto do campo de texto"
        ]];
        $this->form->populate($populateData);
        $this->assertInstanceOf('BSForm\Types\TextType', $this->form->find("type", "text"));
        $this->assertEquals("texto do campo de texto", $this->form->find("type", "text")->getValue());

        $this->assertTrue(is_string($this->form->getAction()));
        $this->assertEquals("form-horizontal", $this->form->getClass());
        $this->assertEquals("POST", $this->form->getMethod());
        $this->assertTrue(is_string($this->form->getForm()));
    }
}
 