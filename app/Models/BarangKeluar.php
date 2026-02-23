<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangKeluar extends Model
{
    use HasFactory;

    protected $table = 'barang_keluar';

protected $fillable = [
    'product_id',
    'quantity',
    'tanggal_keluar',
    'keterangan'
];

public function product()
{
    return $this->belongsTo(Product::class);
}
}
