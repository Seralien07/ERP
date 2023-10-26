<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Credit extends Model
{
    protected $table = 'credit';
    protected $primaryKey = 'id';
    protected $fillable = [
        'device',
        'data',
        'price_data',
        'voice',
        'price_voice',
        'offer',
        'price_offer',
        'option',
        'price_option',
        'comment',
        'staff_id',
        'sim_id',
    ];
}
