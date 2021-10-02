<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => 'PRD-' . strtoupper($this->faker->bothify('##???')),
            'price' => $this->faker->numberBetween(10, 1000),
            'description' => $this->faker->text,
            'category_id'=>Category::factory()->create()->id
        ];
    }
}
