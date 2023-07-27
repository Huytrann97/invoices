<?php

namespace App\Domain\Profile;

use App\Domain\Profile\Name;
use App\Domain\Profile\Email;
use App\Domain\Profile\PhoneNumber;

class Profile
{
    private Name $name;
    private Email $email;
    private PhoneNumber $phoneNumber;

    public function __construct(
        Name $name,
        Email $email,
        PhoneNumber $phoneNumber
    ) {
        $this->name = $name;
        $this->email = $email;
        $this->phoneNumber = $phoneNumber;
    }

    public function name():string
    {
        return (string) $this->name;
    }
    public function email():string
    {
        return (string) $this->email;
    }
    public function phoneNumber():string
    {
        return (string) $this->phoneNumber;
    }

}
