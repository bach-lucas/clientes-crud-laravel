<?php

namespace Tests\Feature;

use App\Models\Player;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PlayerApiTest extends TestCase
{
    
    use RefreshDatabase;

    /** @test */
    public function it_lists_players()
    {

        Player::factory()->count(3)->create();

        $response = $this->getJson('/api/players');

        $response->assertStatus(200)
                 ->assertJsonCount(3);
    }

    /** @test */
    public function it_creates_a_player()
    {
        $data = [
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'telefone' => '1234567890',
        ];

        $response = $this->postJson('/api/players', $data);

        $response->assertStatus(201)
                 ->assertJsonFragment([
                     'email' => 'john@example.com'
    ]);
    
        $this->assertDatabaseHas('players', [
            'email' => 'john@example.com',
            'telefone' => '1234567890'
        ]);

    }

    /** @test */
    public function it_shows_a_player()
    {
        $player = Player::factory()->create();

        $response = $this->getJson("/api/players/{$player->id}");

        $response->assertStatus(200)
                 ->assertJsonFragment([
                     'email' => $player->email
                 ]);
    }

    /** @test */
    public function it_updates_a_player()
    {
        $player = Player::factory()->create();
        $data = [
            'name' => 'Jane Doe',
            'email' => 'jane@example.com',
            'telefone' => '0987654321',
        ];

        $response = $this->putJson("/api/players/{$player->id}", $data);

        $response->assertStatus(200)
                 ->assertJsonFragment([
                     'email' => 'jane@example.com'
                 ]);

        $this->assertDatabaseHas('players', [
            'email' => 'jane@example.com',
            'telefone' => '0987654321'
        ]);
    }

    /** @test */
    public function it_deletes_a_player()
    {
        $player = Player::factory()->create();
        $response = $this->deleteJson("/api/players/{$player->id}");
        $response->assertStatus(204);
        $this->assertDatabaseMissing('players', [
            'id' => $player->id
        ]);
    }
}