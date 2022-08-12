<?php

use PHPUnit\Framework\TestCase;

class testHttpClass extends TestCase
{
    public function testRequestWork(): void
    {
        Http::responseCode(200);
        $this->assertEquals(200, Http::getResponseCode());
    }
}