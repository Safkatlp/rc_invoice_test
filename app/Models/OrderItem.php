<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;
    protected $guarded = [];
    // protected $with = [ "product" ];
    protected $appends = ['name'];

    public function product()
    {
         return $this->hasOne(Product::class,'id', 'product_id');
    }
    public function getNameAttribute()
    {
         return $this->product->name;
    }
}
