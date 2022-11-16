<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class telephones extends Model
{
    use HasFactory;

    protected $table = "telephones";

    protected $fillable = [
        'name_telefonia'
    ];

    
}
