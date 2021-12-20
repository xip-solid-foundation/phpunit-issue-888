<?php

declare(strict_types=1);

namespace Tests\Controller;

use App\Entity\Organization;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/**
 * @covers \App\Controller\OrganizationController
 * @covers \App\Form\OrganizationType
 *
 * @uses \App\Entity\Organization
 */
class OrganizationControllerTest extends WebTestCase
{
    private KernelBrowser $client;

    protected function setUp(): void
    {
        $this->client = static::createClient();
    }

    public function testIndex(): void
    {
        $this->client->request('GET', '/organization/');
        self::assertTrue($this->client->getResponse()->isOk());
    }

    public function testNew(): void
    {
        $this->client->request('GET', '/organization/new');
        $this->client->submitForm('Save', [
            'organization[name]' => 'Demo ORGANIZATION',
            'organization[country]' => 'NL',
        ]);

        $this->assertResponseRedirects('/organization/');
    }

    public function testEdit(): void
    {
        $organization = $this->client->getContainer()->get('doctrine')
            ->getRepository(Organization::class)->findOneBy(['name' => 'Demo ORGANIZATION']);
        $this->assertNotNull($organization);

        $this->client->request('GET', "/organization/{$organization->getId()}/edit");

        $this->client->submitForm('Update', [
            'organization[name]' => 'Edited ORGANIZATION',
            'organization[country]' => 'NL',
        ]);

        $this->assertResponseRedirects('/organization/');
    }

    public function testDelete(): void
    {
        $organization = $this->client->getContainer()->get('doctrine')
            ->getRepository(Organization::class)->findOneBy(['name' => 'Edited ORGANIZATION']);
        $this->assertNotNull($organization);

        $url = static::getContainer()->get('router')->generate('organization_show', ['id' => $organization->getId()]);
        $crawler = $this->client->request('GET', $url);
        $this->assertTrue($this->client->getResponse()->isOk());

        $form = $crawler->selectButton('Delete')->form();
        $this->client->submit($form);

        $this->assertResponseRedirects();
        $this->client->followRedirect();
    }
}
