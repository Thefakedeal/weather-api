<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Weather extends Model
{
    protected $casts = [
        'new_york' => 'array',
        'london' => 'array',
        'paris' => 'array',
        'berlin' => 'array',
        'tokyo' => 'array',
        'date' => 'date'
    ];

    protected $guarded = ['created_at','updated_at'];

    use HasFactory;
}
