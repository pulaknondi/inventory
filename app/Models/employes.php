<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class employes extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'user_id',
        'phone_number',
        'image',
        'country',
        'city',
        'address',
        'status'
    ];
}
