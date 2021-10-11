<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sales extends Model
{
    use HasFactory;

    protected $fillable = [
        'refernce_id',
        'user_id',
        'customer_id',
        'item',
        'total_qty',
        'total_dicount',
        'total_tax',
        'total_price',
        'grand_total',
        'shipping_cost',
        'sale_status',
        'payment_status',
        'paid_amount',
        'sale_note',
        'staff_note'

    ];
}
