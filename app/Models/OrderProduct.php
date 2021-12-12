<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class OrderProduct extends Pivot
{

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

}
