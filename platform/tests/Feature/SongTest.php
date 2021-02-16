<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Response;
use Tests\TestCase;

class SongTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    public function test_song()
    {
        $query = [
            'email' => $this->faker->email,
            'duration' => $this->faker->numberBetween(0, 1000),
        ];

        $response = $this->getJson(route('song', $query));
        $response->assertStatus(Response::HTTP_OK)
            ->assertJsonStructure([
                'data' => [
                    'id',
                    'email',
                    'name',
                    'last_duration',
                    'total_duration',
                    'last_ip_address',
                ],
            ]);
    }

    public function test_song_error()
    {
        $query = [
            'email' => $this->faker->email,
            'duration' => $this->faker->numberBetween(-100, 0),
        ];

        $response = $this->getJson(route('song', $query));
        $response->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY)
            ->assertJsonStructure([
                'errors' => [
                    'duration',
                ]
            ]);
    }
}
