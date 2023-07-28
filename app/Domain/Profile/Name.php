<?php

namespace App\Domain\Profile;

class Name
{
    private string $value;

    public function __construct(string $value)
    {
        $this->value = $value;
    }

    public function toString():string
    {
        return $this->value;
    }
}