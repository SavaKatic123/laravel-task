<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'merchant_id', 'name', 'description', 'price', 'status'
    ];

    public function merchant()
    {
        return $this->belongsTo('App\Merchant');
    }

}
