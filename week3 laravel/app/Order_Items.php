<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order_Items extends Model
{
    //
    protected $fillable = [
        'i_order_id','i_product_id','v_product_name','f_price','f_qty','f_subtotal'
    ];
}
