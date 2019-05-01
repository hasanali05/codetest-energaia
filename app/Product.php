<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name', 'buying_price', 'selling_price'
    ];


    public function supplies()
    {
        return $this->hasMany(Supply::class);
    }
    public function inventories()
    {
        return $this->hasMany(Inventory::class);
    }
}