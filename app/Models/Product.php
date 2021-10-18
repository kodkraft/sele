<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Laravel\Scout\Searchable;

/**
 * @property mixed $id
 * @property mixed $title
 * @property mixed $price
 * @property mixed $description
 * @property mixed $category_id
 * @property mixed $created_at
 * @property mixed $updated_at
 * @property Category $category
 * @property Order[]|Collection $orders
 * @property Property[]|Collection $properties
 */
class Product extends Model
{
    use HasFactory;
    use Searchable;

    protected $guarded = ['id'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class);
    }

    public function properties()
    {
        return $this->belongsToMany(Property::class)->withPivot('value');
    }

    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }

    public function image()
    {
        return $this->images->sortBy('id')->last();
    }
}
