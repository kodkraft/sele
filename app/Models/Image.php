<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

/**
 * @property mixed $id
 * @property mixed $file_name
 * @property mixed $imageable_id
 * @property mixed $imageable_type
 * @property mixed $created_at
 * @property mixed $updated_at
 */
class Image extends Model
{
    use HasFactory;

    protected $fillable = ['file_name', 'imageble_id', 'imageable_type'];
    protected $appends = ['url'];

    public function imageable()
    {
        return $this->morphTo();
    }

    public function getUrlAttribute()
    {
        return url('images/' . $this->file_name);
    }

    public function deleteFile()
    {
        Storage::disk('images')->delete($this->file_name);
    }


}
