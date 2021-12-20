<?php

namespace App\Entity;

// NOTE: removing either the attribute or the interface will fix the test
#[ORM\Entity]
class User implements SomeInterface
{
    public function getSomething(): string
    {
        return 'test';
    }
}
