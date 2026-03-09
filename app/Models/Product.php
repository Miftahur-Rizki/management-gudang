<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Transaksi;


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
    ];

    // Relasi ke kategori
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function admin()
{
    return $this->belongsTo(User::class, 'created_by');
}

public function supplier()
{
    return $this->belongsTo(Supplier::class);
}
}