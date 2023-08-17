<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // to test migrations  we can use the factory

            // with faker sentence we send the quantity of words indicate 
            'title' => $this->faker->sentence(5), 
            'description' => $this->faker->sentence(20),
            
            //  with faker uuid we send a uuid
            'image' => $this->faker->uuid().'.jpg', 

            // with faker randomelement we choise a random element of a array
            'user_id' => $this->faker->randomElement([10,11,12]), 

        ];
    }
}
