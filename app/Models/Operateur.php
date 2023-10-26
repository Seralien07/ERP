<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Operateur extends Model
{
    protected $table = 'operateur';
    protected $primaryKey = 'id';
    protected $fillable = ['name'];
}
