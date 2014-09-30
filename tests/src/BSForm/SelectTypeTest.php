<?php
namespace BSForm;

use BSForm\Types\SelectType;

class SelectTypeTest extends \PHPUnit_Framework_TestCase
{
    public function testIfExtendsAbstractFieldType()
    {
        $this->assertInstanceOf('BSForm\Types\AbstractFieldType', new SelectType());
    }

    public function testSettersAndGetters()
    {
        $item = new SelectType();

        $item->setName("name");
        $this->assertEquals("name", $item->getName());

        $item->setClass("classname");
        $this->assertEquals("classname", $item->getClass());

        $item->setIsRequired(true);
        $this->assertTrue($item->getIsRequired());

        $item->setMultiple(true);
        $this->assertTrue($item->getMultiple());

        $item->setId("ID");
        $this->assertEquals("ID", $item->getId());
    }

    public function testOptionContainer()
    {
        $item = new SelectType();

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

        $item->addOption($opt1)->addOption($opt2);
        $this->assertEquals('option 1', $item->getOptions()[0]->getOption());
        $this->assertEquals('option 2', $item->getOptions()[1]->getOption());
        $this->assertContainsOnlyInstancesOf('BSForm\Types\OptionType', $item->getOptions());

        $this->assertTrue(is_string($item->getField()));
    }
}
 