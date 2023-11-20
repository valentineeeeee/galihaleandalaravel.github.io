<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // public function transactions()
    // {
    //     return $this->hasMany(Transaction::class, '','');
    // }

    protected $fillable = [
        'product_name',
        'product_description',
        'product_image',
        'product_price',
    ];

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

    public function materials()
    {
        return $this->belongsToMany(Material::class, 'material_product', 'product_id', 'material_id')->withPivot('material_quantity');
    }
}
