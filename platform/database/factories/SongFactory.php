<?php

namespace Database\Factories;

use App\Models\Song;
use Illuminate\Database\Eloquent\Factories\Factory;

class SongFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Song::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $lastDuration = $this->faker->numberBetween(0, 1000);

        return [
            'email' => $this->faker->email,
            'name' => $this->faker->name,
            'last_duration' => $lastDuration,
            'total_duration' => $this->faker->numberBetween(1, 3) * $lastDuration,
            'last_ip_address' => $this->faker->ipv4,
        ];
    }
}
