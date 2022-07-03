<?php

namespace Database\Factories;

use App\Models\Socio;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class SocioFactory extends Factory
{
    protected $model = Socio::class;

    public function definition()
    {
        return [
			'soccedula' => $this->faker->name,
			'socnombre' => $this->faker->name,
			'socdireccion' => $this->faker->name,
			'soctelefono' => $this->faker->name,
			'soccorreo' => $this->faker->name,
        ];
    }
}
