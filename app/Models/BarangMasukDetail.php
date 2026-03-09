<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BarangMasukDetail extends Model
{
    protected $table = 'barang_masuk_detail';

    protected $fillable = [
        'barang_masuk_id',
        'product_id',
        'quantity'
    ];

    public function barangMasuk()
    {
        return $this->belongsTo(BarangMasuk::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}