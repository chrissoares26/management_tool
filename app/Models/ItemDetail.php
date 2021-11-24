<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemDetail extends Model
{
    use HasFactory;
    protected $table = 'product_details';
    protected $fillable = ['product_id', 'size', 'width', 'height', 'unit_id'];

    public function item() {
        return $this->belongsTo('App\Models\Item', 'product_id', 'id');
    }
}
