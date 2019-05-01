<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    protected $fillable = [
        'product_id', 'quantity', 'status'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}