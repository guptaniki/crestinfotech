<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product_image extends Model
{
    //
    use SoftDeletes; // <-- Use This Instead Of SoftDeletingTrait
    protected $primaryKey = 'id';
    protected $fillable = [
        'f_product_id','v_image','i_main'
    ];
}
