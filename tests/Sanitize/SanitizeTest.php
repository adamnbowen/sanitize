<?php
use Sanitize\Sanitize;

class SanitizeTest extends PHPUnit_Framework_TestCase
{
    public function testDefaultValueIsNull()
    {
        $s = Sanitize::clean(array());

        $this->assertNull($s->foo);
    }

    public function testSanitizedObjectIsIterable()
    {
        $a = array('foo' => 'bar', 'bar' => 'baz');

        $s = Sanitize::clean($a);

        foreach ($s as $key => $value) {
            $b[$key] = $value;
        }

        $this->assertEquals($a, $b);
    }

    public function testBoolValuesUnsanitized()
    {
        $s = Sanitize::clean(array('foo' => true, 'bar' => false));

        $this->assertTrue($s->foo);

        $this->assertFalse($s->bar);
    }
}