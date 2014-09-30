<?php
namespace BSForm;

use BSForm\Types\TextareaType;

class TextareaTypeTest extends \PHPUnit_Framework_TestCase
{
    public function testInstances()
    {
        $item = new TextareaType();

        $this->assertInstanceOf('BSForm\Types\AbstractFieldType', $item);
    }

    public function testSettersAndGetters()
    {
        $item = new TextareaType();

        $item->setValue("TextArea Value");
        $this->assertEquals("TextArea Value", $item->getValue());

        $item->setPlaceholder("TextArea Placeholder");
        $this->assertEquals("TextArea Placeholder", $item->getPlaceholder());

        $item->setRows(5);
        $this->assertEquals(5, $item->getRows());
        $this->assertTrue(is_int($item->getRows()));

        $this->assertTrue(is_string($item->getField()));
    }
}
 