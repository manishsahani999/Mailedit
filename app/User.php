<?php

namespace App;

use App\Models\Traits\Uuids;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laratrust\Traits\LaratrustUserTrait;

class User extends Authenticatable
{
    use Uuids;
    use Notifiable;
    use SoftDeletes;
    use LaratrustUserTrait;

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

    /*-------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------
    */

    /**
     * 
     * User has many Models/Brand
     * 
     * @param  
     * @return App\Models\Brand
     */
    public function brands()
    {
        return $this->hasMany('App\Models\Brands');
    }

    /**
     * 
     * User has many Models/List
     * 
     * @param  
     * @return App\Models\List
     */
    public function lists()
    {
        return $this->hasMany('App\Models\List');
    }

    // /**
    //  *
    //  * A user can have many brands
    //  *
    //  * @return this 
    //  */
    // public function binaryBrand()
    // {
    //     return $this->hasMany('App\Models\BinaryBrand');
    // }

    // /**
    //  *
    //  * A user can have many Subs List
    //  *
    //  * @return this
    //  */
    // public function binarySubsList()
    // {
    //     return $this->hasMany('App\Models\BinarySubsList');
    // }

    // /**
    //  *
    //  * A user can have many Subs List
    //  *
    //  * @return this
    //  */
    // public function template()
    // {
    //     return $this->hasMany('App\Models\BinaryEmailTemplate', 'user_id');
    // }
}
