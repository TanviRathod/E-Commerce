<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable= ['sku','product_name','price','qty'];
    public $table = 'products';

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($product) {
            $product->sku = mt_rand(10000, 99999); 
        });
    }

}
