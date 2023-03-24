<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ThreadTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_getThreads()
    {
        $response = $this->getJson('/api/threads');

        $response->assertStatus(200)
        ->assertJson([['id' => 1, 'name' => 'foo'], ['id' => 2, 'name' => 'bar']]);
    }

    public function test_postThread()
    {
        $response = $this->postJson('/api/threads', ['name' => 'baz']);

        $response->assertStatus(200)
        ->assertJson(['created' => true]);
    }
}
