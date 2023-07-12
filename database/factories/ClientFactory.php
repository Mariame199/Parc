<?php

namespace Database\Factories;
use App\Models\Client;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Client>
 */
class ClientFactory extends Factory
{
    protected $model = Client::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "nom"=>$this->faker->lastName,
            "prenom"=>$this->faker->firstName,
            "NumeroCni"=>$this->faker->creditCardNumber,
            "adresse"=>$this->faker->address,
            "telephone"=>$this->faker->phoneNumber,
        ];
    }
}
