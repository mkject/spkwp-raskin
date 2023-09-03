<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Criteria;     

class Kepentingan extends Model
{
    use HasFactory;

    protected $table = 'kepentingan';

    protected $fillable = [
        'nilai',
        'keterangan',
    ];

    public function criteriaFk()
    {
        return $this->hasMany(Criteria::class, 'kepentingan', 'id');
        // return $this->hasOne(Criteria::class, 'kepentingan', 'id');
    }
}
