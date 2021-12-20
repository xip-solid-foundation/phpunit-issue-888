<?php

declare(strict_types=1);

namespace Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/**
 * @covers \App\Controller\UserController
 *
 * @uses \App\Entity\User
 */
class UserControllerTest extends WebTestCase
{
    public function testIndex(): void
    {
        $client = static::createClient();
        $client->request('GET', '/user/');
        self::assertTrue($client->getResponse()->isOk());
    }
}
