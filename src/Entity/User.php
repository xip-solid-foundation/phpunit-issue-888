<?php

namespace App\Entity;

#[ORM\Entity]
class User implements SomeInterface
{
    public function getSomething(): string
    {
        return 'test';
    }
}
