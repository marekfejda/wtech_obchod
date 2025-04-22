<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public $timestamps = false;

    protected $fillable = ['user_id', 'temp_user_id', 'name_surname', 'address_streetnumber', 'PSC', 'city_country', 'phone_number', 'email', 'payment_type', 'card_number', 'exp_date', 'cvc', 'card_holder', 'state', 'created_at'];
}
