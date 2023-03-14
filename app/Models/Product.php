<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Products;
use App\Models\useProducts;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_name',
        'product_price',
        'product_img',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
 
    public function useProducts() {
        return $this->hasMany(useProducts::class);
    }
}