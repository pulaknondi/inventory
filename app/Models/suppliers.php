<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class suppliers extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'image',
        'company_name',
        'email',
        'phone_number',
        'country',
        'state',
        'city',
        'address',
        'postal_code',
        'status',
    ];
}
