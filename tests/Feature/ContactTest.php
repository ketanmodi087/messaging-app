<?php

namespace Tests\Feature;

use App\Models\Contact;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ContactTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test creating a contact.
     *
     * @return void
     */
    public function test_it_creates_a_contact()
    {
        $user = User::factory()->create();
        $contactUser = User::factory()->create();

        $response = $this->actingAs($user)->post(route('contacts.store'), [
            'name' => 'John Doe',
            'contact_user_id' => $contactUser->id,
            'phone' => '1234567890',
        ]);

        $response->assertRedirect(route('contacts.index'));
        $this->assertDatabaseHas('contacts', [
            'name' => 'John Doe',
            'user_id' => $user->id,
            'contact_user_id' => $contactUser->id,
            'phone' => '1234567890',
        ]);
    }

    /**
     * Test listing contacts.
     *
     * @return void
     */
    public function test_it_lists_contacts()
    {
        $user = User::factory()->create();
        $contact1 = Contact::factory()->create(['user_id' => $user->id]);
        $contact2 = Contact::factory()->create(['user_id' => $user->id]);

        $response = $this->actingAs($user)->get(route('contacts.index'));

        $response->assertStatus(200);
        $response->assertSee($contact1->name);
        $response->assertSee($contact2->name);
    }

    /**
     * Test deleting a contact.
     *
     * @return void
     */
    public function test_it_deletes_a_contact()
    {
        $user = User::factory()->create();
        $contact = Contact::factory()->create(['user_id' => $user->id]);

        $response = $this->actingAs($user)->delete(route('contacts.destroy', $contact));

        $response->assertRedirect(route('contacts.index'));
        $this->assertDatabaseMissing('contacts', [
            'id' => $contact->id,
        ]);
    }
}
