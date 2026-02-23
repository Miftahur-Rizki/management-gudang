<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangMasuk extends Model
{
    use HasFactory;

    protected $table = 'barang_masuk';

protected $fillable = [
    'product_id',
    'quantity',
    'tanggal_masuk',
    'keterangan'
];

public function product()
{
    return $this->belongsTo(Product::class);
}
}
