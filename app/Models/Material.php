<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'supplier_id',
        'material_name',
        'material_description',
        'material_image',
        'material_price',
        'material_stock',
        'material_lt',
        'material_rop',
        'material_mrp',
    ];

    // Product has pivot which is material_quantity
    public function products()
    {
        return $this->belongsToMany(Product::class, 'material_quantity', 'material_id', 'product_id')->withPivot('material_quantity');
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    public function suppliers()
    {
        return $this->hasMany(Supplier::class, 'id');
    }
}