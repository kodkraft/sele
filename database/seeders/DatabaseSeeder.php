<?php

namespace Database\Seeders;

use App\Models\Addresses;
use App\Models\Category;
use App\Models\Customer;
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
        $users = User::factory(10)->create();
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

        $customers = Customer::factory(10, [
            'user_id' => function () use ($users) {
                return $users->random()->id;
            }
        ])
            ->has(Addresses::factory()->count(2))
            ->create();
    }
}
