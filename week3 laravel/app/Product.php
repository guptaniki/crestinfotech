<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{

    use SoftDeletes; // <-- Use This Instead Of SoftDeletingTrait
    protected $primaryKey = 'id';
    protected $fillable = [
        'v_product_name','v_product_code','i_price','i_sale_price','f_quantity','i_order','i_status'
    ];
}
