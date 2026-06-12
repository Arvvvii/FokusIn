<?php

namespace Tests\Feature;

use App\Models\NewsletterSubscriber;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class NewsletterTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_subscribe_to_newsletter_with_valid_email()
    {
        $response = $this->postJson('/api/newsletter/subscribe', [
            'email' => 'subscriber@example.com'
        ]);

        $response->assertStatus(201)
            ->assertJson([
                'success' => true,
                'message' => 'Terima kasih! Anda berhasil berlangganan newsletter kami.'
            ]);

        $this->assertDatabaseHas('newsletter_subscribers', [
            'email' => 'subscriber@example.com'
        ]);
    }

    public function test_cannot_subscribe_with_duplicate_email()
    {
        NewsletterSubscriber::create(['email' => 'duplicate@example.com']);

        $response = $this->postJson('/api/newsletter/subscribe', [
            'email' => 'duplicate@example.com'
        ]);

        $response->assertStatus(400)
            ->assertJson([
                'success' => false,
                'message' => 'Email ini sudah terdaftar untuk berlangganan.'
            ]);
    }

    public function test_cannot_subscribe_with_invalid_email()
    {
        $response = $this->postJson('/api/newsletter/subscribe', [
            'email' => 'not-an-email'
        ]);

        $response->assertStatus(422)
            ->assertJsonValidationErrors(['email']);
    }
}
