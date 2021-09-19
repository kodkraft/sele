<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kalnoy\Nestedset\NodeTrait;

/**
 * @property mixed $id
 * @property mixed $title
 * @property mixed $parent_id
 * @property mixed $created_at
 * @property mixed $updated_at
 */
class Category extends Model
{
//    use NodeTrait;

    use HasFactory;

    protected $guarded = ['id'];

}
