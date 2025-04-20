<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    public $timestamps = false;

    protected $fillable = ['username', 'email', 'password', 'role', 'created_at'];
}
