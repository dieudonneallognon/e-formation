<?php

namespace Database\Factories;

use App\Models\Formation;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class FormationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Formation::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'designation' => $this->faker->catchPhrase,
            'description' => $this->faker->paragraphs(random_int(2, 5), true),
            'type' => $this->faker->word,
            'price'=> $this->faker->randomFloat(2, 0, 1000),
            'image'=> $this->faker->imageUrl(400, 600),
            'user_id' => User::factory(),
        ];
    }
}