<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Kalnoy\Nestedset\NodeTrait;

/**
 * @property mixed $id
 * @property mixed $title
 * @property mixed $parent_id
 * @property mixed $created_at
 * @property mixed $updated_at
 * @property mixed $path
 * @property mixed $title_with_path
 * @property Image[]|Collection $images
 * @property Image $image
 */
class Category extends Model
{
    use NodeTrait;
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'sele.categories';

    public function getPathAttribute()
    {
        return $this->ancestors()->pluck('title')->implode('/');
    }

    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }

    public function image()
    {
        return $this->images->sortBy('id')->last();
    }

    public function getTitleWithPathAttribute()
    {
        if ($this->path) {
            return $this->path . '/' . $this->title;
        }
        return $this->title;
    }

}
