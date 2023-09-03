<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Criteria extends Model
{
    use HasFactory;

    protected $table = 'table_criterias';

    protected $fillable = [
        'kriteria',
        'kepentingan',
        'cost_benefit',
    ];
}
