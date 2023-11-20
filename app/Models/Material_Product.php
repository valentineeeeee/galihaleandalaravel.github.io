<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material_Product extends Model
{
    use HasFactory;

    protected $table = 'material_product';

    protected $fillable = [
        'material_quantity',
        'material_id',
        'product_id'
    ];
}
