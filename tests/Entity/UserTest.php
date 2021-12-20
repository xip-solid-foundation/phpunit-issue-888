<?php

declare(strict_types=1);

namespace Tests\Entity;

use App\Entity\User;
use PHPUnit\Framework\TestCase;

/**
 * @covers \App\Entity\User
 */
class UserTest extends TestCase
{
    protected function setUp(): void
    {
        $this->user = new User();
    }

    public function testPassword(): void
    {
        $this->assertSame('test', $this->user->getSomething());
    }
}
