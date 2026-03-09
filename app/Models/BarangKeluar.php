<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BarangKeluar extends Model
{
    protected $table = 'barang_keluar';

    protected $fillable = [
        'product_id',
        'quantity',
        'tanggal_keluar',
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