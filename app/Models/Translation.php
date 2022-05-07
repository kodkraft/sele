<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * For translation of products and categories
 * @property mixed $id
 * @property mixed $locale
 * @property mixed $title
 * @property mixed $description
 * @property mixed $translatable_type
 * @property mixed $translatable_id
 * @property mixed $created_at
 * @property mixed $updated_at
 */
class Translation extends Model
{
    use HasFactory;

    public function translatable(): \Illuminate\Database\Eloquent\Relations\MorphTo
    {
        return $this->morphTo();
    }
}
