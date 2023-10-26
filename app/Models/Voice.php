<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voice extends Model
{
    protected $table = 'voice';
    protected $primaryKey = 'id';
    protected $fillable = ['name'];
}
