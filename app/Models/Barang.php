<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    public function transaksi()
    {
        return $this->hasMany(Transaksi::class);
    }
    public function creator()
{
    return $this->belongsTo(User::class, 'created_by');
}

public function approver()
{
    return $this->belongsTo(User::class, 'approved_by');
}

public function product()
{
    return $this->belongsTo(Product::class);
}
}
