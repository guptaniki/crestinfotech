<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    //
    use SoftDeletes; // <-- Use This Instead Of SoftDeletingTrait
    protected $primaryKey = 'id';
    protected $fillable = [
        'v_name','v_image','i_order','i_status'
    ];



}
