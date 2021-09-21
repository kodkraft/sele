<?php

namespace Tests\Models\Admin;

use App\Models\Admin\Setting;
use Tests\TestCase;


class SettingTest extends TestCase
{

    public function test_it_should_save_setting()
    {
        Setting::set('store_name', 'patates');
        $this->assertEquals('patates', Setting::get('store_name'));
    }
}
