<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    protected $guard = 'web';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password'
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function pendingSupplies()
    {
        return Supply::where('status','=','supplied')->count();
    }

    public function allSupplies()
    {
        return Supply::count();
    }
    public function totalInventory()
    {
        return Inventory::sum('quantity');
    }
    public function totalProducts()
    {
        return Product::count();
    }
}
