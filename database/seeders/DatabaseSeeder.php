<?php

namespace Database\Seeders;

use App\Models\Addresses;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderStatus;
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
        $admin = User::factory(1, ['email' => 'onkal.cengiz@gmail.com'])->create();
        $admin2 = User::factory(1,['email' => 'test@gmail.com'])->create();

        $admin = User::factory(1, ['email' => 'admin@sele.com'])->create();
        Category::factory(3)
            ->create()
            ->each(function ($category) {
                Category::factory(3, ['parent_id' => $category->id])
                    ->create()->each(function ($category) {
                        Category::factory(3, ['parent_id' => $category->id])
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

        OrderStatus::factory()->create(['id' => 1, 'name' => 'Pending']);
        OrderStatus::factory()->create(['id' => 2, 'name' => 'Ready']);
        OrderStatus::factory()->create(['id' => 3, 'name' => 'Sent']);

        $orders = Order::factory(50, [
            'customer_id' => function () use ($customers) {
                return $customers->random()->id;
            },
            'order_status_id' => random_int(1, 3)
        ])->create();


    }
}
