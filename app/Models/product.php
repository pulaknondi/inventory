<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'type',
        'brand_id',
        'category_id',
        'unit_id',
        'cost',
        'price',
        'qty',
        'alert_quantity',
        'image',
        'featured',
        'product_details',
        'status'
    ];

    public function get_brand()
    {
        return $this->belongsTo(Brand::class, 'brand')->select('id', 'name');
    }

    public function get_category()
    {
        return $this->belongsTo(District::class, 'category')->select('id', 'name');
    }
}