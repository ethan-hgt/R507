<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;

class BasicTest extends TestCase
{
    public function testStringOperations(): void
    {
        $this->assertStringContainsString('world', 'hello world');
        $this->assertEquals('HELLO', strtoupper('hello'));
    }

    public function testArrayOperations(): void
    {
        $array = ['a', 'b', 'c'];
        $this->assertCount(3, $array);
        $this->assertContains('b', $array);
    }

    public function testDateOperations(): void
    {
        $date = new \DateTimeImmutable('2024-01-01');
        $this->assertEquals('2024', $date->format('Y'));
        $this->assertEquals('01', $date->format('m'));
    }
}
