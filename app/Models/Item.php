<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable = ['name', 'description', 'weight', 'unit_id', 'vendor_id'];

    public function productDetail() {
        return $this->hasOne('App\Models\ItemDetail', 'product_id', 'id');
    }

    public function vendor() {
        return $this->belongsTo('App\Models\Vendor');
    }

    public function orders() {
        return $this->belongsToMany('App\Models\Order', 'order_products', 'product_id', 'order_id');
    }
}
