<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MessageTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_getMessages()
    {
        $response = $this->getJson('/api/threads/1/messages');

        $response->assertStatus(200)
        ->assertJson([['id' => 1, 'content' => 'hello']]);
    }

    public function test_postMessage()
    {
        $response = $this->postJson('/api/threads/1/messages', ['content' => 'world']);

        $response->assertStatus(200)
        ->assertJson(['created' => true]);
    }
}
