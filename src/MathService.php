<?php

namespace App;

class MathService
{
    protected Calculator $calculator;

    public function __construct()
    {
        $this->calculator = new Calculator();
    }

    public function addAndDouble($a, $b)
    {
        $sum = $this->calculator->add($a, $b);  // unit logic
        return $sum * 2; //extra logic
    }
}
