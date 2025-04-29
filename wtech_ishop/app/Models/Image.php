<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Image extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $primaryKey = 'uid';

    // protected $fillable = ['path'];

    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_images', 'image_id', 'product_id');
    }
}
