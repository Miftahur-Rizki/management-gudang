<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BarangKeluarDetail extends Model
{
    protected $table = 'barang_keluar_detail';

    protected $fillable = [
        'barang_keluar_id',
        'product_id',
        'quantity'
    ];

    public function barangKeluar()
    {
        return $this->belongsTo(BarangKeluar::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}