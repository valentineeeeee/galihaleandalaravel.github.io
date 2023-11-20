<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resupplie extends Model
{
    use HasFactory;

    protected $fillable = [
        'supplier_id',
        'material_id',
        'ressuply_qty',
        // 'ressuply_total_price',
        'resupply_date_finished',
        'ressuply_status',
    ];

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    public function material()
    {
        return $this->belongsTo(Material::class);
    }

}