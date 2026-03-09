<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BarangMasuk extends Model
{
    protected $table = 'barang_masuk';

    protected $fillable = [
        'product_id',
        'quantity',
        'tanggal_masuk',
        'keterangan',
        'created_by',
        'approved_by',
        'status'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}