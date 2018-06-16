<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * @property mixed $binary_brand
 */
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     *
     * A user can have many brands
     *
     * @return this 
     */
    public function binaryBrand() {
        return $this->hasMany('App\Models\BinaryBrand');
    }

    /**
     *
     * A user can have many Subs List
     *
     * @return this
     */
    public function binarySubsList() {
        return $this->hasMany('App\Models\BinarySubsList');
    }

}
