<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vendor extends Model
{
    use SoftDeletes;
    use HasFactory;

    protected $fillable = ['name', 'site', 'state', 'email'];

    public function products() {
        return $this->hasMany('App\Models\Item', 'vendor_id', 'id');
    }
}
