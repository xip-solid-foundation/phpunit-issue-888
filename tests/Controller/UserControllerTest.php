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

    protected function setUp(): void
    {
        $this->client = static::createClient();
    }

    public function testIndex(): void
    {
        $this->client->request('GET', '/user/');
        self::assertTrue($this->client->getResponse()->isOk());

        $this->client->request('GET', '/user/new');
        $this->client->submitForm('Save', [
            'user[email]' => 'Demo@USER.com',
            'user[password]' => 'NL',
        ]);

        $this->assertResponseRedirects('/user/');

        $em = $this->client->getContainer()->get('doctrine')->getManager();
        $user = $em->getRepository(User::class)->findOneBy(['email' => 'Demo@USER.com']);
        $em->remove($user);
        $em->flush();
    }
}
