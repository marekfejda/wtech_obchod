<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    public $timestamps = false;
    public $incrementing = false;

    protected $fillable = ['order_id', 'product_id', 'amount'];

    protected function setKeysForSaveQuery($query)
    {
        return $query->where('order_id', $this->getAttribute('order_id'))
                     ->where('product_id', $this->getAttribute('product_id'));
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
