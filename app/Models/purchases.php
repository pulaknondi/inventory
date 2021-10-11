<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class purchases extends Model
{
    use HasFactory;

    protected $fillable = [
        'reference_no',
        'user_id',
        'supplier_id',
        'item',
        'total_qty',
        'total_discount',
        'total_tax',
        'total_cost',
        'order_tax_rate',
        'order_tax',
        'shipping_cost',
        'grand_total',
        'paid_amount',
        'status',
        'payment_status',
        'note',
    ];
}
