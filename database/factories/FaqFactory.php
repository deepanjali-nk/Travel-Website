<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class FaqFactory extends Factory
{
    public function definition(): array
    {
        return [
            'question' => Str::random(10),
            'answer' => Str::random(10),
        ];
    }
}
