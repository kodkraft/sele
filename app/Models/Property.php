<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

/**
 * @property mixed $id
 * @property mixed $name
 * @property array $values
 * @property mixed $description
 * @property mixed $category_id
 * @property mixed $created_at
 * @property mixed $updated_at
 * @property Product[]|Collection $products
 */
class Property extends Model
{
    use HasFactory;

    protected $casts = ['values' => 'array'];
    protected $guarded = ['id'];


    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}
