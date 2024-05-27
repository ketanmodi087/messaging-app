<?php

namespace Tests\Feature;

use App\Models\Contact;
use App\Models\Message;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class MessageTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test creating a message.
     *
     * @return void
     */
    public function test_it_creates_a_message()
    {
        $user = User::factory()->create();
        $contact = Contact::factory()->create(['user_id' => $user->id]);

        $response = $this->actingAs($user)->post(route('messages.store'), [
            'type' => 'text',
            'content' => 'Hello World',
            'contact_id' => $contact->id,
        ]);

        $response->assertRedirect(route('messages.index'));
        $this->assertDatabaseHas('messages', [
            'content' => 'Hello World',
            'user_id' => $user->id,
            'contact_id' => $contact->id,
        ]);
    }

    /**
     * Test listing messages.
     *
     * @return void
     */
    public function test_it_lists_messages()
    {
        $user = User::factory()->create();
        $contact = Contact::factory()->create(['contact_user_id' => $user->id]);
        $message1 = Message::factory()->create(['user_id' => $user->id, 'contact_id' => $contact->id]);
        $message2 = Message::factory()->create(['user_id' => $contact->user_id, 'contact_id' => $contact->id]);

        $response = $this->actingAs($user)->get(route('messages.index'));

        $response->assertStatus(200);
        $response->assertSee($message1->content);
        $response->assertSee($message2->content);
    }
}
