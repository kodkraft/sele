<?php

namespace Tests\Http\Controllers\Admin;

use App\Models\User;
use Tests\TestCase;


class OrderControllerTest extends TestCase
{

    public function testCreate()
    {
        $this->assertTrue(true);
    }

    public function testStore()
    {
        $this->assertTrue(true);
    }

    public function testShow()
    {
        $this->assertTrue(true);
    }

    public function testUpdate()
    {
        $this->assertTrue(true);
    }

    public function testDestroy()
    {
        $this->assertTrue(true);
    }

    public function testEdit()
    {
        $this->assertTrue(true);
    }

    public function testIndex()
    {
        $this->actingAs(User::factory()->create())
            ->get('admin/orders')

            ->assertOk();
    }
}
