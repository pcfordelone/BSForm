<?php
namespace BSForm;

use BSForm\Types\OptionType;
use BSForm\Types\SelectType;

class SelectTypeTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var SelectType
     */
    private $select;

    public function setUp()
    {
        $this->select = new SelectType();
    }

    public function tearDown()
    {
        $this->select = null;
    }

    public function testIfExtendsAbstractFieldType()
    {
        $this->assertInstanceOf('BSForm\Types\AbstractFieldType', $this->select);
    }

    public function testSettersAndGetters()
    {
        $this->select->setName("name");
        $this->assertEquals("name", $this->select->getName());

        $this->select->setClass("classname");
        $this->assertEquals("classname", $this->select->getClass());

        $this->select->setIsRequired(true);
        $this->assertTrue($this->select->getIsRequired());

        $this->select->setMultiple(true);
        $this->assertTrue($this->select->getMultiple());

        $this->select->setId("ID");
        $this->assertEquals("ID", $this->select->getId());
    }

    public function testOptionContainer()
    {
        $opt1 = $this->getMock('BSForm\Types\OptionType', ['getOption']);
        $opt2 = clone $opt1;

        $opt1->expects($this->any())
            ->method('getOption')
            ->willReturn('option 1')
        ;
        $opt2->expects($this->any())
            ->method('getOption')
            ->willReturn('option 2')
        ;

        $this->select->addOption($opt1)->addOption($opt2);
        $this->assertEquals('option 1', $this->select->getOptions()[0]->getOption());
        $this->assertEquals('option 2', $this->select->getOptions()[1]->getOption());
        $this->assertContainsOnlyInstancesOf('BSForm\Types\OptionType', $this->select->getOptions());
    }

    public function testFunctionalTests()
    {
        $opt1 = new OptionType();
        $opt2 = clone $opt1;

        $this->assertEmpty($this->select->getOptions());

        $this->select->addOption($opt1)->addOption($opt2);

        $this->assertContainsOnlyInstancesOf('BSForm\Types\OptionType', $this->select->getOptions());
        $this->assertInstanceOf('BSForm\Types\OptionType', $this->select->getOptions()[0]);
        $this->assertInstanceOf('BSForm\Types\OptionType', $this->select->getOptions()[1]);

        $this->assertTrue(is_string($this->select->getField()));
    }
}
 