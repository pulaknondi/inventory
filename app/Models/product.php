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

    public function brand()
    {
        return $this->belongsTo(brand::class)->select('id', 'name');
    }
    public function category()
    {
        return $this->belongsTo(Categories::class)->select('id', 'name');
    }
}
