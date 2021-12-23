<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Laravel\Scout\Searchable;

/**
 * @property mixed $id
 * @property mixed $name
 * @property Collection $values
 * @property mixed $description
 * @property mixed $category_id
 * @property mixed $created_at
 * @property mixed $updated_at
 * @property Product[]|Collection $products
 * @property Category $category
 */
class Property extends Model
{
    use HasFactory;
    use Searchable;

    protected $casts = ['values' => 'collection'];
    protected $guarded = ['id'];


    public function products()
    {
        return $this->belongsToMany(Product::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function toSearchableArray()
    {
        return [
            'name' => $this->name,
            'description' => $this->description,
            'values' => $this->values,
        ];
    }
}
