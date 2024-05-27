<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test user creation.
     *
     * @return void
     */
    public function test_it_creates_a_user()
    {
        $user = User::factory()->create();

        $this->assertDatabaseHas('users', [
            'email' => $user->email,
        ]);
    }

    /**
     * Test user has contacts.
     *
     * @return void
     */
    public function test_it_has_contacts()
    {
        $user = User::factory()->hasContacts(3)->create();

        $this->assertCount(3, $user->contacts);
    }

    /**
     * Test user has messages.
     *
     * @return void
     */
    public function test_it_has_messages()
    {
        $user = User::factory()->hasMessages(3)->create();

        $this->assertCount(3, $user->messages);
    }
}
