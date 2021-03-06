<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Laravel\Scout\Searchable;

/**
 * @property User $user
 * @property Addresses[]|Collection $addresses
 * @property mixed $id
 * @property mixed $firstname
 * @property mixed $lastname
 * @property mixed $user_id
 * @property mixed $phone
 * @property mixed $created_at
 * @property mixed $updated_at
 * @property Order[]|Collection $orders
 * @property string $name
 */
class Customer extends Model
{
    use HasFactory;
    use Searchable;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function addresses()
    {
        return $this->hasMany(Addresses::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function getNameAttribute()
    {
        return $this->firstname . ' ' . $this->lastname;
    }

    public function toSearchableArray()
    {
        return [
            'firstname' => $this->firstname,
            'lastname' => $this->lastname,
            'phone' => $this->phone,
        ];
    }
}
