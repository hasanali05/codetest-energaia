<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Supplier extends Authenticatable
{
    use Notifiable;
    protected $guard = 'supplier';
    
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

    public function supplies()
    {
        return $this->hasMany(Supply::class);
    }
    public function pendingSupplies()
    {
        return Supply::where('status','=','supplied')->count();
    }
    public function totalSupplies()
    {
        return Supply::count();
    }
}
