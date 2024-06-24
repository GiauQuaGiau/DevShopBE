<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class permision extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'desc',
        'created_at',
        'updated_at',
    ];
}
