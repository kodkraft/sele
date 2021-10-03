<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int id
 * @property string $name
 * @property string $value
 */
class Setting extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'value'];

    public static function set($name, $value)
    {
        self::create(['name' => $name, 'value' => $value]);
    }

    public static function get($name)
    {
        return self::where('name', $name)->first()?->value;
    }


}
