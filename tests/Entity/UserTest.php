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
    private User $user;

    protected function setUp(): void
    {
        $this->user = new User('test@email', ['ROLE_ADMIN'], 'password');
    }

    public function testId(): void
    {
        $this->assertNull($this->user->getId());
    }

    public function testEmail(): void
    {
        $this->user->setEmail('test@email');
        $this->assertSame('test@email', $this->user->getEmail());
        $this->assertSame('test@email', $this->user->getUserIdentifier());
    }

    public function testPassword(): void
    {
        $this->user->setPassword('password');
        $this->assertSame('password', $this->user->getPassword());
    }

    public function testRoles(): void
    {
        $this->user->setRoles(['ROLE_ADMIN']);
        $this->assertSame('ROLE_ADMIN', $this->user->getRoles()[0]);
    }

    public function testEraseCredentials(): void
    {
        $this->user->eraseCredentials();
        $this->assertTrue(true, 'nothing to test');
    }
}
