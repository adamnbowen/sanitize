<?php
use Sanitize\Sanitize;

class SanitizeTest extends PHPUnit_Framework_TestCase
{
    public function testDefaultValueIsNull()
    {
        $s = Sanitize::clean(array());

        $this->assertNull($s->foo);
    }
}