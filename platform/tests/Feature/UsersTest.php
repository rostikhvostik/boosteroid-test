<?php

namespace Tests\Feature;

use App\Models\Song;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Response;
use Tests\TestCase;

class UsersTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    public function test_users()
    {
        Song::factory()->count(3)->create();

        $query = [
            'operator' => '>',
            'total_duration' => 0,
        ];

        $response = $this->getJson(route('users', $query));
        $response->assertStatus(Response::HTTP_OK)
            ->assertJsonStructure([
                'data' => [
                    [
                        'email',
                        'total_duration',
                    ]
                ],
            ]);
    }

    public function test_users_error()
    {
        $query = [
            'operator' => '>',
        ];

        $response = $this->getJson(route('users', $query));
        $response->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY)
            ->assertJsonStructure([
                'errors' => [
                    'total_duration',
                ],
            ]);
    }
}
