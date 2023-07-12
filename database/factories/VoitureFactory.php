<?php

namespace Database\Factories;
use App\Models\Voiture;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Voiture>
 */
class VoitureFactory extends Factory
{
    protected $model= Voiture::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "marque"=> $this->faker->realText,
            "matricule"=> $this->faker->text,
            "couleur"=> $this->faker->realText,
            "Description"=> $this->faker->paragraph,
            "type_voiture_id"=> rand(1,4),
            "estDisponible" => rand(0, 1),
            // "model_voiture_id"=> rand(1,10),
            "imageUrl" => "images/imageplaceholder.png",
        ];
    }
}
