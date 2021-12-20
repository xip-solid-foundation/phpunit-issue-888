<?php

declare(strict_types=1);

namespace Tests\Entity;

use App\Entity\Organization;
use PHPUnit\Framework\TestCase;

/**
 * @covers \App\Entity\Organization
 */
class OrganizationTest extends TestCase
{
    private Organization $organization;

    protected function setUp(): void
    {
        $this->organization = new Organization();
    }

    public function testId(): void
    {
        $this->assertNull($this->organization->getId());
    }

    public function testName(): void
    {
        $this->organization->setName('Organization');
        $this->assertSame('Organization', $this->organization->getName());
    }

    public function testCountry(): void
    {
        $this->organization->setCountry('NL');
        $this->assertSame('NL', $this->organization->getCountry());
    }
}
