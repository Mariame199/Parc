<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class EmployFactory extends Factory
{
    protected $model = Employe::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'prenom' => $this->faker->lastName(),
            'Telephone' => $this->faker->randomNumber(9, true),
            'address' => $this->faker->address(),

        ];
    }
}
