<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    protected  $fillable = ['name', 'link', 'amount', 'brand_id', 'code', 'type'];
}
