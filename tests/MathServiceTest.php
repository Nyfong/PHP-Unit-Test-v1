<?php

use PHPUnit\Framework\TestCase;
use App\MathService;

class MathServiceTest extends TestCase
{
    public function testAddAndDouble()
    {
        $service = new MathService();
        $result = $service->addAndDouble(2, 3);
        $this->assertEquals(10, $result); // (2+3) * 2 = 10
    }
}
