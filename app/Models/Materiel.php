<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materiel extends Model
{
    protected $table = 'materiel';
    protected $primaryKey = 'id';
    protected $fillable = [
        'serial',
        'type',
        'category',
        'model',
        'quantity',
        'date',
        'commente',
    ];
}
