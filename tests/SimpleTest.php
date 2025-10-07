<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;
use App\Entity\User;
use App\Entity\Contact;

class SimpleTest extends TestCase
{
    public function testUserCanSetUsername(): void
    {
        $user = new User();
        $user->setUsername('test');
        $this->assertEquals('test', $user->getUsername());
    }

    public function testUserHasDefaultRoles(): void
    {
        $user = new User();
        $roles = $user->getRoles();
        $this->assertContains('ROLE_USER', $roles);
    }


    public function testContactCanSetProperties(): void
    {
        $contact = new Contact();
        $contact->setFirstName('John');
        $contact->setName('Doe');
        $contact->setMessage('Test message');
        
        $this->assertEquals('John', $contact->getFirstName());
        $this->assertEquals('Doe', $contact->getName());
        $this->assertEquals('Test message', $contact->getMessage());
    }

    public function testUserIdentifier(): void
    {
        $user = new User();
        $user->setUsername('admin');
        $this->assertEquals('admin', $user->getUserIdentifier());
    }

    public function testMathBasic(): void
    {
        // Un test simple qui passe toujours
        $this->assertEquals(4, 2 + 2);
    }
}
