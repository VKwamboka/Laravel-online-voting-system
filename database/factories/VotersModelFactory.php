<?php

namespace Database\Factories;

use App\Models\VotersModel;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class VoterFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
     protected  $model =\App\Models\VotersModel::class;
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ];
    }
}
