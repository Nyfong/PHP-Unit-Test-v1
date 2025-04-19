<?php

use PHPUnit\Framework\TestCase;
use App\Calculator;

class CalculatorTest extends TestCase {
    public function testAdd() {
        $calc = new Calculator();
        $this->assertEquals(2, $calc->add(2, 3));
         // This is WRONG on purpose — should be 5
         //$this->assertEquals(6, $calc->add(2, 3));
    }
}
 