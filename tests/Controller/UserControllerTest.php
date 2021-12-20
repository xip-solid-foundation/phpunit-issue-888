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
 * @uses \App\Repository\UserRepository
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
    }

    public function testNew(): void
    {
        $this->client->request('GET', '/user/new');
        $this->client->submitForm('Save', [
            'user[email]' => 'Demo@USER.com',
            'user[password]' => 'NL',
        ]);

        $this->assertResponseRedirects('/user/');
    }

    public function testEdit(): void
    {
        $user = $this->client->getContainer()->get('doctrine')
            ->getRepository(User::class)->findOneBy(['email' => 'Demo@USER.com']);
        $this->assertNotNull($user);

        $this->client->request('GET', "/user/{$user->getId()}/edit");

        $this->client->submitForm('Update', [
            'user[email]' => 'Edited@USER.com',
            'user[password]' => 'NL',
        ]);

        $this->assertResponseRedirects('/user/');
    }

    public function testDelete(): void
    {
        $user = $this->client->getContainer()->get('doctrine')
            ->getRepository(User::class)->findOneBy(['email' => 'Edited@USER.com']);
        $this->assertNotNull($user);

        $url = static::getContainer()->get('router')->generate('user_show', ['id' => $user->getId()]);
        $crawler = $this->client->request('GET', $url);
        $this->assertTrue($this->client->getResponse()->isOk());

        $form = $crawler->selectButton('Delete')->form();
        $this->client->submit($form);

        $this->assertResponseRedirects();
        $this->client->followRedirect();
    }
}
