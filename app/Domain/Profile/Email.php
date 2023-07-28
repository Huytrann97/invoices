<?php

namespace App\Domain\Profile;

class Email
{
    private string $value;

    /**
     * Email constructor.
     * @param string $value
     */
    public function __construct(string $value)
    {
        if (! preg_match("/^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@[a-zA-Z0-9-_]+(?:\.[a-zA-Z0-9-_]+)*$/u", $value))
            throw new \InvalidArgumentException("不正な値が存在します。");
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->value;
    }
}
