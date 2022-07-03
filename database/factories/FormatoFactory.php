<?php

namespace Database\Factories;

use App\Models\Formato;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class FormatoFactory extends Factory
{
    protected $model = Formato::class;

    public function definition()
    {
        return [
			'fornombre' => $this->faker->name,
        ];
    }
}
