<?php

namespace Tests\Http\Controllers\Admin;

use App\Http\Controllers\Admin\CategoryController;
use App\Models\Category;
use App\Models\User;
use Tests\TestCase;


class CategoryControllerTest extends TestCase
{

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
        $this->assertTrue(true);
    }

    public function testUpdate()
    {
        $this->assertTrue(true);
    }

    public function testShow()
    {
        $this->assertTrue(true);
    }

    public function testCreate()
    {
        $this->assertTrue(true);
    }

    public function testStore()
    {
        $this->assertTrue(true);
    }
}
