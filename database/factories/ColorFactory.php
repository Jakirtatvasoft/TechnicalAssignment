<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ColorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $colors = config('constants.color_hex_code');
        return [
            'color_code' => $colors[array_rand($colors,1)],
        ];
    }
}
