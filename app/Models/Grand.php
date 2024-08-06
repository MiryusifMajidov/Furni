<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grand extends Model
{
    use HasFactory;

    protected $fillable = ['slug', 'name'];

    protected $casts = [
        'name' => 'array',
    ];
}
