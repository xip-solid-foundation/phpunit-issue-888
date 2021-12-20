<?php

declare(strict_types=1);

namespace Tests\Controller;

use App\Controller\UserController;
use PHPUnit\Framework\TestCase;

/**
 * @covers \App\Controller\UserController
 *
 * @uses \App\Entity\User
 */
class UserControllerTest extends TestCase
{
    public function testIndex(): void
    {
        $controller = new UserController;
        $response = $controller->index();
        self::assertTrue($response->isOk());
    }
}
