<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class favorite_number extends Model
{
    use HasFactory;

    protected $table = "favorite_numbers";

    protected $fillable = [
        'telephone_customer_id',
        'telephone_id',
        'numero_telefonico'
    ];
}
