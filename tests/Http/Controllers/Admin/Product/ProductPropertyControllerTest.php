<?php

namespace Tests\Http\Controllers\Admin\Product;

use App\Models\Product;
use App\Models\Property;
use App\Models\User;
use Tests\TestCase;


class ProductPropertyControllerTest extends TestCase
{

    public function testStore()
    {
        /** @var Product $product */
        $product = Product::first();
        /** @var Property $property */
        $property = Property::factory()->create();
        $url = 'admin/products/' . $product->id . '/properties';

        $this->actingAs(User::factory()->create())
            ->post($url, [
                'property_id' => $property->id,
                'value' => 'test',
            ])->assertRedirect();
    }

    public function testIndex()
    {
        /** @var Product $product */
        $product = Product::first();
        $url = 'admin/products/' . $product->id . '/properties';
        $user = User::factory()->create();
        $response = $this->actingAs($user)->get($url)->assertOk();
    }

    public function testDestroy()
    {
        /** @var Product $product */
        $product = Product::factory()->hasAttached(Property::factory(), ['value' => 'some value'])->create();
        $url = 'admin/products/' . $product->id . '/properties/' . $product->properties->first()->id;

        $this->actingAs(User::factory()->create())
            ->delete($url)->assertRedirect();

        $this->assertEquals(0, $product->properties()->count());
    }
}
