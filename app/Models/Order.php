<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public function products() {
        return $this->belongsToMany('App\Models\Item', 'order_products', 'order_id', 'product_id')->withPivot('id', 'created_at', 'updated_at');
    }
    
    public function customer() {
        return $this->belongsTo('App\Models\Customer');
    }


}
