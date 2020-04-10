<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Payment extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    public function pcustomer()
    {
        return $this->belongsTo('App\Customer', 'customer_id');
    }
}
