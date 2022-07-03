<?php

namespace Database\Factories;

use App\Models\Alquiler;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class AlquilerFactory extends Factory
{
    protected $model = Alquiler::class;

    public function definition()
    {
        return [
			'soc_id' => $this->faker->name,
			'pel_id' => $this->faker->name,
			'alqfechadesde' => $this->faker->name,
			'alqfechahasta' => $this->faker->name,
			'alqcosto' => $this->faker->name,
			'alqfechaentrega' => $this->faker->name,
        ];
    }
}
