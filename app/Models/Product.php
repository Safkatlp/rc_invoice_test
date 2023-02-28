<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function orders()
    {
        return $this->belongsToMany(Invoice::class, "order_items", "invoice_id","product_id");
    }
}
