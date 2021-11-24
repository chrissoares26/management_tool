<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description', 'weight', 'unit_id'];

    public function productDetail() {
        return $this->hasOne('App\Models\ProductDetail');
    }
}
