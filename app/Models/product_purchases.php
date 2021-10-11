<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product_purchases extends Model
{
    use HasFactory;

    protected $fillable = [
        'purchase_id',
        'product_id',
        'qty',
        'recieved',
        'net_unit_cost',
        'discount',
        'tax_rate',
        'tax',
        'total',
    ];
}
