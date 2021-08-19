<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(10)->create();
        Category::factory(3)
            ->create()
            ->each(function ($category) {
                Category::factory(3, ['category_id' => $category->id])
                    ->create()->each(function ($category) {
                        Category::factory(3, ['category_id' => $category->id])
                            ->create();
                    });
            });
        $categories = Category::all();

        Product::factory(50, [
            'category_id' => function () use ($categories) {
                return $categories->random()->id;
            }
        ])->create();
    }
}
