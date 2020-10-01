<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product_Category extends Model
{
    use SoftDeletes; // <-- Use This Instead Of SoftDeletingTrait
    protected $primaryKey = 'id';
    protected $fillable = [
        'f_category_id','f_product_id'
    ];
    public function productCategory() {
        return $this->belongsTo( Category::class, 'id' );
    }
    public function producttoCategory() {
        return $this->belongsTo( Product::class, 'id' );
    }
}
