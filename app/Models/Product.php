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
 * @property string $short_description
 */
class Product extends Model
{
    use HasFactory;
    use Searchable;

    protected $guarded = ['id'];
    protected $appends = ['text'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class)
            ->withPivot(['price', 'amount']);
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


    public function getTextAttribute()
    {
        return $this->title;
    }

    public function getShortDescriptionAttribute()
    {
        //if description is larger than 100 characters, return the first 100 characters with ...
        if (strlen($this->description) > 100) {
            return substr($this->description, 0, 100) . '...';
        }
        return $this->description;
    }

    public function toSearchableArray(): array
    {
        return [
            'title' => $this->title,
            'description' => $this->description,
        ];
    }
}
