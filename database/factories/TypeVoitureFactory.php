<?php

namespace Database\Factories;
use App\Models\TypeVoiture;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TypeVoiture>
 */
class TypeVoitureFactory extends Factory
{
    protected $model = TypeVoiture::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition() :array
    {
        return [
            "nom"=>array_rand(["minibus","pick up","cabriolets","crossover"],1)
        ];
    }
}
