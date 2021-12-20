<?php

declare(strict_types=1);

namespace Tests\Repository;

use App\Entity\Organization;
use App\Repository\OrganizationRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

/**
 * @covers \App\Repository\OrganizationRepository
 *
 * @uses \App\Entity\Organization
 */
class OrganizationRepositoryTest extends KernelTestCase
{
    private ?EntityManagerInterface $entityManager;
    private OrganizationRepository $organizationRepository;

    protected function setUp(): void
    {
        $kernel = self::bootKernel();

        $this->entityManager = $kernel->getContainer()
            ->get('doctrine')
            ->getManager();

        $this->organizationRepository = $this->entityManager->getRepository(Organization::class);
    }

    protected function tearDown(): void
    {
        parent::tearDown();

        $this->entityManager->close();
        $this->entityManager = null; // avoid memory leaks
    }

    public function test(): void
    {
        $this->assertTrue(true);
    }
}
