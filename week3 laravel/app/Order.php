<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    protected $fillable = [
        'i_customar_id','v_order_id','f_final_total','v_order_status','v_payment_status','v_firstname','v_lastname','v_email','v_address'
    ];
}
