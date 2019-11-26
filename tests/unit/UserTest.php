<?php
declare(strict_types=1);

namespace Tests\unit;

use App\Models\User;
use Tests\TestCase;

class UserTest extends TestCase
{
    protected $user;
    public function setUp() : void
    {
        $this->user = new User;
    }
    public function test_that_we_can_get_the_first_name()
    {
        $this->user->setFirstName('Billy');
        $this->assertEquals($this->user->getFirstName(), 'Billy');
    }

    public function test_that_we_can_get_the_last_name()
    {
        $this->user->setLastName('Smith');
        $this->assertEquals($this->user->getLastName(), 'Smith');
    }

    public function test_full_name_is_return()
    {
        $this->user->setFirstName('Billy');
        $this->user->setLastName('Smith');

        $this->assertEquals($this->user->getFullName(), 'Billy Smith');
    }

    public function test_first_and_last_name_are_trimmed()
    {
        $this->user->setFirstName('  Billy      ');
        $this->user->setLastName('Smith       ');

        $this->assertEquals($this->user->getFirstName(), 'Billy');
        $this->assertEquals($this->user->getLastName(), 'Smith');
    }

    public function test_email_address_can_be_set()
    {
        $this->user->setEmail('billy@example.com');

        $this->assertEquals($this->user->getEmail(), 'billy@example.com');
    }

    public function test_email_variables_contain_correct_values()
    {
        $this->user->setFirstName('  Billy      ');
        $this->user->setLastName('Smith       ');
        $this->user->setEmail('billy@example.com');

        $emailVariables = $this->user->getEmailVariables();

        $this->assertArrayHasKey('full_name', $emailVariables);
        $this->assertArrayHasKey('email', $emailVariables);

        $this->assertEquals($emailVariables['full_name'], 'Billy Smith');
        $this->assertEquals($emailVariables['email'], 'billy@example.com');

    }
}
