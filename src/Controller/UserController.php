<?php

namespace App\Controller;

use App\Entity\User;

class UserController
{
    public function index(): string
    {
        return (new User())->getSomething();
    }
}
