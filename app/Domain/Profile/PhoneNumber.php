<?php

namespace App\Domain\Profile;

class PhoneNumber
{
    private string $value;

    /**
     * PhoneNumber constructor.
     * @param string $value
     */
    public function __construct(string $value)
    {
        // if (! preg_match("/^[0-9]+$/u", $value))
        //     throw new \InvalidArgumentException("不正な値が存在します。 value: $value");
        // $this->value = $value;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->value;
    }
}
