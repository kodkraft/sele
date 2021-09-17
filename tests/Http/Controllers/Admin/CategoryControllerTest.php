<?php

namespace Tests\Http\Controllers\Admin;

use App\Http\Controllers\Admin\CategoryController;
use App\Models\Category;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;


class CategoryControllerTest extends TestCase
{
    use DatabaseTransactions;

    public function testDestroy()
    {
        /** @var Category $category */
        $category = Category::factory()->create();
        $this->actingAs(User::factory()->create())->delete('admin/categories/' . $category->id)
            ->assertRedirect();
        $category = Category::find($category->id);
        $this->assertNull($category);
    }

    public function testIndex()
    {
        $this->get('admin/categories')
            ->assertRedirect();
        /** @var User $user */
        $user = User::factory()->create();
        $response = $this->actingAs($user)->get('admin/categories')->assertOk();
    }

    public function testEdit()
    {
        /** @var Category $category */
        $category = Category::factory()->create();
        $this->actingAs(User::factory()->create())->get('admin/categories/' . $category->id . '/edit')
            ->assertOk();
    }

    public function testUpdate()
    {
        /** @var Category $category */
        $category = Category::factory(['title' => 'not updated'])->create();
        $this->actingAs(User::factory()->create())
            ->patch('admin/categories/' . $category->id, ['title' => 'updated']);

        $category->refresh();

        $this->assertEquals('updated', $category->title);
    }

    public function testShow()
    {
        /** @var Category $category */
        $category = Category::factory()->create();
        $this->actingAs(User::factory()->create())->get('admin/categories/' . $category->id)
            ->assertOk();
        $this->assertTrue(true);
    }

    public function testCreate()
    {
        /** @var Category $category */
        $category = Category::factory()->create();
        $this->actingAs(User::factory()->create())->get('admin/categories/create')
            ->assertOk();
        $this->assertTrue(true);
    }

    public function testStore()
    {
        $category = Category::factory(['title' => 'newly created'])
            ->makeOne();

        $this->actingAs(User::factory()->create())->post('admin/categories', $category->toArray());
        $category = Category::where('title', 'newly created')->first();
        $this->assertNotNull($category);
    }
}
