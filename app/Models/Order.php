<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Collection;

/**
 * @property mixed $id
 * @property mixed $order_status_id
 * @property mixed $customer_id
 * @property mixed $shipping_address
 * @property mixed $billing_address
 * @property mixed $created_at
 * @property mixed $updated_at
 * @property Customer $customer
 * @property Product[]|Collection $products
 * @property OrderStatus $orderStatus
 */
class Order extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $appends = ['order_total','price'];

    public function getOrderTotalAttribute()
    {
        return $this->products()
            ->withPivot(['price','amount'])
            ->get()
            ->sum(function ($item) {
                return $item->pivot->price * $item->pivot->amount;
            });
    }
    public function getPriceAttribute()
    {
        return $this->products()
            ->withPivot(['price','amount'])
            ->get()
            ->sum(function ($item) {
                return $item->pivot->price * $item->pivot->amount;
            });
    }

    public function products()
    {
        return $this->belongsToMany(Product::class)
            ->withPivot(['price','amount']);
    }

    //order products
    public function orderProducts()
    {
        return $this->hasMany(OrderProduct::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function orderStatus()
    {
        return $this->belongsTo(OrderStatus::class);
    }
}
