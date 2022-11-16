<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class telephone_customer extends Model
{
    use HasFactory;

    protected $table = "telephone_customers";

    protected $fillable = [
        'telephone_id',
        'name',
        'ap_paterno',
        'ap_materno',
        'numero_telefonico'
    ];

    public function Telephones() {
        return $this->belongsTo(telephones::class);
    }
}
