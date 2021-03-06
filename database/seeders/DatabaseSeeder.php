<?php

namespace Database\Seeders;

use App\Models\Addresses;
use App\Models\Admin\Setting;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Image;
use App\Models\Order;
use App\Models\OrderStatus;
use App\Models\Product;
use App\Models\Property;
use App\Models\Translation;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

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
        $admin2 = User::factory(1, ['email' => 'test@gmail.com'])->create();

        /** @var Property[] $properties */
        $properties = Property::factory(50)->create();

        $admin = User::factory(1, ['email' => 'admin@sele.com'])->create();
        Category::factory(3)
            ->has(Image::factory())
            ->create()
            ->each(function ($category) {
                Category::factory(3, ['parent_id' => $category->id])
                    ->has(Image::factory())
                    ->create()->each(function ($category) {
                        Category::factory(3, ['parent_id' => $category->id])
                            ->has(Image::factory())
                            ->create();
                    });
            });
        $categories = Category::all();

        $products = Product::factory(50, [
            'category_id' => function () use ($categories) {
                return $categories->random()->id;
            }
        ])->hasAttached(Property::factory()->count(2), ['value' => 'some value'])
            ->has(Image::factory())
            ->has(Translation::factory(['locale' => 'en']))
            ->has(Translation::factory(['locale' => 'tr']))

            ->create();

        $customers = Customer::factory(10, [
            'user_id' => function () use ($users) {
                return $users->pop()->id;
            }
        ])
            ->has(Addresses::factory()->count(2))
            ->create();

        OrderStatus::factory()->create(['id' => 1, 'name' => 'Pending']);
        OrderStatus::factory()->create(['id' => 2, 'name' => 'Ready']);
        OrderStatus::factory()->create(['id' => 3, 'name' => 'Sent']);

        Order::factory(50, [
            'customer_id' => function () use ($customers) {
                return $customers->random()->id;
            },
            'order_status_id' => function () {
                return random_int(1, 3);
            }
        ])->hasAttached($products->random(), [
            'price' => 100
        ])->hasAttached($products->random(), [
            'price' => 13
        ])->create();

        Setting::factory(50)->create();
    }
}
