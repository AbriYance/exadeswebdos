<?php

namespace Database\Factories;

use App\Models\Actorpelicula;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ActorpeliculaFactory extends Factory
{
    protected $model = Actorpelicula::class;

    public function definition()
    {
        return [
			'act_id' => $this->faker->name,
			'pel_id' => $this->faker->name,
			'aplpapel' => $this->faker->name,
        ];
    }
}
