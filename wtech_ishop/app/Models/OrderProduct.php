<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    public $timestamps = false;
    public $incrementing = false;
    protected $primaryKey = null;

    protected $fillable = ['order_id', 'product_id', 'amount'];
}
