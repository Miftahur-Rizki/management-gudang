<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
<<<<<<< HEAD
    protected $fillable = ['name', 'description'];
=======
    protected $table = 'suppliers';

    protected $fillable = [
        'name',
        'description'
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
>>>>>>> 7d0456c (upload project)
}