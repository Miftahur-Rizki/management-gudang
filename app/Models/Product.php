<?php

namespace App\Models;

<<<<<<< HEAD
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
=======
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    protected $fillable = [
        'name',
        'sku',
        'category_id',
        'purchase_price',
        'selling_price',
        'stock',
        'minimum_stock',
        'unit',
        'expired_date',
        'created_by',
        'supplier_id'
    ];

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    public function barangMasuk()
    {
        return $this->hasMany(BarangMasuk::class);
    }

    public function barangKeluar()
    {
        return $this->hasMany(BarangKeluar::class);
    }
>>>>>>> 7d0456c (upload project)
}