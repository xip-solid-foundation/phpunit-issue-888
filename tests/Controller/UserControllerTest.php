<?php

declare(strict_types=1);

namespace Tests\Controller;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/**
 * @covers \App\Controller\UserController
 * @covers \App\Form\UserType
 *
 * @uses \App\Entity\User
 */
class UserControllerTest extends WebTestCase
{
    private KernelBrowser $client;

    public function testIndex(): void
    {
        $client = static::createClient();
        $client->request('GET', '/user/');
        self::assertTrue($client->getResponse()->isOk());
    }
}
