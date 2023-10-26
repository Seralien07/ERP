<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compagny extends Model
{
    protected $table = 'compagny';
    protected $primaryKey = 'id';
    protected $fillable = ['name'];
}
