<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

/**
 * @property mixed $id
 * @property mixed $name
 * @property mixed $description
 * @property mixed $sort
 * @property mixed $created_at
 * @property mixed $updated_at
 * @property Order[]|Collection $orders
 */
class OrderStatus extends Model
{
    use HasFactory;

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
