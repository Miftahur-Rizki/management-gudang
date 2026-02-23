<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
    'name',
    'sku',
    'category_id',
    'purchase_price',
    'selling_price',
    'stock',
    'minimum_stock',
    'unit',
    'expired_date'
];

public function category()
{
    return $this->belongsTo(Category::class);
}
}
