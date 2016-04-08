<?php

//require "vendor/autoload.php";

class HelloTest extends PHPUnit_Framework_TestCase
{
    public function testSuccess()
    {
        $this->assertTrue(1 === 1);
    }

    public function testFailed()
    {
        $this->assertTrue(1 === 2);
    }
}

