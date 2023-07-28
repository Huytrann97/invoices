<?php

namespace App\Domain\Items;
class Price
{
    private float $value;

    public function __construct(float $value)
    {
        $this->value = $value;
    }

    public function toFloat(): float
    {
        return $this->value;
    }
}
