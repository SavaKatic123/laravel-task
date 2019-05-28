<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use \App\Product;


class Merchant extends Model
{
    protected $table = 'merchants';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'merchant_name', 'country_id'
    ];

    public function country()
    {
        return $this->hasOne('App\Country');
    }

    public function products()
    {
        return $this->hasMany('App\Product');
    }
    
}
