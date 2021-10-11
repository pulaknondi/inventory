<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class expense_categories extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'name',
        'status',
    ];
}
