<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
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

    protected $appends = ['order_total'];

    public function getOrderTotalAttribute()
    {
        return $this->products()->withPivot(['price'])->get()->sum('pivot.price');
    }

    public function products()
    {
        return $this->belongsToMany(Product::class);
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
