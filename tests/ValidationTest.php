<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;
use App\Entity\Contact;
use App\Entity\User;

class ValidationTest extends TestCase
{
    public function testEmailValidation(): void
    {
        $email = 'test@example.com';
        $this->assertTrue(filter_var($email, FILTER_VALIDATE_EMAIL) !== false);
    }

    public function testPasswordStrength(): void
    {
        $password = 'StrongPassword123!';
        $this->assertGreaterThan(8, strlen($password));
        $this->assertMatchesRegularExpression('/[A-Z]/', $password);
        $this->assertMatchesRegularExpression('/[0-9]/', $password);
    }

    public function testUserRoleValidation(): void
    {
        $user = new User();
        $user->setRoles(['ROLE_ADMIN', 'ROLE_USER']);
        
        $roles = $user->getRoles();
        $this->assertContains('ROLE_ADMIN', $roles);
        $this->assertContains('ROLE_USER', $roles);
    }

}
