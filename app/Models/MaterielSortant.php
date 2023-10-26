<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaterielSortant extends Model
{
    protected $table = 'materiel_sort';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nameMater',
        'serials',
        'quantity_sort',
        'comments',
        'staff_id',
        'mat_id',
    ];  
}
