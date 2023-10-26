<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartSim extends Model
{
    protected $table = 'cart_sim';
    protected $primaryKey = 'id';
    protected $fillable = [
        'operateur',
        'line',
        'number_sim',
        'staff_id',
    ];
}
