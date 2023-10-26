<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personnel extends Model
{
    protected $table = 'personnel';
    protected $primaryKey = 'id';
    protected $fillable = [
        'lastname',
        'firstname',
        'email',
        'post',
        'department',
        'compagny',
        'resignation_date',
    ];
}
