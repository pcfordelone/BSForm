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
        /*
        $opt1 = $this->getMockBuilder('BSForm\Types\OptionType')
            ->setMethods(['getOption'])
            ->getMock()->expects($this->any())->willReturn('');
        */
        $opt1 = $this->getMock('BSForm\Types\OptionType', ["getOption"]);/*
            ->expects($this->any())
            ->willReturn('');
        */
        $opt2 = clone $opt1;

        $item->addOption($opt1)->addOption($opt2);
        $this->assertEmpty($item->getOptions()[0]->getOption());
        $this->assertEmpty($item->getOptions()[1]->getOption());

        $this->assertTrue(is_string($item->getField()));
    }
}
 