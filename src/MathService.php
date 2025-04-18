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
        $sum = $this->calculator->add($a, $b);
        return $sum * 2;
    }
}
